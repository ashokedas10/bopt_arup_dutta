@extends('masters.layouts.master')

@section('title')
Configuration-Institute
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
                            <div class="card-header"><strong class="card-title">Add New Institute</strong></div>
                            <div class="card-body card-block">
                                <form action="{{ url('masters/institute') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="clearfix"></div>
									<div class="lv-due" style="border:none;">
										<!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
										<div class="row form-group lv-due-body">
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Institute Id</label>
										<input type="text" class="form-control" name="institute_code" value="{{ old('institute_code') }}">
										 @if ($errors->has('institute_code'))
											<div class="error" style="color:red;">{{ $errors->first('institute_code') }}</div>
										  @endif
										</div>
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Institute Name</label>
										<input type="text" class="form-control" id="institute_name" name="institute_name" value="{{ old('institute_name') }}" >
										@if ($errors->has('institute_name'))
											<div class="error" style="color:red;">{{ $errors->first('institute_name') }}</div>
										  @endif
										</div>
										
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Institute Location</label>
										<input type="text" class="form-control" id="institute_location" name="institute_location" value="{{ old('institute_location') }}" >
										@if ($errors->has('institute_location'))
											<div class="error" style="color:red;">{{ $errors->first('institute_location') }}</div>
										  @endif
										</div>
										
										</div>
										
										<div class="row form-group">
										<div class="col-md-4">
											<label>Institute Address</label>
											<textarea rows="3" class="form-control" name="institute_address" id="institute_address">{{ old('institute_address') }}</textarea>
											@if ($errors->has('institute_address'))
											<div class="error" style="color:red;">{{ $errors->first('institute_address') }}</div>
										  @endif
										</div>
										<div class="col-md-4">
											<label>Institute Phone No.</label>
											<input type="text" class="form-control" id="institute_ph_no" name="institute_ph_no" value="{{ old('institute_ph_no') }}" >
											@if ($errors->has('institute_ph_no'))
											<div class="error" style="color:red;">{{ $errors->first('institute_ph_no') }}</div>
										  @endif
										</div>
										<div class="col-md-4">
											<label>Institute Email</label>
											<input type="email" class="form-control" id="iemail" name="institute_email" value="{{ old('institute_email') }}">
											@if ($errors->has('institute_email'))
											<div class="error" style="color:red;">{{ $errors->first('institute_email') }}</div>
										  @endif
										</div>
										
										</div>
										
										
										<div class="row form-group">
											<div class="col-md-4">
											<label>Status</label>
											<select class="form-control" name="institute_status" >
											 <option value='' selected disabled>Select</option>
												<option value="active" <?php if(old('institute_status') ==  "active"){ echo "selected"; } ?> >Active</option>
												<option value="inactive" <?php if(old('institute_status') ==  "inactive"){ echo "selected"; } ?> >Inactive</option>
											  </select>
											   @if ($errors->has('institute_status'))
												<div class="error" style="color:red;">{{ $errors->first('institute_status') }}</div>
											   @endif
										</div>
										<div class="col-md-4">
											<label>Upload Logo</label>
											<input type="file" class="form-control" id="up-logo" name="logo_name" >
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

@endsection