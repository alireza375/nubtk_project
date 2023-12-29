@extends('teacher.dashboard')
@section('content')
<link rel="stylesheet" href="{{asset('backend/assets/css/attend.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('.mytable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                
            ]
        } );
    } );
</script>
<style>
    @media print {
        .dataTables_filter,
        .dataTables_info,
        .pagination,
        .btn-success {
            visibility: hidden;
        }
    }
</style>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
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
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">

                                    <img src="https://nubtkhulna.ac.bd/assets/images/logo.png" alt="" height="70">
                                    <h4>Department of Computer Science & Engineering</h4>
                                    <h5>B.Sc. in Computer Science & Engineering</h5>
                                    <h5
                                        style="padding: 8px 16px; border-radius: 7px; border: 1px solid #000; display: inline-block;">
                                        Consolidated Mark Sheet</h5>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <article>
                                            <strong>Course Code:</strong> {{ $course_code }}<br>
                                            <strong>Course Title:</strong> {{ $courses->course_name }}<br>
                                        </article>
                                    </div>
                        
                                </div>
                            </div>
                        </div>

                        <table id="example" class="mytable display wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <td><strong>Student id </strong></td>
                                    <td><strong>Student Name </strong></td>
                                    <td><strong>Continuous Assessment (30%) </strong></td>
                                    <td><strong>Mid Term (30%) </strong></td>
                                    <td><strong>Final (40%) </strong></td>
                                    <td><strong>Total </strong></td>
                                    <td><strong>Grade </strong></td>
                                    {{-- <td><strong>Remarks </strong></td> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $key => $item)
                                <tr>
                                    <input type="hidden" name="student_id[]" value="{{ $item->stu_id }}"
                                        class="student_id">
                                    <td>{{ $item->stu_id }}</td>
                                    <td>{{ $item->stu_name }}</td>
                                    <td>{{ $item->stu_ca }}</td>
                                    <td>{{ $item->stu_mid }}</td>
                                    <td>{{ $item->stu_final }}</td>
                                    <td>{{ $item->stu_ca + $item->stu_mid + $item->stu_final }}</td>
                                    <td>{{ $item->stu_mark }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @php
                        $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
                        @endphp
                        <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>

                        <div class="d-print-none">
                            <div class="float-end">
                                <a href="{{route('teacher')}}" class="btn btn-success waves-effect waves-light"><i
                                        class="fa fa-print"></i></a>
                            </div>
                        </div>

                    </div>
                    <a href="{{ route('teacher') }}" class="w-100 btn btn-success"> Back to Dashboard </a>
                    <!-- end card body-->

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