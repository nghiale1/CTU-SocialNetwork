<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Student;
use App\Notifications\InvoicePaid;
use DB;
use Carbon\Carbon;
class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $share=Item::paginate(10);
        $day[]='';

        foreach($share as $item){

            $day[$item->item_id]=$this->getDay($item->item_id,$item->item_created);
        }
       return view('client.pages.share.index',compact('share','day'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type=DB::table('types')->get();
        return view('client.pages.share.create',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $id=\DB::table('items')->max('item_id');
        $title=$this->sanitize($request->title);
        $slug=$title.'.'.$request->type.'&'.($id+1);
        if ($request->hasFile('avatar')) {
            //lưu file
            $file=$request->file('avatar')->getClientOriginalName();
            $type_file = \File::extension($file);
            $name_file=$slug.'.'.$type_file;
            $request->file('avatar')->move(
                public_path('/img/items/'.$request->type.'/'), //nơi cần lưu
                $name_file,
                );
            \DB::table('items')->insert([
                'stu_id'=>\Auth::id(),
                'type_id'=>$request->type,
                'item_title'=>$request->title,
                'item_avatar'=>'img/items/'.$request->type.'/'.$name_file,
                'item_slug'=>$slug,//kết hợp id môn và id bài viết
                'item_price'=>$request->price,
                'item_phone'=>$request->phone,
                'item_name'=>$request->name,
                'item_content'=>$request->content,
            ]);
        }
        
        return redirect()->route('share')->with('success','Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $reason=$this->getReasons();
        $post=DB::table('items as p')
        ->join('students as s','s.stu_id','p.stu_id')
        ->join('types','types.type_id','p.type_id')
        ->where('item_slug',$slug)
        ->first();
        $day='';
        if($post){
            $day=$this->getDay($post->item_id,$post->item_created);
        }
        // đếm lượt xem
        app(\App\Http\Controllers\CountViewController::class)->check(false,false,false,$post->item_id);
        
        return view('client.pages.share.single',compact('post','day','reason'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function list($slug)
    {
        $share=Item::join('types as t','t.type_id','items.type_id')
        ->where('type_slug',$slug)
        ->paginate(10);
        $now=$this->now();
        $day[]='';


        foreach($share as $item){

            if($this->diffInDays($item->item_created)){

                $day[$item->item_id]=Carbon::parse($item->item_created)->diffForHumans($now);
            }
            else{
                $day[$item->item_id]=$this->format_date($item->item_created);
            }
        }
       return view('client.pages.share.index',compact('share','day'));
    }
}
