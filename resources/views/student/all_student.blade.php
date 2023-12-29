@extends('admin.admin_dashboard')
@section('admin')


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            {{--  --}}
                            <a href="{{ route('add.student', $course_code) }}"
                                class="btn btn-primary rounded-pill waves-effect waves-light">Add Student </a>

                            
                               
                             <a href="{{ route('detail.marksheet.admin', $course_code) }}"
                                    class="btn btn-primary rounded-pill waves-effect waves-light">
                                    <i class="fas fa-list"></i>Student
                                    Marksheet List</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Student List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        {{-- <div class="col-md-2 col-4">
            <div class="">
                <ol class="breadcrumb">
                    <h4>
                        <a href="#"
                            class="btn btn-primary float-sm-right">
                            <i class="fas fa-list"></i>Student
                            Marksheet List</a>
                    </h4>
                </ol>
            </div>
        </div> --}}
        <!-- /.col-2 -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Student Section</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $key=> $item)
                                <tr>
                                    <td>{{ $item->stu_id }}</td>
                                    <td>{{ $item->stu_name }}</td>
                                    <td>{{ $item->stu_section }}</td>
                                    <td>
                                        
                                        <a href="{{ route('delete.student', $item->id) }}"
                                            class="btn btn-danger rounded-pill waves-effect waves-light"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->




    </div> <!-- container -->

</div> <!-- content -->

@endsection