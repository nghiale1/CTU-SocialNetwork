<?php

namespace App\Http\Controllers\QuanTri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Str;
class ShareItemController extends Controller
{
    public function getItems()
    {
        $typeItems = DB::table('types')->get();
        // dd($typeItems);
        return view('client.pages.share.manage.index', compact('typeItems'));
    }

    public  function ItemStore(Request $request)
    {
       
        if ($request->hasFile('type_hinh')) {
            //lưu filed
            $file=$request->file('type_hinh')->getClientOriginalName();

            $request->file('type_hinh')->move(
                public_path('svg/'), //nơi cần lưu
                $file);
            $data['type_image']=$file;
        }
        $data['type_name']=$request->type_name;
        $data['type_slug']= Str::slug($request->type_name);


    DB::table('types')->insert($data);
    return  redirect()->back();
        
    }
    public  function itemUpdate(Request $request)
    {
       
        if ($request->hasFile('type_hinh')) {
            //lưu filed
            $file=$request->file('type_hinh')->getClientOriginalName();

            $request->file('type_hinh')->move(
                public_path('svg/'), //nơi cần lưu
                $file);
            $data['type_image']='svg/'.$file;
        }
        $data['type_name']=$request->type_name;
        $data['type_slug']= Str::slug($request->type_name);
        $data['type_id']= $request->type_id;

        // dd($data);


        DB::table('types')->where('type_id',$data['type_id'])->update($data);
        return  redirect()->back();
        
    }

    public function getAjax(Request $request){

       if($request->ajax())
        {
            $data = DB::table('types')->where('type_id',$request->id)->first();
            return response()->json($data,200);
        }

    }
    public function itemDelete($id){

        $data = DB::table('types')->where('type_id',$id)->delete();
       return redirect()->back();


    }
}
