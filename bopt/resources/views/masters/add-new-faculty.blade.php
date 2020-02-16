@extends('masters.layouts.master')

@section('title')
Configuration-School
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
                            <div class="card-header"><strong class="card-title">Add New School</strong></div>
                            <div class="card-body card-block">
                                <form action="{{ url('masters/add-new-faculty') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
										<div class="clearfix"></div>
										<div class="lv-due" style="border:none;">
											<!--<div class="lv-due-hd">
												<h4>Leave Due as on</h4>
											</div>-->
											<div class="row form-group lv-due-body">
											
											<div class="col-md-4">
												<label>Institute</label><span>(*)</span>
												<select class="form-control" name="institute_code" id="institute_code" >
													<option value="" selected disabled>Select</option>
													@foreach($institute_rs as $institute)
													<option value="{{ $institute->institute_code }}">{{ $institute->institute_name }}</option>
													@endforeach
												</select>
												@if ($errors->has('institute_code'))
													<div class="error" style="color:red;">{{ $errors->first('institute_code') }}</div>
												@endif
											</div>
											
											<div class="col-md-4">
												<label>Location</label><span>(*)</span>
												<select class="form-control" name="location_code" id="location_code" >
													<option value="" selected disabled>Select</option>
													@foreach($location_rs as $location)
													<option value="{{ $location->branch_code }}">{{ $location->branch_name }}</option>
													@endforeach
												</select>
												@if ($errors->has('location_code'))
													<div class="error" style="color:red;">{{ $errors->first('location_code') }}</div>
												@endif
											</div>
											
											
											<div class="col-md-4">
											<label for="text-input" class=" form-control-label">School Id</label><span>(*)</span>
											<input type="text" class="form-control" name="faculty_id">
											 @if ($errors->has('faculty_id'))
												<div class="error" style="color:red;">{{ $errors->first('faculty_id') }}</div>
											  @endif
											</div>
											
											<div class="col-md-4">
											<label for="text-input" class=" form-control-label">School Name</label><span>(*)</span>
											<input type="text" class="form-control" name="faculty_name">
											 @if ($errors->has('faculty_name'))
												<div class="error" style="color:red;">{{ $errors->first('faculty_name') }}</div>
											  @endif
											</div>
											
											<div class="col-md-4">
												<label>Status</label><span>(*)</span>
												<select class="form-control" name="faculty_status">
												<option value="" selected disabled>Select</option>
												<option value="active">Active</option>
												<option value="inactive">Inactive</option>
											</select>
											 @if ($errors->has('faculty_status'))
												<div class="error" style="color:red;">{{ $errors->first('faculty_status') }}</div>
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
        @endsection

@section('scripts')
@include('masters.partials.scripts')

@endsection
