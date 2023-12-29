@extends('teacher.dashboard')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Teacher Profile</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @php
        $id = Auth::user()->id;
        $teacherData = App\Models\Teacher::where('user_id', $id)->first();
        @endphp
        <div class="row">

            <!-- Teacher Profile -->
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ (!empty($teacherData->image)) ? url($teacherData->image) : url('upload/no_image.jpg') }}"
                            class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                        <h4 class="mb-0">{{ $teacherData->name }}</h4>
                        <p class="text-muted">{{ $teacherData->email}}</p>

                        <div class="text-start mt-3">
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{
                                    $teacherData->name}}</span>
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Phone :</strong><span class="ms-2">{{
                                    $teacherData->phone}}</span>
                            </p>
                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{
                                    $teacherData->email}}</span>
                            </p>
                        </div>

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                        class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                        class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                        class="mdi mdi-twitter"></i></a>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                @php
                $id = Auth::user()->id;
                $teacher = App\Models\Teacher::where('user_id', $id)->first();
                $teacher_id = $teacher->id;
                @endphp
                <div class="row">
                    @foreach ($assigned as $key => $item)
                    @if ($teacher_id === $item->teacher_id)

                    <div class="col-md-12 col-xl-6">
                        <div class="widget-rounded-circle card">
                            <div class="card-body" data-bs-toggle="modal"
                                data-bs-target="#courseModalPopovers-{{$item->id}}">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-end">
                                            <span>
                                                <a style="color: #fff;" href="#">
                                                    CSE {{ $item->course_code }}
                                                </a>
                                                <br>
                                            </span></h3>
                                            <p class="text-muted mb-1 text-truncate">
                                                Course Name: {{ $item->course_name}}
                                            </p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div>
                    <!--Attendence and Mart Sheet Buttom Section -->
                    <div class="modal fade" id="courseModalPopovers-{{$item->id}}" tabindex="-1"
                        aria-labelledby="exampleModalPopoversLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2 class="fs-5">Here We can see Attendance sheet</h2>
                                    <p>
                                        <a href="{{ route('take.attendence.teacher.id', $item->course_id) }}"
                                            class="btn btn-primary" data-bs-toggle="popover"
                                            data-bs-content="Popover body content is set in this attribute."
                                            data-bs-container="#exampleModalPopovers"
                                            data-bs-original-title="Popover title">Take Attendence</a>
                                    </p>
                                    <hr>
                                    <h2 class="fs-5">Here We can see Mark sheet</h2>
                                    <p>
                                        <a href="{{ route('add.marksheet.teacher.id', $item->course_id) }}"
                                            class="btn btn-primary" data-bs-toggle="popover"
                                            data-bs-content="Popover body content is set in this attribute."
                                            data-bs-container="#exampleModalPopovers"
                                            data-bs-original-title="Popover title">Add MarkSheets</a>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end col-->
                    @endforeach
                </div>
            </div> <!-- content -->
        </div>
    </div>

</div>

@endsection