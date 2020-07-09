<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentShareController extends Controller
{
    public function index()
    {
        return view('client.pages.docs-share.index');
    }

    public function uploadDocuments(Request $request)
    {
        
    }
}
