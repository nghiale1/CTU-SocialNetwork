<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function getSubjectsStudent()
    {
        // get id of user
        $id=\Auth::id();
        // get subject to select
        $subject=\DB::table('subjects_student as ss')->join('students as s','ss.stu_id','s.stu_id')
        ->join('subjects as su','su.sub_id','ss.sub_id')
        ->where('s.stu_id',$id)
        ->get('su.*');
        // dd($subject);
        return $subject;
    }
    public function create()
    {
        $subject=$this->getSubjectsStudent();
        return view('client.pages.question',compact('subject'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //lấy id bài viết cuối
        $id=\DB::table('posts')->max('p_id');
        $title=$this->sanitize($request->title);
        \DB::table('posts')->insert([
            'stu_id'=>\Auth::id(),
            'sub_id'=>$request->subject,
            'p_slug'=>$title.'.'.$request->subject.'&'.$id,//kết hợp id môn và id bài viết
            'p_title'=>$request->title,
            'p_content'=>$request->content,
        ]);
        return redirect()->route('forum');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
