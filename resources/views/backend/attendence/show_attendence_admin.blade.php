@extends('admin.admin_dashboard')
@section('admin')

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
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb mt-5">
                                    <a href="{{ route('take.attendence.teacher') }}"
                                        class="btn btn-primary rounded-pill waves-effect waves-light">Take Attendence
                                    </a>
                                </ol>
                            </div>
                            <h4 class="page-title">Show Attendence</h4>
                        </div>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Course Name</th>
                                    <th>Course Code</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attendences as $key => $item)
                                @php
                                $date = App\models\Attendence::where('course_id', $item->course_id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item['course']['course_name'] }}</td>
                                    <td>{{ $item['course']['course_code'] }}</td>
                                    <td>{{ Carbon\Carbon::parse($date->date)->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('edit.attendence.admin', $item->course_id) }}"
                                            class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                                        <a href="{{ route('detail.attendence.admin', $item->course_id) }}"
                                            class="btn btn-danger rounded-pill waves-effect waves-light">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('teacher') }}" class="w-100 btn btn-success"> Back to Dashboard </a>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->




    </div> <!-- container -->

</div> <!-- content -->


@endsection