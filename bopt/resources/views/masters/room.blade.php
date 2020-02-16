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
                      <label for="text-input" class=" form-control-label">Location</label>
                      <input type="text" class="form-control" name="location" value="{{ old('location') }}" id="location" onblur="getroomid();">
					  @if ($errors->has('location'))
						<div class="error" style="color:red;">{{ $errors->first('location') }}</div>
					   @endif
                    </div>
                    <div class="col-md-4" >
                      <label for="text-input" class=" form-control-label">Select Building No.</label>
                      <select class="form-control" name="building_no" id="building_no" onchange="getroomid();" >
                        <option selected disabled>Select</option>
						<?php for($i=1; $i<=30; $i++){ 
							if($i<10)
							{
								$building_no='0'.$i;
							}
							else
							{
								$building_no=$i;
							}
						?>
                        <option value="<?php echo $building_no; ?>" <?php if(old('building_no')==$building_no){ echo "selected"; } ?> ><?php echo $building_no; ?></option>
                        <?php } ?>
                      </select>
						@if ($errors->has('building_no'))
						<div class="error" style="color:red;">{{ $errors->first('building_no') }}</div>
					   @endif
                    </div>
					
					<div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Select Floor No.</label>
                      <select class="form-control" name="floor_no" id="floor_no" onchange="getroomid();" >
                        <option selected disabled>Select</option>
						<?php for($i=1; $i<=30; $i++){ 
							if($i<10)
							{
								$floor_no='0'.$i;
							}
							else
							{
								$floor_no=$i;
							}
						?>
                        <option value="<?php echo $floor_no; ?>" <?php if(old('floor_no')==$floor_no){ echo "selected"; } ?> ><?php echo $floor_no; ?></option>
                        <?php } ?>
					</select>
					@if ($errors->has('floor_no'))
						<div class="error" style="color:red;">{{ $errors->first('floor_no') }}</div>
					   @endif
                    </div>
					</div>
					<div class="row form-group">
					<div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Select Room No.</label>
                       <select class="form-control" name="room_number" id="room_number" onchange="getroomid();" >
                        <option selected disabled>Select</option>
						<?php for($i=1; $i<=30; $i++){
							if($i<10)
							{
								$room_no='0'.$i;
							}
							else
							{
								$room_no=$i;
							}
						?>
                        <option value="<?php echo $room_no; ?>" <?php if(old('room_number')==$room_no){ echo "selected"; } ?> ><?php echo $room_no; ?></option>
                        <?php } ?>
					</select>
					   @if ($errors->has('room_number'))
						<div class="error" style="color:red;">{{ $errors->first('room_number') }}</div>
					   @endif
                    </div>
					<div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Room Id</label>
					  <input type="text" class="form-control" name="room_code" id="room_code" value="{{ old('room_code') }}" readonly >
					  @if ($errors->has('room_code'))
						<div class="error" style="color:red;">{{ $errors->first('room_code') }}</div>
					   @endif
					 </div>
					 <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Room Type</label>
					  <select class="form-control" name="room_type_code">
                         <option selected disabled>Select</option>
                         @foreach($room_type_rs as $room_type)
							<option value="{{ $room_type->room_type_code }}" <?php if(old('room_type_code')==$room_type->room_type_code){ echo "selected"; } ?> >{{ $room_type->room_type_name }}</option>		
						 @endforeach
						 
                      </select>
					   @if ($errors->has('room_type_code'))
						<div class="error" style="color:red;">{{ $errors->first('room_type_code') }}</div>
					   @endif
					 </div>
                    
                  </div>
				  
				<div class="row form-group">
				  <div class="col-md-4">
				  <label>Accessories</label>
						<select data-placeholder="Select Accessories" multiple class="standardSelect" name="accessories_code[]" >
                           @foreach($accessories_rs as $accessories)
							<option value="{{ $accessories->accessories_code }}"  >{{ $accessories->accessories_name }}</option>		
						   @endforeach
                        </select>
						 @if ($errors->has('accessories_code'))
						<div class="error" style="color:red;">{{ $errors->first('accessories_code') }}</div>
					   @endif
				  </div>
				   <div class="col-md-4">
				  <label>Room Capacity</label>
						 <input type="text" class="form-control" name="room_capacity" value="{{ old('room_capacity') }}">
						@if ($errors->has('room_capacity'))
							<div class="error" style="color:red;">{{ $errors->first('room_capacity') }}</div>
						@endif
				  </div>
					<div class="col-md-4 btn-up">
						<button type="submit" class="btn btn-danger btn-sm">Submit</button>
						<button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>

					</div>
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
@include('masters.partials.scripts')
<script>
		
		function getroomid(roomno)
		{
			var location=$("#location").val().toUpperCase();
			var loc = location.slice(0, 3);
			var building_no=$("#building_no").val();
			var floor_no=$("#floor_no").val();
			var roomno=$("#room_number").val();
			//alert("faculty_id"+faculty_id);
			
			if(location==null)
			{
				location='';
			}
			
			if(building_no==null)
			{
				building_no='';
			}
			
			if(roomno==null)
			{
				roomno='';
			}
			
			if(floor_no==null)
			{
				floor_no='';
			}
			var roomid=loc+building_no+floor_no+roomno;
			//alert("Room "+roomid);
			$("#room_code").val(roomid);
			
		}
		
	</script>
	
@endsection