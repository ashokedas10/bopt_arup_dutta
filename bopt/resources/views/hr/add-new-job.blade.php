@extends('hr.layouts.master')

@section('title')
HR - Job Title
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
							<div class="card-header"><strong class="card-title">Add New Job</strong></div>
						<div class="text-center card-body">
							<form action="{{ url('hr/add-new-job') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal" style="width:800px;margin:0 auto;">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row form-group">
								<div class="col col-md-3"><label for="company-name" class="form-control-label">Enter Job Title <span>(*)</span></label></div>
										<div class="col col-md-6" style="padding:0;">
										<input type="text" class="form-control" id="job_title" name="job_title">
										@if ($errors->has('job_title'))
											<div class="error" style="color:red;">{{ $errors->first('job_title') }}</div>
										@endif
										</div>
										
									<div class="col col-md-3" style="text-align:left;"><button type="submit" class="btn btn-danger btn-sm">Submit</button></div>
										
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
