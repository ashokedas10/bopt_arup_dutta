@extends('masters.layouts.master')

@section('title')
Configuration-Room
@endsection

@section('sidebar')
	@include('masters.partials.sidebar')
@endsection

@section('header')
	@include('masters.partials.header')
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
            <div class="card-header"><strong class="card-title">Add New Room</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/room') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                 
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Room No.</label>
                      <input type="text" class="form-control" name="room_number" value="{{ old('room_number') }}">
					   @if ($errors->has('room_number'))
							<div class="error" style="color:red;">{{ $errors->first('room_number') }}</div>
						   @endif
                    </div>
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Capacity</label>
                      <input type="text" class="form-control" id="cname" name="room_capacity" value="{{ old('room_capacity') }}" >
					   @if ($errors->has('room_capacity'))
							<div class="error" style="color:red;">{{ $errors->first('room_capacity') }}</div>
						   @endif
                    </div>
                    <div class="col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="room_status">
                        <option value='' selected disabled>Select</option>
							<option value="active" <?php if(old('room_status') ==  "active"){ echo "selected"; } ?> >Active</option>
							<option value="inactive" <?php if(old('room_status') ==  "inactive"){ echo "selected"; } ?> >Inactive</option>
						  </select>
						   @if ($errors->has('room_status'))
							<div class="error" style="color:red;">{{ $errors->first('room_status') }}</div>
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
@include('masters.partials.scripts')

@endsection