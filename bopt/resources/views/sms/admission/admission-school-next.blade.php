@extends('sms.admission.layouts.master')

@section('title')
Admission Management
@endsection

@section('sidebar')
	@include('sms.admission.partials.sidebar')
@endsection

@section('header')
	@include('sms.admission.partials.header')
@endsection


	
@section('content')
 <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
					<div class="card-header">
                                <strong class="card-title">Admission</strong>
                            </div>
					<div class="card-body">
						<form action="{{ url('sms/admission/new-admission-school') }}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" >
						 
							<div class="row form-group">
								<?php if(old('institute_code')==''){ $institute=$institute_code; }else{ $institute=old('institute_code');} ?>
								<input type="hidden" name="institute_code" id="institute_code" value="{{ $institute }}" >
								
								<div class="col-md-4">
									<label>Select Class</label>
									<select class="form-control" name="class_code" >
										<option value="" selected disabled>Select</option>
										@foreach($class_rs as $class)
											<option value="{{ $class->class_code }}">{{ $class->class_name }}</option>
										@endforeach
									</select>
								</div>
								
									<div class="col-md-4">
										<label>Session</label>
										<select class="form-control" name="session" >
											<option value='' selected disabled>Select</option>
											<?php
												for($i=2018; $i<=2030; $i++)
												{
											?>
											<option value="{{ $i }}" >{{ $i }}</option>
											<?php
												}
											?>
										</select>
									</div>
									<div class="col-md-4 btn-up">
									<button type="submit" class="btn btn-danger btn-sm">Go</button>
									</div>
								
								
							</div>
							
							
						</form>
					</div>
					</div>
      </div>
    </div>
  </div>
  <!-- /Widgets -->
</div>
<!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>
@endsection

@section('scripts')
	@include('sms.admission.partials.scripts')
		
	<script>
		
		function getCourse(faculty_id)
		{
			var institute_code=$("#institute_code").val();
			//alert("institute_code"+institute_code);
			//alert("faculty_id"+faculty_id);
			$.ajax({
				type:'GET',
				url:'{{url('sms/admission/get-course')}}/'+institute_code+'/'+faculty_id,				
				success: function(response){
					console.log(response); 
				
					$("#course_code").html(response);
				
				}
				
			});
		}
		
	</script>
	
@endsection
