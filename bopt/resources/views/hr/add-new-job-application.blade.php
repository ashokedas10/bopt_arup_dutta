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





@section('content') 
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card">
                        <div class="card">	
							<div class="card-header"><strong class="card-title">Add New Job Application</strong></div>
						<div class="card-body">
							<form action="{{ url('hr/add-new-job-application') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row form-group">
								<div class="col col-md-4">
								<label>Select Company <span>*</span></label>
									<select class="form-control" name="company_id" id="company_id" >
										<option value='' selected disabled>Select</option>
										@foreach($company_rs as $company)
										<option value="{{$company->id}}" <?php if(old('company_id') == $company->id){ echo "selected"; } ?>>{{ $company->company_name }}</option>
										@endforeach
									</select>
									@if ($errors->has('company_id'))
										<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
									@endif
								</div>
								<div class="col col-md-4">
									<label>Select Department <span>*</span></label>
									<select class="form-control" name="department_id">
									 <option value='' selected disabled>Select</option>
									 @foreach($dept_rs as $dept)
									  <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
									  @endforeach
									</select>
									@if ($errors->has('department_id'))
										<div class="error" style="color:red;">{{ $errors->first('department_id') }}</div>
									@endif
								</div>
								<div class="col col-md-4">
								<label for="company-name" class="form-control-label">Apply Date <span>(*)</span></label>
								<input type="date" class="form-control" name="apply_date" value="{{ old('apply_date') }}">
								@if ($errors->has('apply_date'))
									<div class="error" style="color:red;">{{ $errors->first('apply_date') }}</div>
								@endif
								</div>
								
								
							</div>
								
							<div class="row form-group">
								<div class="col col-md-4">
									<label>Name <span>(*)</label>
									<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
									@if ($errors->has('name'))
									<div class="error" style="color:red;">{{ $errors->first('name') }}</div>
									@endif
								</div>
								<div class="col col-md-4" style="text-align:left;">
									<label>Post <span>(*)</label>
									<select class="form-control" name="post" id="post">
										<option value="" selected disabled>Select</option>
										@foreach($post_rs as $post)
										<option value="{{ $post->job_title }}">{{ $post->job_title }}</option>
										@endforeach
									</select>
									@if ($errors->has('post'))
									<div class="error" style="color:red;">{{ $errors->first('post') }}</div>
									@endif
								</div>
								<div class="col col-lg-4">
									<label>Mobile No. <span>(*)</label>
									<input type="text" class="form-control" id="mobile" name="mobile">
									@if ($errors->has('mobile'))
									<div class="error" style="color:red;">{{ $errors->first('mobile') }}</div>
									@endif
								</div>
								
							</div>
							
							
							<div class="row form-group">
							<div class="col col-lg-4">
									<label>Email <span>(*)</label>
									<input type="email" class="form-control" id="email" name="email">
									@if ($errors->has('email'))
									<div class="error" style="color:red;">{{ $errors->first('email') }}</div>
									@endif
								</div>
								<div class="col col-lg-4">
									<label>Experience in Year</label>
									<select class="form-control" name="experience_year">
										<option value="" selected disabled>Select</option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
								</div>
								<div class="col-md-4">
									<label>Experience in Months</label>
									<select class="form-control" name="experience_months">
										<option value="" selected disabled>Select</option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
								</div>
								
							</div>
							
							<div class="row form-group">
							<div class="col-md-4">
									<label>Key Skill</label>
									<input type="text" class="form-control" name="keyskill">
								</div>
								<div class="col-md-4">
									<label>Highest Qualification <span>(*)</span></label>
									<input type="text" class="form-control" name="highest_qualification" value="{{ old('highest_qualification') }}">
									@if ($errors->has('highest_qualification'))
									<div class="error" style="color:red;">{{ $errors->first('highest_qualification') }}</div>
									@endif
								</div>
							
								<div class="col-md-4">
									<label>Upload Resume <span>(*)</span></label>
									<input type="file" name="resume_name" required>
								</div>
								
							</div>
							<div class="row form-group">
								<div class="col-md-6">
									<label>Address</label>
									<textarea rows="3" class="form-control" name="address"></textarea>
								</div>
								<div class="col-md-6 btn-up">
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
