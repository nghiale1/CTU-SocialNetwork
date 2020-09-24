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
        ->join('students','students.stu_id','club_posts.stu_id')
        ->where('club_students.cs_role','!=','YC')
        ->where('club_students.stu_id',\Auth::id())
        ->groupBy('club_posts.cp_id')
        ->paginate(10);
        foreach($blog as $item){
            $item->day=$this->getDay($item->cp_id,$item->cp_created);
        }
        $viewed=$this->viewed();
        $joined=$this->joined();
   
        // dd($club);
        // $subject=app(\App\Http\Controllers\QuestionController::class)->getSubjectsStudent();
        return view('client.pages.club.index',compact('blog','viewed','joined'));
    }

    public function clubPostSlug($slug)
    {
        $blog='';
        // dd($club);
        $blog=\DB::table('club_posts')
        ->join('club_students','club_students.c_id','club_posts.c_id')
        ->join('clubs','clubs.c_id','club_posts.c_id')
        ->join('students','students.stu_id','club_posts.stu_id')
        ->where('club_students.cs_role','!=','YC')
        ->where('club_students.stu_id',\Auth::id())
        ->where('clubs.c_slug',$slug)
        ->groupBy('club_posts.cp_id')
        ->paginate(10);
        foreach($blog as $item){
            $item->day=$this->getDay($item->cp_id,$item->cp_created);
        }
        $viewed=$this->viewed();
        $joined=$this->joined();
        return view('client.pages.club.index',compact('blog','viewed','joined'));
    }
    public function search(Request $request)
    {
        $blog=\DB::table('club_posts')
        ->join('club_students','club_students.c_id','club_posts.c_id')
        ->join('clubs','clubs.c_id','club_posts.c_id')
        ->where('club_students.cs_role','!=','YC')
        ->where('club_students.stu_id',\Auth::id())
        ->where('cp_title',"LIKE",'%'.$request->content.'%')->get();
        if($blog->isNotEmpty()){
            foreach($blog as $item){

            $item->day=$this->getDay($item->cp_id,$item->cp_created);
            }
        }
        return response()->json($blog, 200);
    }
    public function listRequest($slug)
    {
        
        $list=ClubStudent::join('clubs','clubs.c_id','club_students.c_id')
        ->join('students','students.stu_id','club_students.stu_id')
        ->where('cs_role','YC')
        ->where('c_slug',$slug)->get();
        $viewed=$this->viewed();
        $joined=$this->joined();
        return view('client.pages.club.request',compact('list','viewed','joined'));
            
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
            $viewed=$this->viewed();
            $joined=$this->joined();
            // dd($joined);
        return view('client.pages.club.member',compact('list','club','joined','viewed'));
    }
    public function viewed()
    {
        $idStudent = \Auth::id();
        $viewed = DB::table('count_view_clubs')
        ->join('club_posts','club_posts.cp_id','count_view_clubs.cp_id')
        ->where('count_view_clubs.stu_id',$idStudent)->limit(3)->get();
        if($viewed->isEmpty()){
            $viewed=0; 
        }
        // dd($viewed);
        return $viewed;
    }
    public function joined()
    {
        $idStudent = \Auth::id();
        $joined = DB::table('club_students')
        ->join('clubs','clubs.c_id','club_students.c_id')
        ->where('club_students.stu_id',$idStudent)->get();
        if($joined->isEmpty()){
            $joined=0; 
        }
        return $joined;
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
        $viewed=$this->viewed();
        $joined=$this->joined();
        return view('client.pages.club.create',compact('club','viewed','joined'));
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
                $name_file);
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
        $comment = DB::table('comments')
        ->join('students','students.stu_id','comments.stu_id')
        ->OrderBy('com_id','DESC')->get();
        $viewed=$this->viewed();
        $joined=$this->joined();
        return view('client.pages.club.single',compact('post','day','comment','viewed','joined'));
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

    //bình luận
    public function comment(Request $request)
    {
        $date = Carbon::now();
        $comment['com_content']= $request->com_content;
        $comment['com_created']= $date;
        $comment['stu_id']= $request->st_id;
        $comment['cp_id']= $request->cp_id;
    
        // dd($comment);
       

        $result = DB::table('comments')->insert($comment);
        if($result)
        {
           return redirect()->back();
        }
    }

    public function commentrep(Request $request)
    {
        $date = Carbon::now();
        $comment['com_content']= $request->com_repcontent;
        $comment['com_created']= $date;
        $comment['stu_id']= $request->st_id;
        $comment['cp_id']= $request->cp_id;
        $comment['com_idrep']=$request->com_id;

        //  dd($comment);

        $result = DB::table('comments')->insert($comment);
        if($result)
        {
           return redirect()->back();
        }
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
            $check=DB::table('club_students')
            ->where('c_id',$find->c_id)
            ->where('stu_id',\Auth::id())->first();
            if(!$check){


                DB::table('club_students')->insert([
                    'c_id'=>$find->c_id,
                    'stu_id'=>\Auth::id(),
                    'cs_role'=>'YC'
                ]);
                return back()->with('success','Yêu cầu tham gia của bạn đã được gửi!');
            }
            else{

                return back()->with('error','Bạn đã gia nhập rồi!');
            }
        }
        return back()->with('error','Có lỗi xảy ra!');
    }
    public function list()
    {
        $list=DB::select("SELECT clubs.*, COUNT(club_students.stu_id) as sothanhvien,COUNT(cp_id) as sobaiviet
        FROM `clubs`
        LEFT JOIN club_students on club_students.c_id=clubs.c_id
        LEFT JOIN club_posts on club_students.stu_id=club_posts.stu_id and club_students.c_id=club_posts.c_id
        GROUP BY clubs.c_id");
        $join=DB::table('club_students')->where('stu_id',\Auth::id())->get();
        foreach($list as $item){
            if($join->isNotEmpty()){

                foreach($join as $item2){
                    if($item2->c_id==$item->c_id){
                        $item->status=1;
                    break;
                    }
                    else{
                        $item->status=0;
                    }
                }
            }else{

                $item->status=1;
            }
        }
        // dd($list);
        return view('client.pages.club.list',compact('list'));
    }
}
