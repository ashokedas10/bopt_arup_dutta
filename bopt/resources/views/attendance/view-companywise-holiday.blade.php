@extends('attendance.layouts.master')

@section('title')
Payroll Information System-Company Wise Holiday
@endsection

@section('sidebar')
	@include('attendance.partials.sidebar')
@endsection

@section('header')
	@include('partials.header')
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
							<div class="card-header"><strong class="card-title">Holiday List</strong></div>
							@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif
						<div class="text-center card-body">
							<form action="{{ url('attendance/view-companywise-holiday') }}" method="post" enctype="multipart/form-data" class="text-centr form-horizontal" style="width:800px;margin:0 auto;">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row form-group">
								<div class="col col-md-3"><label for="company-name" class="form-control-label">Company Name <span>(*)</span></label></div>
										<div class="col col-md-6" style="padding:0;">
										<select class="form-control" name="company_id" id="company_id">
											<option value="" selected disabled>Select</option>
											@foreach($company_rs as $company)
											<option value="{{ $company->id }}"<?php if(old('company_id') == $company->id){ echo "selected"; } ?>>{{ $company->company_name }}</option>
											@endforeach
										</select>
										@if ($errors->has('company_id'))
										<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
										@endif
										</div>
									<div class="col col-md-3" style="text-align:left;"><button type="submit" class="btn btn-danger btn-sm">Go</button></div>
								</div>
							</form>
						</div>
						
						
						<div class="card-header">
									<strong class="card-title">View Company Wise Holiday List</strong>
								</div>			
                           
							
							<div class="card-body">
								
								
								
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Year</th>
                                            <th>Date</th>
                                            <th>Holiday Description</th>
                                            
											<th>Company Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php print_r($result); ?>
                                        
                                        
                                        
                                    </tbody>
                                </table>
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
@include('attendance.partials.scripts')

@endsection
