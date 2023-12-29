<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\AssignCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AssignCourseController extends Controller
{
    public function ShowAssignCourse(){
        $assigned = DB::table('assign_courses')
                    ->select('assign_courses.*', 'teachers.name', 'courses.course_code')
                    ->leftJoin('teachers', 'teachers.id', 'assign_courses.teacher_id')
                    ->leftJoin('courses', 'courses.id', 'assign_courses.course_id')
                    ->get();
        return view('backend.assign-course.show_assign_course', compact('assigned'));
    }

    public function AssignCourse(){
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('backend.assign-course.assign_course', compact('teachers', 'courses'));

    }
    
    public function StoreAssignCourse(Request $request){
        $data = array();
        $courses = $request->course;
        foreach($courses as $key => $item){
            $data['teacher_id'] = $request->teacher_id;
            $data['course_id'] = $item;
            DB::table('assign_courses')->insert($data);
        }
        $notification = [
            'message'    => 'Assigned Course Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.teacher')->with($notification);
    } // StoreAssignCourse end
    
    // DeleteAssignCourse
    public function DeleteAssignCourse($id){
        AssignCourse::findOrFail($id)->delete();
        $notification = [
            'message'    => 'Assigned Course Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
