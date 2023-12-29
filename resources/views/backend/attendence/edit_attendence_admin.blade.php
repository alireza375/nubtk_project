@extends('admin.admin_dashboard')
@section('admin')

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

                        <form action="{{ route('store.attendence.teacher') }}" method="post" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 col-4">
                                    <div class="form-group col-md-12">
                                        <label for="date" class="control-label">Attendance Date</label>
                                        <input type="date" name="date" id="date" value="{{ $editData['0']['date'] }}"
                                            class="checkdate form-control form-control-sm singledatepicker"
                                            placeholder="Attendance Date" autocomplete="off">
                                    </div>
                                    <br>
                                    @php
                                    $course_id = $editData['0']['course_id'];
                                    $course = App\models\Course::where('id', $course_id)->first();
                                    $course_name = $course->course_name;
                                    @endphp
                                    <div class="form-group col-md-12">
                                        <label for="course_id" class="control-label">Course Code</label>
                                        <select name="course_id" id="course_id" class="form-control">
                                            <option selected disabled>Select Course >></option>

                                            <option {{ $course_name && $course->course_name ? 'selected' : '' }}
                                                value="{{ $course->id }}">{{
                                                $course->course_name }} - - {{ $course->course_code }}</option>
                                            @foreach ( $courses as $course )
                                            <option value="{{ $course->id }}">{{
                                                $course->course_name }} - - {{ $course->course_code }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <br>
                                </div><!-- /.col-4 -->
                                <div class="col-md-7 col-4 text-center">
                                    <h3>Edit Attendence</h3>
                                </div><!-- /.col-4 -->

                                <div class="col-md-2 col-4">
                                    <div class="">
                                        <ol class="breadcrumb">
                                            <h4>
                                                <a href="{{ route('show.attendence.admin') }}"
                                                    class="btn btn-primary float-sm-right">
                                                    <i class="fas fa-list"></i> Student
                                                    Attendance List</a>
                                            </h4>
                                        </ol>
                                    </div>
                                </div><!-- /.col-2 -->

                            </div><!-- /.row -->


                            <table class="table sm table-bordered table-striped dt-responsive" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Stu Id.</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">student Name
                                        </th>
                                        <th colspan="3" class="text-center" style="vertical-align: middle">Attendance
                                            Status</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center btn present_all"
                                            style="display: table-cell;background-color:#114190">Present</th>
                                        <th class="text-center btn leave_all"
                                            style="display: table-cell;background-color:#114190">Leave</th>
                                        <th class="text-center btn absent_all"
                                            style="display: table-cell;background-color:#114190">Absent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($editData as $key => $item)
                                    <tr class="text-center">
                                        <input type="hidden" name="student_id[]" value="{{$item['student']['stu_id']}}"
                                            class="student_id">
                                        <td>{{$item['student']['stu_id']}}</td>
                                        <td>{{$item['student']['stu_name']}}</td>
                                        <td colspan="3">
                                            <div class="switch-toggle switch-3 switch-candy">
                                                <input class="present" id="present{{$key}}" name="attend_status{{$key}}"
                                                    value="Present" type="radio" {{ $item->attend_status == 'present' ?
                                                'checked' : '' }}>

                                                <label for="present{{$key}}">Present</label>
                                                <input class="leave" id="leave{{$key}}" name="attend_status{{$key}}"
                                                    value="Leave" type="radio" {{ $item->attend_status == 'Leave' ?
                                                'checked' : '' }}>

                                                <label for="leave{{$key}}">Leave</label>
                                                <input class="absent" id="absent{{$key}}" name="attend_status{{$key}}"
                                                    value="Absent" type="radio" {{ $item->attend_status == 'Absent' ?
                                                'checked' : '' }}>

                                                <label for="absent{{$key}}">Absent</label>
                                                <a></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
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

<script type="text/javascript">
    $(document).on('click','.present',function(){
      $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
      });
      $(document).on('click','.leave',function(){
      $(this).parents('tr').find('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057');
      });
      $(document).on('click','.absent',function(){
      $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#dee2e6');
      });
</script>
<script type="text/javascript">
    $(document).on('click','.present_all',function(){
      $("input[value=Present]").prop('checked',true);
      $('.datetime').css('ponter-events','none').css('background-color','#dee2e6').css('color','#495057');
      });
      $(document).on('click','.leave_all',function(){
      $("input[value=Leave]").prop('checked',true);
      $('.datetime').css('ponter-events','').css('background-color','white').css('color','#495057');
      });
      $(document).on('click','.absent_all',function(){
      $("input[value=Absent]").prop('checked',true);
      $('.datetime').css('ponter-events','none').css('background-color','#dee2e6').css('color','#dee2e6');
      });
</script>

@endsection