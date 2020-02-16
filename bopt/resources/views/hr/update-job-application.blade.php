@extends('hr.layouts.master')

@section('title')
HR - Job Application
@endsection

@section('sidebar')
	@include('hr.partials.sidebar')
@endsection

@section('header')
	@include('hr.partials.header')
@endsection





@section('content')         <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card">
                        <div class="card">	
							<div class="card-header"><strong class="card-title">Update Job Application</strong></div>
						<div class="card-body">
							<form action="{{ url('hr/update-job-application') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row form-group">
								<div class="col col-md-4">
								<label for="company-name" class="form-control-label">Date <span>(*)</span></label>
								<input type="date" class="form-control" name="date">
								@if ($errors->has('date'))
									<div class="error" style="color:red;">{{ $errors->first('date') }}</div>
								@endif
								<?php if(!empty($id)){ $jobid=$id; }else if(old('job_apply_id') <>''){ $jobid=old('job_apply_id'); }else{ $jobid='';} ?>
								<input type="hidden" name="job_apply_id" value="{{ $jobid }}">
								</div>
								<div class="col col-md-4" style="padding:0;">
									<label>Status <span>(*)</span></label>
									<select class="form-control" name="status" id="status">
									  <option value="" selected disabled>Select</option>
									  <option value="Join">Join</option>
									  <option value="Interview Rescheduled">Interview Rescheduled</option>
									  <option value="Rejected">Rejected</option>
									  <option value="Sort Listed">Sort Listed</option>
									  <option value="Not Interested">Not Interested</option>
									  <option value="Not Contactable">Not Contactable</option>
									  <option value="Interview Scheduled">Interview Scheduled</option>
									</select>
									@if ($errors->has('status'))
										<div class="error" style="color:red;">{{ $errors->first('status') }}</div>
									@endif
								</div>
									<div class="col col-md-4" style="text-align:left;">
									<label>Remarks</label>
									<input type="text" class="form-control" name="remarks">
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
