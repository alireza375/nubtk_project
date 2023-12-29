@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Assign Course</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <!-- end timeline content-->
                        <div class="tab-pane" id="settings">
                            <!--  -->
                            <form method="post" action="{{ route('store.assign.course') }}">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Assign
                                    Course
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="teacher_id" class="form-label">Assign Teacher </label> <br>
                                            <select name="teacher_id" id="teacher_id" class="form-control">
                                                <option selected disabled>Select Teacher >></option>
                                                @foreach ( $teachers as $teacher )
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            @foreach ($courses as $course)
                                            <div class="input-group mb-2">
                                                <div class="input-group-text">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        multiple value="{{ $course->id }}"
                                                        id="checkbox-{{ $course->id }}">
                                                </div>
                                                <label for="checkbox-{{ $course->id }}"
                                                    class="check-custom mt-1 ms-2">{{
                                                    $course->course_code }} - {{ $course->course_name }}</label>
                                            </div>
                                            @endforeach
                                        </div><!-- /.col-9 -->
                                    </div>
                                </div> <!-- end row -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                            class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row-->
    </div> <!-- container -->
</div> <!-- content -->

<script>
    $('#selectAll').click(function(){
      if($(this).is(':checked') ) {
        $('input[type="checkbox"]').prop('checked', true);
      } else {
        $('input[type="checkbox"]').prop('checked', false);
      }
    });
</script>
@endsection