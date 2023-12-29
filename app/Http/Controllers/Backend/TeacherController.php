<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function TeacherDashboard(){
        $id = Auth::user()->id;
        $assigned = DB::table('assign_courses')
                    ->select('assign_courses.*', 'teachers.*', 'courses.*')
                    ->leftJoin('teachers', 'teachers.id', 'assign_courses.teacher_id')
                    ->leftJoin('courses', 'courses.id', 'assign_courses.course_id')
                    ->get();
                    
        return view('teacher.index', compact('assigned'));
    }
    // file_get_contents
    public function AllTeacher(){
            //database theke latest data ta get ar madhome receive krtise and compactact kre data pathai disse.
        $teacher = Teacher::all();
        return view('backend.teachers.all_teacher',compact('teacher'));
    } // End All Teacher Method 
    public function AddTeacher(){
        $courses = Course::all();
        return view('backend.teachers.add_teacher', compact('courses'));
    } // End Add Teacher Method 
    public function TeacherProfile(){
        $id = Auth::user()->id;
        $teacherData = Teacher::where('user_id', $id)->first();
        return view('teacher.teacher_profile_view' ,compact('teacherData'));
    }

    // form aar vitor je data gula dissi seigula store method ar modhe store hosse
    public function StoreTeacher(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:teachers,email|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'salary' => 'required|max:200',
            'image' => 'required',
        ],
        [
            'name.required' => 'This Teacher Name Field Is Required',
        ]
        );
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/teacher/'.$name_gen);
        $save_url = '/upload/teacher/'.$name_gen;
        $user_id = $request->user_id;
        User::insert([
            'id' => $user_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'teacher',
            'created_at' => Carbon::now(), 
        ]);
        // Data gula database a insert hosse
        Teacher::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'salary' => $request->salary,
            'image' => $save_url,
            'user_id' => $user_id,
            'created_at' => Carbon::now(), 
        ]);
         $notification = array(
            'message' => 'Teacher Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.teacher')->with($notification);
    } // End All Teacher Store Method 

    public function EditTeacher($id){
        $teacher = Teacher::findOrFail($id);
        $courses = Course::all();
        return view('backend.teachers.edit_teacher',compact('teacher', 'courses'));
    } // End Edit Teacher Method 

    public function UpdateTeacher(Request $request){
        $teacher_id = $request->id;
        $user_id = $request->user_id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/teacher/'.$name_gen);
            $save_url = '/upload/teacher/'.$name_gen;
            Teacher::findOrFail($teacher_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => $save_url,
                'user_id' => $user_id,
                'updated_at' => Carbon::now(), 
            ]);
            $notification = array(
                'message' => 'Teacher Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.dashboard')->with($notification);
        } else{
            Teacher::findOrFail($teacher_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'user_id' => $user_id,
                'updated_at' => Carbon::now(), 
            ]);

            $notification = array(
                'message' => 'Teacher Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('teacher')->with($notification);
        } // End else Condition  


    } // End Method 

    public function DeleteTeacher($id){
        $teacher_id = Teacher::findOrFail($id);
        $t_id = $teacher_id->user_id;
        $user_id = User::findOrFail($t_id);
        $teacher_id->delete();
        $user_id->delete();
        $notification = array(
            'message' => 'Teacher Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function TeacherDestroy(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

         $notification = array(
            'message' => 'Teacher Logout Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('home')->with($notification);
    } // End Method 


}
 