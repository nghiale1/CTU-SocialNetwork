<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Events\NotificationClub;
class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get subject of user
        $club=$this->getClubStudent();
        $blog='';
        $day[]='';
        if($club->isNotEmpty()){

            $blog=\DB::table('club_posts')
            ->where('c_id',$club[0]->c_id)
            ->paginate(10);

            foreach($blog as $item)
                $day[$item->cp_id]=$this->getDay($item->cp_id,$item->cp_created);
        }
        // dd($blog);
        // $subject=app(\App\Http\Controllers\QuestionController::class)->getSubjectsStudent();
        return view('client.pages.club.index',compact('club','blog','day'));
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
        $club=$club[0];
        return view('client.pages.club.create',compact('club'));
    }
    public function store(Request $request)
    {
        event(new NotificationClub($request->club,\Auth::id()));
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
}