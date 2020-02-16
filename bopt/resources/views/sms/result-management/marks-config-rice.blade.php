@extends('sms.room-management.layouts.master')

@section('title')
Room Management
@endsection

@section('sidebar')
	@include('sms.room-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.room-management.partials.header')
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
            <div class="card-header"><strong class="card-title">Add Room Allocation</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('sms/room-management/room-config-institute') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                 <?php if(old('institute_code')==''){ $institute=$institute_code; }else{ $institute=old('institute_code');} ?>
				 <input type="hidden" name="institute_code" id="institute_code" value="{{ $institute }}" >
				<div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  <!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
                  <div class="row form-group lv-due-body">
                    
					  <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Select Faculty</label>
                      <select class="form-control" name="faculty_id" id="faculty_id" onchange="getCourse(this.value);" required>
                        <option value='' selected disabled>Select</option>
						@foreach($faculty_rs as $faculty)
                        <option value="{{ $faculty->faculty_id }}" >{{ $faculty->faculty_name }}</option>
                        @endforeach
                      </select>
					  	@if ($errors->has('faculty_id'))
						<div class="error" style="color:red;">{{ $errors->first('faculty_id') }}</div>
						@endif
                    </div>
					  <div class="col-md-4">
					  	<label for="text-input" class=" form-control-label">Course Name</label>
						<select class="form-control" name="course_code" id="course_code" onchange="getSubject(this.value);" required>
                           <option value="" selected disabled >Select</option>
                        </select>
						@if ($errors->has('course_code'))
						<div class="error" style="color:red;">{{ $errors->first('course_code') }}</div>
						@endif
					  </div>
					  <div class="col-md-4">
					   	<label>Subject</label>
						<select class="form-control" name="subject_code" id="subject_code" required>
                          <option value="" selected disabled >Select</option>
                        </select>
						@if ($errors->has('subject_code'))
						<div class="error" style="color:red;">{{ $errors->first('subject_code') }}</div>
						@endif
					   </div>
					  </div>
					  <div class="row form-group">
					   
                     <div class="col-md-4">
					 	<label>Room No.</label>
						 <select class="form-control" name="room_code" id="room_code" required>
							<option value="" selected disabled>Select</option>
							@foreach($room_rs as $room)
							<option value="{{ $room->room_code }}">{{ $room->room_number }}</option>
							@endforeach
						</Select>
						@if ($errors->has('room_code'))
						<div class="error" style="color:red;">{{ $errors->first('room_code') }}</div>
						@endif
					 </div>
                    <div class="col-md-4">
					<label>Status</label>
						<select class="form-control" name="room_config_status" required>
							<option value=""  selected disabled>Select</option>
							<option value="active">Active</option>
							<option value="inactive">Inactive</option>
						</select>
						@if ($errors->has('room_config_status'))
						<div class="error" style="color:red;">{{ $errors->first('room_config_status') }}</div>
						@endif
					</div>
                  </div>
				  
				 
					 
				 
                </div>
					<button type="submit" class="btn btn-danger btn-sm">Submit</button>
                    <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>

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
	@include('sms.room-management.partials.scripts')
	
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
	
	<script>
		
		function getSubject(course_id)
		{
			var institute_code=$("#institute_code").val();
			var faculty_id=$("#faculty_id").val();
			
			//alert("institute_code"+institute_code);
			//alert("faculty_id"+faculty_id);
			$.ajax({
				type:'GET',
				url:'{{url('sms/admission/get-course-subject')}}/'+institute_code+'/'+faculty_id+'/'+course_id,				
				success: function(response){
					console.log(response); 
					
					$("#subject_code").html(response);
				
				}
				
			});
		}
		
	</script>
	
@endsection

