@extends('attendance.layouts.master')

@section('title')
Payroll Information System
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
						<div class="card-body">
							<form action="{{ url('attendance/view-gradewise-holiday') }}" method="post" enctype="multipart/form-data" class="form-horizontal" style="width:800px;margin:0 auto;">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row form-group">
								<div class="col col-md-3" style="text-align:right;"><label for="text-input" class=" form-control-label">Grade <span>(*)</span></label></div>
										  <div class="col-md-6" style="padding:0;">
										  <select class="form-control" name="grade_id" id="grade_id">
											<option value="" selected disabled>Select</option>
											@foreach($grade_rs as $grade)
											<option value="{{ $grade->id }}"<?php if(old('grade_id') == $grade->id){ echo "selected"; } ?>>{{ $grade->grade_name }}</option>
											@endforeach
										</select>
										@if ($errors->has('grade_id'))
										<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
										@endif
										</div>
									<div class="col col-md-3" style="text-align:left;"><button type="submit" class="btn btn-danger btn-sm">Go</button></div>
								</div>
							</form>
						</div>
						
						
						<div class="card-header">
									<strong class="card-title">View Grade Wise Holiday List</strong>
								</div>			
                           
							
							<div class="card-body">
								
								
								
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Year</th>
                                            <th>Date</th>
                                            <th>Holiday Description</th>
											<th>Company Name</th>
											<th>Grade</th>
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
