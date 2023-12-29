@extends('admin.admin_dashboard')
@section('admin')


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Student</h4>
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
                             {{--   --}}
                            <form method="post" action="{{ route('student.store') }}" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add Student
                                </h5>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="course_id" class="control-label">Course Id - 
                                            </label>
                                            {{ $course_code}}
                                        <input type="number" name="course_id" id="course_id" class="form-control" value="$course_code">

                                            {{-- <option selected value="{{ $course_code->course_code }}">{{
                                                $course_code->course_name }} - - {{ $course_code->course_code }}</option>
                                       --}}
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Student ID </label>
                                            <input type="number" name="stu_id"
                                                class="form-control @error('stu_id') is-invalid @enderror">
                                            @error('stu_id')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Student Name</label>
                                            <input type="text" name="stu_name"
                                                class="form-control @error('stu_name') is-invalid @enderror">
                                            @error('stu_name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Student Section</label>
                                            <input type="text" name="stu_section"
                                                class="form-control @error('stu_section') is-invalid @enderror">
                                            @error('stu_section')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
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
<script type="text/javascript">
    $(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload =  function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});

</script>

@endsection