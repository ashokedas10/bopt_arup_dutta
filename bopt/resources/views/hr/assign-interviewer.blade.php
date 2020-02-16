@extends('hr.layouts.master')

@section('title')
HR - Assign Interviewer
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
							<div class="card-header"><strong class="card-title">Assign Interviewer</strong></div>
						<div class="card-body">
							<form action="{{ url('hr/assign-interviewer') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal">
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
								<div class="col col-lg-4">
									<label>Interviewer Name <span>(*)</span></label>
									<select class="form-control" name="interviewer_name">
										<option value="" selected disabled>Select</option>
										
										@foreach($employee_rs as $interviewer)
										<option value="{{ $interviewer->first_name.' '.$interviewer->middle_name.' '.$interviewer->last_name }}" {{(old('interviewer_name')==$interviewer->first_name.' '.$interviewer->middle_name.' '.$interviewer->last_name)? 'selected':''}}>{{ $interviewer->first_name.' '.$interviewer->middle_name.' '.$interviewer->last_name }}</option>
										@endforeach
									</select>
									@if ($errors->has('interviewer_name'))
									<div class="error" style="color:red;">{{ $errors->first('interviewer_name') }}</div>
									@endif
								</div>
							</div>		
							<div class="row form-group">
							
								
								<div class="col col-lg-4">
									<label>Job Title <span>(*)</span></label>
									<select class="form-control" name="job_title" id="job_title" onchange="getapplicant(this.value);">
										<option value="" selected disabled>Select</option>
										@foreach($job_title_rs as $job_title)
										<option value="{{ $job_title->job_title }}" {{(old('job_title')==$job_title->job_title)? 'selected':''}}>{{ $job_title->job_title }}</option>
										@endforeach
									</select>
									@if ($errors->has('job_title'))
									<div class="error" style="color:red;">{{ $errors->first('job_title') }}</div>
									@endif
								</div>
								<div class="col col-md-4" style="padding:0;">
									<label>Applicant Name <span>(*)</span></label>
									<select class="form-control" name="applicant_name" id="applicant_name" onchange="getjobapplyid(this.value);">
										<option value="" selected disabled>Select</option>
										
									</select>
									<input type="hidden" name="job_apply_id" id="job_apply_id" value="">
									@if ($errors->has('applicant_name'))
									<div class="error" style="color:red;">{{ $errors->first('applicant_name') }}</div>
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
<script>
function getapplicant(val)
{
	//alert(val);
	var jobtitle = val;
	$.ajax({
				type:'GET',
				url:'{{url('hr/get-applicant')}}/'+jobtitle,				
				success: function(response){
				console.log(response); 
				
				$("#applicant_name").html(response);
				
				}
				
			});
	
}

function getjobapplyid(val)
{
	var applicant_name = val;
	var job_title = $('#job_title').val();
	//alert(applicant_name);alert(job_title);
	$.ajax({
				type:'GET',
				url:'{{url('hr/get-jobapplyid')}}/'+applicant_name+'/'+job_title,				
				success: function(response){
				console.log(response); 
				
				$("#job_apply_id").val(response);
				
				}
				
			});
}
</script>
@endsection
