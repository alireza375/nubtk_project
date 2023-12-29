<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use App\Models\Student;
use App\Models\Marksheet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MarksheetController extends Controller
{

    public function AddMarksheetTeacherId($course_id){
        $course = Course::findOrFail($course_id);
        $course_code = $course->course_code;
        $students = DB::table('students')->where('course_id', $course_code)
                                        ->select('students.*', 'courses.*')
                                        ->Join('courses', 'courses.course_code', 'students.course_id')
                                        ->orderBy('stu_id', 'asc')
                                        ->get();
                                        
        return view('teacher.add_marksheet_id', compact('students', 'course'));
    }

    public function MarksheetPdf($course_id){
        $courses = Course::where('id', $course_id)->first();
        $details = Marksheet::where('course_id', $course_id)->orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('teacher.detail_marksheet_teacher',compact('courses','details'));
        return $pdf->download('marksheet.pdf');
    }

    public function StoreMarksheetTeacher(Request $request){

        $marks = $request->stu_id;
                
        foreach($marks as $key=>$item){
            $data = new Marksheet();
            $data->stu_id = $request->stu_id[$key];
            $data->stu_name = $request->stu_name[$key];
            $data->stu_section = $request->stu_section[$key];
            $data->stu_ca = $request->stu_ca[$key];
            $data->stu_mid = $request->stu_mid[$key];
            $data->stu_final = $request->stu_final[$key];
            switch($total_mark[$key] = $request->stu_ca[$key] + $request->stu_mid[$key] 
            + $request->stu_final[$key]){
                case $total_mark[$key] >= 80 :
                    $data->stu_mark = "A+";
                    break;
                case $total_mark[$key] >= 70 :
                    $data->stu_mark = "A";
                    break;
                case $total_mark[$key] >= 60 :
                    $data->stu_mark = "A-";
                    break;
                case $total_mark[$key] >= 50 :
                    $data->stu_mark = "B";
                    break;
                case $total_mark[$key] >= 40 :
                    $data->stu_mark = "C";
                    break;
                case $total_mark[$key] < 40 :
                    $data->stu_mark = "F";
                    break;
                
            }
            // $data->stu_mark = $request->stu_mark[$key];
            $data->course_id = $request->course_id[$key];
            // dd($data);
            $data->save();
        }
        $notification = array(
            'message' => 'Marksheet Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DetailMarksheetTeacher($course_id){
        $courses = Course::where('id', $course_id)->first();
        $course_code = $courses->course_code;
        $details = Marksheet::where('course_id', $course_id)->orderBy('id', 'desc')->get();
        return view('teacher.detail_marksheet_teacher', compact('details', 'courses', 'course_code'));
    }

    // Admin Marksheet Details
    public function DetailMarksheetAdmin($course_code){
        $course = Course::where('course_code', $course_code)->first();

        $course_id = $course -> id;
        $details = Marksheet::where('course_id', $course_id)->orderBy('id', 'asc')->get();

        return view('backend.marksheet.detail_marksheet_admin', compact('details', 'course', 'course_code'));

    }



}
