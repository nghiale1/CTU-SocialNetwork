<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\CountViewController;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get subject of user
        $subject=\App::call('App\Http\Controllers\QuestionController@getSubjectsStudent');
        // dd($subject);
        $blog=\DB::table('posts');
        foreach($subject as $item){
            // dd($item->sub_id);
            $blog=$blog->orwhere('sub_id',$item->sub_id);
        }
        $blog=$blog->paginate(10);
        // dd($blog);
        // $subject=app(\App\Http\Controllers\QuestionController::class)->getSubjectsStudent();
        return view('client.pages.forum.forum',compact('subject','blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug)
    {
        // dd(\Sec)
        $post=DB::table('posts as p')
        ->join('students as s','s.stu_id','p.stu_id')
        ->where('p_slug',$slug)
        ->first();
        $now=$this->now();  
        $ten_day=$this->diffInDays($post->p_created);
        if($ten_day){

            $post->p_created=Carbon::parse($post->p_created)->diffForHumans($now);
        }
        else{
            $post->p_created=$this->format_date($post->p_created);
        }
        // đếm lượt xem
        app(\App\Http\Controllers\CountViewController::class)->check($post->p_id,false,false,false);
        
        return view('client.pages.forum.single',compact('post'));
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
