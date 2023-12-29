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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">

                                <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>

                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"> <span>
                                            <a style="color: #fff;" href="">{{
                                                $item->course_code
                                                }}</a> <br>
                                        </span></h3>

                                    <p class="text-muted mb-1 text-truncate">Course Code </p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <!-- Modal -->
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