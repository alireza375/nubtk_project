@extends('admin.admin_dashboard')
@section('admin')

@php
$date = date('d-F-Y');

@endphp

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @php
        $teachers = App\Models\Teacher::all();
        $courses = App\Models\Course::all();
        @endphp
        
        <div class="row">
            {{-- Total Teachers count --}}
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">

                                <i class="fa-sharp fa-solid fa-person-chalkboard font-22 avatar-title text-white"></i>

                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1">
                                        <span data-plugin="counterup">
                                            {{ $teachers->count() }}
                                        </span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">Total Teachers </p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            
            {{-- Total Courses count --}}
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1">
                                        <span data-plugin="counterup">
                                            {{ $courses->count() }}
                                        </span>
                                    </h3>
                                    <p class="text-muted mb-1 text-truncate">Total Course </p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        @php
        $id = Auth::user()->id;
        @endphp
        <h3 class="text-dark mt-1">Course Details</h3>
        <div class="row">
            @foreach ( $courses as $item)
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body" data-bs-toggle="modal" data-bs-target="#courseModalPopovers-{{$item->id}}">
                        <div class="row">
                            <div class="col-6">

                                <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>

                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"> <span>
                                            <a style="color: #fff;" href="#">CSE {{
                                                $item->course_code
                                                }}</a> <br>
                                        </span></h3>

                                    <p class="text-muted mb-1 text-truncate">{{ $item->course_name }}
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="modal fade" id="courseModalPopovers-{{$item->id}}" tabindex="-1"
                aria-labelledby="exampleModalPopoversLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                      
                        <div class="modal-body">
                            <h2 class="fs-5">Existing Students List</h2>
                                    <p>
                                        
                                        <a href="{{ route('show.student.list', $item->course_code) }}"
                                            class="btn btn-primary" data-bs-toggle="popover"
                                            data-bs-content="Popover body content is set in this attribute."
                                            data-bs-container="#exampleModalPopovers"
                                            data-bs-original-title="Popover title">Student List</a>
                                    </p>
                            <form method="POST" action="{{ route('students.import') }}" enctype="multipart/form-data">
                                @csrf
                                {{-- Course id --}}
                                <input type="hidden" value="{{ $item->course_code }}" name="course_code">

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Student List</label>
                                        <input type="file" name="file" id="formFile"
                                            class="form-control @error('file') is-invalid @enderror">
                                        @error('file')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- end row-->
        <div class="row">


        </div>
        <!-- end row -->

        <div class="row">


        </div>
        <!-- end col -->
    </div>
    <!-- end row -->


</div> <!-- content -->
@endsection