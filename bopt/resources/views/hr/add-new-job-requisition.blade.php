@extends('hr.layouts.master')

@section('title')
HR - Job Requisition
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
							<div class="card-header"><strong class="card-title">Add New Job Requisition</strong></div>
						<div class="card-body">
							<form action="{{ url('hr/add-new-job-requisition') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row form-group">
								<div class="col col-md-4">
								<label for="company-name" class="form-control-label">Select Company <span>(*)</span></label>
								<select class="form-control" name="company_id">
								  <option value="" selected disabled>Select</option>
								  @foreach($company_rs as $company)
								  <option value="{{ $company->id }}" {{(old('company_id')==$company->id)? 'selected':''}}>{{ $company->company_name }}</option>
								  @endforeach
								</select>
								@if ($errors->has('company_id'))
									<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
								@endif
								</div>
								<div class="col col-md-4">
								<label for="company-name" class="form-control-label">Select Department <span>(*)</span></label>
								<select class="form-control" name="department_id">
								  <option value="" selected disabled>Select</option>
								  @foreach($department_rs as $department)
								  <option value="{{ $department->id }}" {{(old('department_id')==$department->id)? 'selected':''}}>{{ $department->department_name }}</option>
								  @endforeach
								</select>
								@if ($errors->has('department_id'))
									<div class="error" style="color:red;">{{ $errors->first('department_id') }}</div>
								@endif
								</div>
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
								
							</div>
								
							<div class="row form-group">
								<div class="col col-md-4">
									<label>Location / Branch</label>
									<select class="form-control"  name="location">
										<option value="" selected disabled>Select</option>
										@foreach($branch_rs as $branch)
										<option value="{{ $branch->location }}" {{(old('location')==$branch->location)? 'selected':''}}>{{ $branch->location }}</option>
										@endforeach
									</select>
									
								</div>
								<div class="col col-md-4" style="text-align:left;">
									<label>No. of Vacancy <span>(*)</span></label>
									<input type="text" class="form-control" id="no_of_vacancy" name="no_of_vacancy" value="{{ old('no_of_vacancy') }}">
									@if ($errors->has('no_of_vacancy'))
									<div class="error" style="color:red;">{{ $errors->first('no_of_vacancy') }}</div>
									@endif
								</div>
								<div class="col col-lg-4">
									<label>Date <span>(*)</span></label>
									<input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
									@if ($errors->has('location'))
									<div class="error" style="color:red;">{{ $errors->first('location') }}</div>
									@endif
							</div>
							</div>
							<div class="row form-group">
								<div class="col col-lg-4">
									<label>Vacancy Status <span>(*)</span></label>
									<select class="form-control" name="vacancy_status">
										<option value="" selected disabled>Select</option>
										<option value="active"  @if (old('vacancy_status') == "active") {{ 'selected' }} @endif>Active</option>
										<option value="inactive"  @if (old('vacancy_status') == "inactive") {{ 'selected' }} @endif>Inactive</option>
									</select>
									@if ($errors->has('vacancy_status'))
									<div class="error" style="color:red;">{{ $errors->first('vacancy_status') }}</div>
									@endif
								</div>
							<div class="col col-lg-4 btn-up">
							<button type="submit" class="btn btn-danger btn-sm">Submit</button>
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
         @endsection

@section('scripts')
@include('hr.partials.scripts')

@endsection
