<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class DocumentShareController extends Controller
{
    public function index()
    {
        // Lấy tất cả học phần người đó học trong năm học nào đó !
        $idStudent = Auth::guard('student')->id();
        // dd($idStudent);
        $subject_student = DB::table('subjects_student')
                            ->join('students','students.stu_id','subjects_student.stu_id')
                            ->join('subjects','subjects.sub_id','subjects_student.sub_id')->get();
        dd($subject_student);
        //Chuyển các môn học đó thành folder

        //Tạo thư mục trong thư mục

        //Tạo file trong thư mục theo môn học

        //DONE
        return view('client.pages.docs-share.index');
    }

    public function OpenFolder($idFolder)
    {
        
    }

    public function uploadDocuments(Request $request)
    {
        
    }
}
