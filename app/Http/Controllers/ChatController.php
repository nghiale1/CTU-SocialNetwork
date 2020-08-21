<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Events\ChatMessage;
use DB;
use Auth;
class ChatController extends Controller
{
    public function __construct()
   {
       $this->middleware('checkLogin');
   }

   //Gửi tin nhắn đi
    public function sendMessage(Request $request)
   {
       $message = [
           "id" => $request->userid,
           "sourceuserid" => Auth::guard('student')->id(),
           "name" => Auth::guard('student')->user()->username,
           "message" => $request->message
       ];
       event(new ChatMessage($message));
       return "true";
   }

   //Trang để chat
   public function chatPage()
   {
       $users = Student::take(10)->get();
    //    User::take
       return view('test-chat.chat',['users'=> $users]);
   }
}
