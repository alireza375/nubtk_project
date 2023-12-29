<?php

namespace App\Http\Controllers\Backend;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class StudentController extends Controller
{
    public function AllStudent($course_code){
        $students = Student::where('course_id', $course_code)->get();
        return view('student.all_student', compact('students', 'course_code'));
    }

    public function AddStudent($course_code){
        return view('student.add_student', compact('course_code'));

    }

    public function StoreStudent(Request $request){
        $validateData = $request->validate([
            'stu_id' => 'required|max:200',
            'stu_name' => 'required|max:200',
            'stu_section' => 'required|max:200',
            'course_id' => 'required|max:200',
        ],
        
        [
            'name.required' => 'This Student Name Field Is Required',
        ]

        );

        Student::insert([
            'stu_id' => $request->stu_id,
            'stu_name' => $request->stu_name,
            'stu_section' => $request->stu_section,
            'course_id' => $request->course_id,
            'created_at' => Carbon::now(), 
        ]);
            $notification = array(
            'message' => 'Students data imported successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.dashboard')->with($notification); 
    } // End Method 


    public function store(Request $request)
    {
        // Validate the uploaded file (you can adjust the validation rules as needed)
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        // Get the file from the request
        $file = $request->file('file');

        // Read the contents of the text file
        $contents = file_get_contents($file);
        $course_id = $request->course_code;
        // Split the contents into an array of lines
        $lines = explode("\n", $contents);
        // Iterate through the lines and insert values into the students table
        foreach ($lines as $line) {
            $student = new Student();
            $data = explode(',', $line);
            $student['stu_id'] = trim($data[0], "\xEF\xBB\xBF"); // Assuming the first column is the student's ID
            
            $student['stu_name'] = trim($data[1], "\ "); // Assuming the second column is the student's NAME
            
            $student['stu_section'] = trim($data[2], "\ \r"); // Assuming the third column is the student's SECTION
            $enroll = DB::table('students')->insert([
                'course_id'=> $request->course_code,
                'stu_id'=> trim($data[0], "\xEF\xBB\xBF"),
                'stu_name'=> trim($data[1], "\xEF\xBB\xBF"),
                'stu_section'=> trim($data[2], "\xEF\xBB\xBF"),
            ]);
            
        }
        $notification = array(
            'message' => 'Students data imported successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.dashboard')->with($notification);
    }

    public function DeleteStudent($id){
        $student_id = Student::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Student Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    
}

