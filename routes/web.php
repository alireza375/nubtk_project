<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\CsvController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\MarksheetController;
use App\Http\Controllers\Backend\AttendenceController;
use App\Http\Controllers\Backend\AssignCourseController;


Route::controller(HomeController::class)->group(function () {
  Route::get('/', 'HomeMain')->name('home');
});


Route::get('/dashboard', function () {
  return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

Route::middleware(['auth'])->group(function(){ 

  Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
  Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
  Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
  
  Route::get('/teacher/profile', [TeacherController::class, 'TeacherProfile'])->name('teacher.profile');
  
// Teacher All Route 
  Route::controller(TeacherController::class)->group(function(){

    Route::get('/teacher/logout', [TeacherController::class, 'TeacherDestroy'])->name('teacher.logout');

    Route::get('/teacher/dashboard','TeacherDashboard')->name('teacher');
    Route::get('/teacher/profile', 'TeacherProfile')->name('teacher.profile');

    Route::get('/all/teacher','AllTeacher')->name('all.teacher');
    Route::get('/add/teacher','AddTeacher')->name('add.teacher');
    Route::post('/store/teacher','StoreTeacher')->name('teacher.store');
    Route::get('/edit/teacher/{id}','EditTeacher')->name('edit.teacher');
    Route::post('/update/teacher','UpdateTeacher')->name('teacher.update');
    Route::get('/delete/teacher/{id}','DeleteTeacher')->name('delete.teacher');
  });

  Route::controller(StudentController::class)->group(function(){
    Route::post('/import-students', 'store')->name('students.import');
    Route::get('/all/student/list/{course_code}', 'AllStudent')->name('show.student.list');
    Route::get('/add/student/{course_code}', 'AddStudent')->name('add.student');
    Route::post('/store/student', 'StoreStudent')->name('student.store');
    Route::get('/delete/student/{id}', 'DeleteStudent')->name('delete.student');
  });

  Route::controller(CourseController::class)->group(function(){
    Route::get('/all/course','AllCourse')->name('all.course');
    Route::get('/add/course','AddCourse')->name('add.course');
    Route::post('/store/course','StoreCourse')->name('store.course');
    Route::get('/edit/course/{id}','EditCourse')->name('edit.course');
    Route::post('/update/course','UpdateCourse')->name('course.update');
    Route::get('/delete/course/{id}','DeleteCourse')->name('course.delete');
  });

  Route::controller(AssignCourseController::class)->group(function(){
    Route::get('show/assign/course','ShowAssignCourse')->name('show.assign.course');
    Route::get('/assign/course','AssignCourse')->name('assign.course');
    Route::post('store/assign/course', 'StoreAssignCourse')->name('store.assign.course');
    Route::get('delete/assign/course/{id}', 'DeleteAssignCourse')->name('delete.assign.course');
  });

  Route::controller(AttendenceController::class)->group(function(){

    // Admin Attendence
    // Route::get('show/attendence/admin','ShowAttendenceAdmin')->name('show.attendence.admin');
    // Route::get('take/attendence/admin','TakeAttendenceAdmin')->name('take.attendence.admin');
    // Route::post('store/attendence/admin','StoreAttendenceAdmin')->name('store.attendence.admin');
    // Route::get('edit/attendence/admin/{course_id}','EditAttendenceAdmin')->name('edit.attendence.admin');
    // Route::get('detail/attendence/admin/{course_id}','DetailAttendenceAdmin')->name('detail.attendence.admin');

    // Teacher Attendence
    Route::get('show/attendence/teacher','ShowAttendenceTeacher')->name('show.attendence.teacher');
    Route::get('take/attendence/teacher/{course_id}','TakeAttendenceTeacherId')->name('take.attendence.teacher.id');
    Route::post('store/attendence/teacher','StoreAttendenceTeacher')->name('store.attendence.teacher');
    Route::get('edit/attendence/teacher/{date}/{course_id}','EditAttendenceTeacher')->name('edit.attendence.teacher');
    Route::get('detail/attendence/teacher/{date}/{course_id}','DetailAttendenceTeacher')->name('detail.attendence.teacher');
  });

  // Marksheet Controller
  Route::controller(MarksheetController::class)->group(function(){
    //Admin
    Route::get('detail/marksheet/admin/{course_code}','DetailMarksheetAdmin')->name('detail.marksheet.admin');

    // Teacher
    Route::get('show/marksheet/teacher','ShowMarksheetTeacher')->name('show.marksheet.teacher');
    Route::get('add/marksheet/teacher','AddMarksheetTeacher')->name('add.marksheet.teacher');
    Route::get('add/marksheet/teacher/{course_id}','AddMarksheetTeacherId')->name('add.marksheet.teacher.id');
    Route::post('store/marksheet/teacher','StoreMarksheetTeacher')->name('store.marksheet.teacher');
    Route::get('detail/marksheet/teacher/{course_id}','DetailMarksheetTeacher')->name('detail.marksheet.teacher');
    Route::get('marksheet/pdf/{course_id}', 'MarksheetPdf')->name('marksheet.pdf');
  });

});


Route::get('/data', [CsvController::class, 'index']);