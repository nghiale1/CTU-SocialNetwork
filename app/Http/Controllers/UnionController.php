<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class UnionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get subject of user
        $union=$this->getUnionStudent();
        $blog='';
        if($union->isNotEmpty()){

            $blog=\DB::table('union_posts')
            ->where('ub_id',$union[0]->ub_id)
            ->paginate(10);
            $now=$this->now();  
            $day[]='';

            foreach($blog as $item)
            $day[$item->up_id]=$this->getDay($item->up_id,$item->up_created);
        }
        // dd($blog);
        // $subject=app(\App\Http\Controllers\QuestionController::class)->getSubjectsStudent();
        return view('client.pages.union.index',compact('union','blog','day'));
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
        $union=$this->getUnionStudent();
        $union=$union[0];
        return view('client.pages.union.create',compact('union'));
    }
    public function store(Request $request)
    {
        $id=\DB::table('union_posts')->max('up_id');
        $title=$this->sanitize($request->title);
        $slug=$title.'.'.$request->union.'&'.($id+1);
        if ($request->hasFile('avatar')) {
            //lưu filed
            $file=$request->file('avatar')->getClientOriginalName();
            $type_file = \File::extension($file);
            $name_file=$slug.'.'.$type_file;
            $request->file('avatar')->move(
                public_path('/img/union_post/'), //nơi cần lưu
                $name_file,
                );
            \DB::table('union_posts')->insert([
                'stu_id'=>\Auth::id(),
                'ub_id'=>$request->union,
                'up_title'=>$request->title,
                'up_avatar'=>'img/union_post/'.$name_file,
                'up_slug'=>$slug,//kết hợp id môn và id bài viết
                'up_content'=>$request->content,
            ]);
        }
        return redirect()->route('union')->with('success','Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post=DB::table('union_posts as p')
        ->join('students_ub as sub','sub.ub_id','p.up_id')
        ->join('students as s','s.stu_id','p.stu_id')
        ->where('up_slug',$slug)
        ->first();
        $day='';
        if($post){

            $day=$this->getDay($post->up_id,$post->up_created);
        }
        // đếm lượt xem
        app(\App\Http\Controllers\CountViewController::class)->check(false,$post->up_id,false,false);
        
        return view('client.pages.union.single',compact('post','day'));
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
