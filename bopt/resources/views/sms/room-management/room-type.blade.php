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
            <div class="card-header"><strong class="card-title">Add New Room Type</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('sms/room-management/room-type') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
               
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Room Type Id</label>
                      <input type="text" class="form-control" name="room_type_code" value="{{ old('room_type_code') }}">
   				    @if ($errors->has('room_type_code'))
						<div class="error" style="color:red;">{{ $errors->first('room_type_code') }}</div>
					@endif
                    </div>
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Room Type</label>
                      <input type="text" class="form-control" id="cname" name="room_type_name" value="{{ old('room_type_name') }}">
					    @if ($errors->has('room_type_name'))
							<div class="error" style="color:red;">{{ $errors->first('room_type_name') }}</div>
						@endif
                    </div>
                    <div class="col-md-4">
					<label>Status</label>
                      <select class="form-control" name="room_type_status">
                        <option value="" selected disabled>Select</option>
                        <option value="Active" <?php if(old('room_type_status') =='Active') { echo "selected"; } ?>>Active</option>
                        <option value="Inactive" <?php if(old('room_type_status') =='Inactive') { echo "selected"; } ?> >Inactive</option>
                      </select>	
					  @if ($errors->has('room_type_status'))
							<div class="error" style="color:red;">{{ $errors->first('room_type_status') }}</div>
						@endif
					</div>
                  </div>
				  <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                  <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
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
	@include('sms.room-management.partials.scripts')
	<script>
	
		function getInstituteName()
		{
			var institute_name=$("#institute_code :selected").text();
			//alert(institute_name);
			$("#institute_name").val(institute_name);
		}
		
	</script>
@endsection