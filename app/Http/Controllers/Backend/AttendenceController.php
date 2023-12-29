<?php

namespace App\Http\Controllers\Backend;
use Carbon\Carbon;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Attendence;
use App\Models\AssignCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{
    
    public function ShowAttendenceTeacher(){

        $attendences = Attendence::select('course_id', 'date', 'teacher_id')->groupBy('date', 'course_id')->orderBy('date', 'desc')->where('teacher_id', Auth::user()->id)->get();

        return view('teacher.show_attendence_teacher', compact('attendences'));
    }
    
     public function TakeAttendenceTeacherId($course_id){
        $course = Course::findOrFail($course_id);
        $course_code = $course->course_code;
        $students = DB::table('students')->where('course_id', $course_code)
                                        ->select('students.*', 'courses.*')
                                        ->Join('courses', 'courses.course_code', 'students.course_id')
                                        ->orderBy('stu_id', 'asc')
                                        ->get();
        // dd($students);
        $courses = Course::all();
        return view('teacher.take_attendence_teacher_id', compact('students','courses', 'course'));
    }

    public function StoreAttendenceTeacher(Request $request){
        $countStudent = count($request->student_id);
        for($i=0; $i < $countStudent; $i++){
            $attend_status         = 'attend_status' . $i;
            $attend                = new Attendence();
            $attend->date          = date('Y-m-d', strtotime($request->date));
            $attend->student_id    = $request->student_id[$i];
            $attend->course_id     = $request->course_id;
            $attend->teacher_id     = Auth::user()->id;
            $attend->attend_status = $request->$attend_status;
                // dd($attend);
            $attend->save();
        }

        $notification = array(
            'message'    => 'Attendence Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('show.attendence.teacher')->with($notification);
    }

    // public function EditAttendenceTeacher($date){
    //     $students = Student::all();
    //     $courses  = Course::all();
    //     $editData = Attendence::where('date', $date)->get();
        
 
    //     return view('teacher.edit_attendence_teacher', compact('students', 'courses', 'editData'));
    // }
    public function EditAttendenceTeacher($date, $course_id){
        $students = Student::all();
        $courses  = Course::findOrFail($course_id);
        $editData = Attendence::whereIn('date', [$date])->whereIn('course_id', [$course_id])->get();

       return view('teacher.edit_attendence_teacher', compact('students', 'courses', 'editData'));
    }
    
    public function DetailAttendenceTeacher(Request $request, $date, $course_id){
        $courses = Course::findOrFail($course_id);
        // $details = Attendence::where('date', $date)->get();
        $details = Attendence::whereIn('date', [$date])->whereIn('course_id', [$course_id])->get();

        
        return view('teacher.detail_attendence_teacher', compact('details', 'courses'));
    }

    

}
