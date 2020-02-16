@extends('masters.layouts.master')

@section('title')
Configuration-Stream
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
            <div class="card-header"><strong class="card-title">Add New Stream</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/stream') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  <!--<div class="emp-descp-main">   
								<div class="col-md-4 emp-desc">Employee Id: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Employee Name: <span>Dibyendu Paul</span></div>
								<div class="col-md-4 emp-desc">Designation: <span>Manager</span></div>
								<div class="col-md-4 emp-desc">Grade: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Date of Application: <span>13.10.2018</span></div>
								</div>-->
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  <!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Stream Id</label>
                      <input type="text" class="form-control" name="stream_code" value="{{ old('stream_code') }}">
					   @if ($errors->has('stream_code'))
							<div class="error" style="color:red;">{{ $errors->first('stream_code') }}</div>
						   @endif
                    </div>
                    <div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Stream Name</label>
                      <input type="text" class="form-control" id="cname" name="stream_name" value="{{ old('stream_name') }}" >
					   @if ($errors->has('stream_name'))
							<div class="error" style="color:red;">{{ $errors->first('stream_name') }}</div>
						   @endif
                    </div>
                    <div class="col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="stream_status">
                        <option value='' selected disabled>Select</option>
							<option value="active" <?php if(old('stream_status') ==  "active"){ echo "selected"; } ?> >Active</option>
							<option value="inactive" <?php if(old('stream_status') ==  "inactive"){ echo "selected"; } ?> >Inactive</option>
						  </select>
						   @if ($errors->has('stream_status'))
							<div class="error" style="color:red;">{{ $errors->first('stream_status') }}</div>
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