@extends('sms.result-management.layouts.master')

@section('title')
Result Management
@endsection

@section('sidebar')
	@include('sms.result-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.result-management.partials.header')
@endsection



@section('scripts')
	@include('sms.result-management.partials.scripts')
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
							<div class="card-header"><strong class="card-title">Add Marks Allocation</strong></div>
							<div class="card-body card-block">
								<form action="{{ url('sms/result-management/school-config-marks') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
								
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<?php if(old('institute_code')==''){ $institute=$institute_code; }else{ $institute=old('institute_code');} ?>
								<input type="hidden" name="institute_code" id="institute_code" value="{{ $institute }}" >
								  <div class="row form-group lv-due-body">									
									<div class="col-md-4">
									  <label for="text-input" class=" form-control-label">Class Name</label>
									  <select class="form-control" name="class_code" >
											<option value="" selected disabled>Select</option>
											@foreach($class_rs as $class)
											<option value="{{ $class->class_code }}">{{ $class->class_name }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-4">
									<label>Session</label>
										<select class="form-control" name="semester_code" >
											<option value="" selected disabled>Select</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
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
