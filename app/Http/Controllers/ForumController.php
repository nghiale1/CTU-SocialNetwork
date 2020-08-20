<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Post;
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
        //lấy lý do report
        
        $blog=Post::query();
        
        foreach($subject as $item){
            // dd($item->sub_id);
            $blog=$blog->orwhere('sub_id',$item->sub_id);
        }
        $blog=$blog->paginate(10);
        $now=$this->now();      
        $day[]='';
        if($blog->isNotEmpty()){
            foreach($blog as $item){
                $day[$item->p_id]=$this->getDay($item->p_id,$item->p_created);
            }
        }
        return view('client.pages.forum.forum',compact('subject','blog','day'));
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
        //lấy lý do report
        $reason=$this->getReasons();
        $post=Post::join('students as s','s.stu_id','posts.stu_id')
        ->where('p_slug',$slug)
        ->first();
        
        $now=$this->now();  
        $day='';
        if($post){

            $day=$this->getDay($post->p_id,$post->p_created);
        }
        $comment = DB::table('comments')
        ->join('students','students.stu_id','comments.stu_id')
        ->OrderBy('com_id','DESC')->get();
        $myself=array();
        $count_like=array();
        // dd($comment);
        $like=0;
        if($comment->isNotEmpty()){

            foreach($comment as $item){
                $like = DB::table('likes as l')
                ->where('l.com_id',$item->com_id)
                ->where('l_status',1);
                $count_like[$item->com_id]=count($like->get());
    
                $like =$like->where('l.stu_id',\Auth::id())
                ->first();
                if($like){
                    $myself[$item->com_id]=1;
                }
                else{
                    
                    $myself[$item->com_id]=0;
                }
    
            }
        }

        // đếm lượt xem
        app(\App\Http\Controllers\CountViewController::class)->check($post->p_id,false,false,false);
        
        return view('client.pages.forum.single',compact(['post','day','comment','like','myself','count_like','reason']));
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
