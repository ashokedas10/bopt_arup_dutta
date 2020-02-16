@extends('hr.layouts.master')

@section('title')
HR - Job Description
@endsection

@section('sidebar')
	@include('hr.partials.sidebar')
@endsection

@section('header')
	@include('hr.partials.header')
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
							<div class="card-header"><strong class="card-title">Add New Job Description</strong></div>
						<div class="card-body">
							<form action="{{ url('hr/add-new-job-description') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row form-group">
								<div class="col col-md-4">
								<label for="company-name" class="form-control-label">Select Job Title <span>(*)</span></label>
								<select class="form-control" id="job_title" name="job_title">
									<option value="" selected disabled>Select</option>
									@foreach($job_rs as $job)
									<option value="{{ $job->job_title }}" {{(old('job_title')==$job->job_title)? 'selected':''}}>{{ $job->job_title }}</option>
									@endforeach
								</select>
								@if ($errors->has('job_title'))
											<div class="error" style="color:red;">{{ $errors->first('job_title') }}</div>
										@endif
								</div>
								<div class="col col-md-4" style="padding:0;">
									<label>Experience  (in month) <span>(*)</span></label>
									<input type="text" class="form-control" id="experience" name="experience" value="{{ old('experience') }}">
									@if ($errors->has('experience'))
											<div class="error" style="color:red;">{{ $errors->first('experience') }}</div>
										@endif
								</div>
									<div class="col col-md-4" style="text-align:left;">
									<label>Key Skill <span>(*)</span></label>
									<input type="text" class="form-control" id="key_skill" name="key_skill" value="{{ old('key_skill') }}">
									@if ($errors->has('key_skill'))
											<div class="error" style="color:red;">{{ $errors->first('key_skill') }}</div>
										@endif
									</div>
								</div>
								
							<div class="row form-group">
								<div class="col col-lg-4">
									<label>Job Description <span>(*)</span></label>
									<textarea rows="3" class="form-control" id="job_description" name="job_description">{{ old('job_description') }}</textarea>
									@if ($errors->has('job_description'))
											<div class="error" style="color:red;">{{ $errors->first('job_description') }}</div>
										@endif
								</div>
								
								<div class="col col-lg-4">
									<label>CTC <span>(*)</span></label>
									<input type="text" class="form-control" id="ctc" name="ctc" value="{{ old('ctc') }}">
									@if ($errors->has('ctc'))
											<div class="error" style="color:red;">{{ $errors->first('ctc') }}</div>
										@endif
								</div>
								
								<div class="col col-lg-4">
									<label>Date <span>(*)</span></label>
									<input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
									@if ($errors->has('date'))
											<div class="error" style="color:red;">{{ $errors->first('date') }}</div>
										@endif
								</div>
								
							</div>
							
							<div class="row form-group">
								
								<div class="col col-lg-4">
									<label>Status <span>(*)</span></label>
									<select class="form-control" name="status">
										<option value="" selected disabled>Select</option>
										<option value="active">Active</option>
										<option value="inactive">Inactive</option>
									</select>
									@if ($errors->has('status'))
											<div class="error" style="color:red;">{{ $errors->first('status') }}</div>
										@endif
								</div>
								
							</div>
							
							<button type="submit" class="btn btn-danger btn-sm">Submit</button>
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
@include('hr.partials.scripts')

@endsection