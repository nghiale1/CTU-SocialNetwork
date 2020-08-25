<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Events\NotificationClub;
use App\Models\ClubStudent;
class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blog='';
        // dd($club);
        $blog=\DB::table('club_posts')
        ->join('club_students','club_students.c_id','club_posts.c_id')
        ->join('clubs','clubs.c_id','club_posts.c_id')
        ->where('club_students.cs_role','!=','YC')
        ->where('club_posts.stu_id',\Auth::id())
        ->groupBy('club_posts.cp_id')
        ->paginate(10);
        foreach($blog as $item){
            $item->ngaydang=$this->getDay($item->cp_id,$item->cp_created);
        }
        // dd($club);
        // $subject=app(\App\Http\Controllers\QuestionController::class)->getSubjectsStudent();
        return view('client.pages.club.index',compact('blog'));
    }
    public function listRequest($slug)
    {
        
        $list=ClubStudent::join('clubs','clubs.c_id','club_students.c_id')
        ->join('students','students.stu_id','club_students.stu_id')
        ->where('cs_role','YC')
        ->where('c_slug',$slug)->get();
        return view('client.pages.club.request',compact('list'));
            
    }
    public function accept(Request $request)
    {
        $c=DB::table('clubs')->where('c_slug',$request->slug)->first();
        if($c){
            DB::table('club_students')->where('c_id',$c->c_id)
            ->join('students as s','s.stu_id','club_students.stu_id')
            ->where('stu_code',$request->code)->update([
                'cs_role'=>'TV'
            ]);
        }
        return response()->json('success', 200);
        
    }
    public function denied(Request $request)
    {
        $c=DB::table('clubs')->where('c_slug',$request->slug)->first();
        if($c){
            DB::table('club_students')
            ->join('students as s','s.stu_id','club_students.stu_id')
            ->where('stu_code',$request->code)
            ->where('c_id',$c->c_id)->delete();
        }
        return response()->json('success', 200);
    }
    public function delete(Request $request)
    {
        $c=DB::table('clubs')->where('c_slug',$request->slug)->first();
        if($c){

            DB::table('club_posts')
            ->join('students as s','s.stu_id','club_posts.stu_id')
            ->where('stu_code',$request->code)
            ->where('c_id',$c->c_id)->delete();
            DB::table('club_students')
            ->join('students as s','s.stu_id','club_students.stu_id')
            ->where('stu_code',$request->code)
            ->where('c_id',$c->c_id)->delete();
        }
        return response()->json('success', 200);
    }

    public function listMember(Request $request)
    {
        $club=DB::table('clubs')->where('c_slug',$request->slug)->first();
        $list=DB::table('club_students')
            ->join('students','students.stu_id','club_students.stu_id')->where('cs_role','!=','YC')
            ->where('club_students.c_id',$club->c_id)
            ->groupby('club_students.stu_id')
            ->get()->ToArray();

            $arr=['CNCLB','PCNCLB','UVCLB','TV'];

            $count=DB::table('club_posts')
            ->select('stu_id',DB::raw('count(*) as sobaidang'))->groupby('stu_id')->get();

            foreach($list as $item){
                $item->count=0;
                $item->sort=array_search($item->cs_role,$arr);
                foreach($count as $item2){
                    if($item->stu_id==$item2->stu_id){
                        
                        $item->count=$item2->sobaidang;
                    }
                }
            }
            
            usort($list,fn($a,$b)=>strcmp($a->sort,$b->sort));
        return view('client.pages.club.member',compact('list','club'));
    }
    
    public function changeRole(Request $request)
    {
        $c=DB::table('clubs')->where('c_slug',$request->slug)->first();
        if($c){
            DB::table('club_students')
            ->join('students as s','s.stu_id','club_students.stu_id')
            ->where('stu_code',$request->code)
            ->where('c_id',$c->c_id)->update([
                'cs_role'=>$request->value
            ]);
        }
        return response()->json('success', 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd(\Auth::id());
        $club=$this->getClubStudent();
        return view('client.pages.club.create',compact('club'));
    }
    public function store(Request $request)
    {
        // event(new NotificationClub($request->club,\Auth::id()));
        $id=\DB::table('club_posts')->max('cp_id');
        $title=$this->sanitize($request->title);
        $slug=$title.'.'.$request->union.'&'.($id+1);
        if ($request->hasFile('avatar')) {
            //lưu filed
            $file=$request->file('avatar')->getClientOriginalName();
            $type_file = \File::extension($file);
            $name_file=$slug.'.'.$type_file;
            $request->file('avatar')->move(
                public_path('/img/club_post/'), //nơi cần lưu
                $name_file,
                );
            \DB::table('club_posts')->insert([
                'stu_id'=>\Auth::id(),
                'c_id'=>$request->club,
                'cp_title'=>$request->title,
                'cp_avatar'=>'img/club_post/'.$name_file,
                'cp_slug'=>$slug,//kết hợp id môn và id bài viết
                'cp_content'=>$request->content,
            ]);
        }
        return redirect()->route('club')->with('success','Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post=DB::table('club_posts as p')
        ->join('club_students as cs','cs.c_id','p.c_id')
        ->join('students as s','s.stu_id','p.stu_id')
        ->where('cp_slug',$slug)
        ->first();
        $day='';
        if($post){

            $day=$this->getDay($post->cp_id,$post->cp_created);
        }
        // đếm lượt xem
        app(\App\Http\Controllers\CountViewController::class)->check(false,false,$post->cp_id,false);
        
        return view('client.pages.club.single',compact('post','day'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function join($slug)
    {
        $find=DB::table('clubs')->where('c_slug',$slug)->first();
        if($find){
            DB::table('club_students')->insert([
                'c_id'=>$find->c_id,
                'stu_id'=>\Auth::id(),
                'cs_role'=>'YC'
            ]);
            return back()->with('success','Yêu cầu tham gia của bạn đã được gửi!');
        }
        return back()->with('error','Yêu cầu tham gia của bạn đã được gửi!');
    }
    public function list()
    {
        $list=DB::select("SELECT clubs.*, COUNT(club_students.stu_id) as sothanhvien,COUNT(cp_id) as sobaiviet 
        FROM `clubs` 
        LEFT JOIN club_students on club_students.c_id=clubs.c_id 
        LEFT JOIN club_posts on club_students.stu_id=club_posts.stu_id and club_students.c_id=club_posts.c_id
        GROUP BY clubs.c_id");
        return view('client.pages.club.list',compact('list'));
    }
}
