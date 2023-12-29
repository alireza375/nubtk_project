<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\AssignCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function AllCourse(){
            //database theke latest data ta get ar madhome receive krtise and compactact kre data pathai disse.
        $course = Course::all();
        return view('backend.courses.all_course',compact('course'));
    } // End All Teacher Method 

    public function AddCourse(){
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('backend.courses.add_course', compact('teachers', 'courses'));
    } // End Add Teacher Method 

    public function StoreCourse(Request $request)
    {
        // $teacher_code = $request->input('teacher');
        $course_id = Course::insertGetId([
            'course_name' => $request->input('course_name'), //12312421
            'course_code' => $request->input('course_code'), //John Doe
            'course_name_slug' => strtolower(str_replace(' ', '-', $request->course_code)),
            'duration' => $request->duration,
            'attendence' => $request->attendence,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Course Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.course')->with($notification);
    }

    public function EditCourse($id){
        $course = Course::find($id);
        return view('backend.courses.edit_course',compact('course'));
    }// End Method 

    public function UpdateCourse(Request $request)
    {
        $id = $request->id;
        $course_id = Course::findOrFail($id)->update([
            'course_name' => $request->input('course_name'),
            'course_code' => $request->input('course_code'),
            'course_name_slug' => strtolower(str_replace(' ', '-', $request->course_code)),
            'duration' => $request->duration,
            'attendence' => $request->attendence,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Course Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.course')->with($notification);
    }

    public function DeleteCourse($id){
        $course_id = Course::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Course Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
