@extends('teacher.dashboard')
@section('content')

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
            <div class="col-10">
                <div class="card">
                    <div class="card-body mt-5">
                        <div class="page-title-box">
                            <h4 class="page-title">All Student Marksheets</h4>
                        </div>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Student Id</th>
                                    <th>Student Name</th>
                                    <th>Section</th>
                                    <th>Mark</th>
                                    {{-- <th>Date</th> --}}
                                    
                                </tr>
                            </thead>
                            <tbody> 

                                {{-- @if(Auth::user()->id && $teacher_id) --}}

                                @foreach($marks as $key => $item)
                                @php
                                $date = App\models\Marksheet::where('course_id', $item->course_id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $item->stu_id }}</td>
                                    <td>{{ $item->stu_name }}</td>
                                    <td>{{ $item->stu_section }}</td>
                                    <td>{{ $item->stu_mark }}</td>
                                    {{-- <td>{{ Carbon\Carbon::parse($date->date)->format('d-m-Y') }}</td> --}}
                                </tr>
                                @endforeach
                                {{-- @endif --}}
                            </tbody>
                        </table>
                        <a href="{{ route('teacher') }}" class="w-100 btn btn-success mb-4"> Back to Dashboard </a>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->




    </div> <!-- container -->

</div> <!-- content -->


@endsection