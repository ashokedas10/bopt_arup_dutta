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



@section('scripts')
	@include('sms.room-management.partials.scripts')
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
              <form action="{{ url('sms/room-management/room-config-school') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
										<!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
                  <div class="row form-group lv-due-body">
                    <?php if(old('institute_code')==''){ $institute=$institute_code; }else{ $institute=old('institute_code');} ?>
						<input type="hidden" name="institute_code" id="institute_code" value="{{ $institute }}" >
					  
						<div class="col-md-4">
					  	<label for="text-input" class=" form-control-label">Class Name</label>
						<select class="form-control" name="class_code" required>
							<option value="" selected disabled>Select</option>
							@foreach($class_rs as $class)
								<option value="{{ $class->class_code }}">{{ $class->class_name }}</option>
							@endforeach
						</select>
						@if ($errors->has('class_code'))
						<div class="error" style="color:red;">{{ $errors->first('class_code') }}</div>
						@endif
						</div>
					  
					   <div class="col-md-4">
					 	<label>Room No.</label>
						 <select class="form-control" name="room_code" required>
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
