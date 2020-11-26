<?php

namespace App\Http\Controllers\QuanTri;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ShareItemController extends Controller
{
    public function getItems()
    {
        $typeItems = DB::table('types')->get();
        // dd($typeItems);
        return view('client.pages.share.manage.index', compact('typeItems'));
    }
}
