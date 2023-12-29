@extends('teacher.dashboard')
@section('content')
{{-- No need this code for this project --}}


{{-- public function AddMarksheetTeacher(){
         $students = Student::all();
         $courses = Course::all();
         return view('teacher.add_marksheet', compact('students', 'courses'));
     } --}}



















<link rel="stylesheet" href="{{asset('backend/assets/css/attend.css')}}">
<style>
    .switch-toggle {
        width: auto;
    }

    .switch-toggle label:not(.disabled) {
        cursor: pointer;
    }

    .switch-candy a {
        border: 1px solid #333;
        border-radius: 3px;
        background-color: white;
        background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.2), transparent);
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.2), transparent);
    }

    .switch-toggle.switch-candy,
    .switch-light.switch-candy>span {
        background-color: #5a6268;
        border-radius: 3px;
        box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.2);
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">

            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body mt-5">

                        <form action="{{ route('store.marksheet.teacher') }}" method="post" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 col-4">
                                    {{-- <div class="form-group col-md-12">
                                        <label for="date" class="control-label">Attendance Date</label>
                                        <input type="date" name="date" id="date"
                                            class="checkdate form-control form-control-sm singledatepicker"
                                            placeholder="Attendance Date" autocomplete="off">
                                    </div>
                                    <br> --}}
                                    {{-- <div class="form-group col-md-12">
                                        <label for="course_id" class="control-label">Course Id</label>
                                        <select name="course_id" id="course_id" class="form-control">
                                            <option selected disabled>Select Course >></option>
                                            @foreach ( $courses as $course )
                                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <br>
                                </div><!-- /.col-4 -->
                                <div class="col-md-7 col-4 text-center">
                                    <h3>Take Marks</h3>
                                </div><!-- /.col-4 -->

                                <div class="col-md-2 col-4">
                                    <div class="">
                                        <ol class="breadcrumb">
                                            <h4>
                                                <a href="{{ route('show.attendence.teacher') }}"
                                                    class="btn btn-primary float-sm-right">
                                                    <i class="fas fa-list"></i>Student
                                                    Attendance List</a>
                                            </h4>
                                        </ol>
                                    </div>
                                </div><!-- /.col-2 -->

                            </div><!-- /.row -->


                            <table class="table sm table-bordered table-striped dt-responsive" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Stu Id</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Student Name
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Section
                                        </th>
                                        <th class="text-center" style="vertical-align: middle">CA</th>
                                        <th class="text-center" style="vertical-align: middle">Mid</th>
                                        <th class="text-center" style="vertical-align: middle">Final</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $key => $student)
                                    <tr class="text-center">
                                        {{-- <input type="hidden" name="stu_id[]" value="{{$student->stu_id}}"
                                            class="student_id"> --}}

                                        <td>
                                            <input type="number" name="stu_id[]" value="{{$student->stu_id}}"
                                                class="student_id" hidden="">
                                            {{$student->stu_id}}
                                        </td>
                                        <td>
                                            <input type="text" name="stu_name[]" value="{{$student->stu_name}}"
                                                class="student_name" hidden="">
                                            {{$student->stu_name}}
                                        </td>
                                        <td>
                                            <input type="text" name="stu_section[]" value="{{$student->stu_section}}"
                                                class="student_section" hidden="">
                                            {{$student->stu_section}}
                                        </td>

                                        <td colspan="3">
                                            <input type="number" name="stu_mark[]">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="w-100 btn btn-success"> Submit </button>
                        </form>
                    </div>
                    <!-- end card body-->
                    <a href="{{ route('teacher') }}" class="w-100 btn btn-primary"> Back to Dashboard </a>
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->
        </div>
        <!-- end row-->
    </div>
    <!-- container -->
</div>
<!-- content -->



@endsection