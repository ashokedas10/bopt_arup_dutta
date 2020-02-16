@extends('attendance.layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('attendance.partials.sidebar')
@endsection

@section('header')
	@include('attendance.partials.header')
@endsection





@section('content') 
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card" style="width:1000px;margin:0 auto;">
                        <div class="card">
						<!--
                            
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                    
                                   
                                    <div class="row form-group">
									<div class="col-md-6">
										<label>Enter Employee Code</label>
										<input type="text" class="form-control" id="employee-code" placeholder="Enter Employee Code">
									</div>
									<div class="col-md-6">
									<label>Employee Name</label>
								<input type="text" class="form-control" id="employee-name" placeholder="Employee Name">
								</div>
									
                                   
                            </div>
							
							<div class="row form-group">
									<div class="col-md-6">
										<label>Company Name</label>
										<input type="text" class="form-control" id="company-name" placeholder="Company Name">
									</div>
									<div class="col-md-6">
									<label>Grade</label>
								<input type="text" class="form-control" id="Grade" placeholder="Grade">
								</div>
									
                                   
                            </div>
                           
                                <button type="button" class="btn btn-danger btn-sm">View Offdays</button>
                                
                            
							</form>
							</div>
							-->
							<div class="card-body">
								<div class="card-header">
									<strong class="card-title">Offdays Details</strong>
								</div>
								@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif
								<div class="aply-lv" style="padding-right: 18px;margin-bottom:15px;">
								<a href="{{ url('attendance/add-new-offday') }}" class="btn btn-default">Add New <i class="fa fa-plus"></i></a>
							</div>
								
							<div class="srch-rslt" style="overflow-x:scroll;">	
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Employee Id</th>
                                            <th>Employee Name</th>
											<th>Sunday</th>
											<th>Monday</th>
                                            <th>Tuesday</th>
											<th>Wednesday</th>
											<th>Thursaday</th>
											<th>Friday</th>
											<th>Saturday</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($offday_rs as $offday)
                                        <tr>
                                            <td>{{ $offday->employee_code }}</td>
                                            <td>{{ $offday->employee_name }}</td>
											<td class="res">
											@if($offday->sunday == 1)
											<i class="ti-close"></i>
											@else
											<i class="ti-check"></i>
											@endif
											</td>
											<td class="res">
											@if($offday->monday == 1)
											<i class="ti-close"></i>
											@else
											<i class="ti-check"></i>
											@endif
											</td>
											<td class="res">
											@if($offday->tuesday == 1)
											<i class="ti-close"></i>
											@else
											<i class="ti-check"></i>
											@endif
											</td>
											<td class="res">
											@if($offday->wednesday == 1)
											<i class="ti-close"></i>
											@else
											<i class="ti-check"></i>
											@endif
											</td>
											<td class="res">
											@if($offday->thursday == 1)
											<i class="ti-close"></i>
											@else
											<i class="ti-check"></i>
											@endif
											</td>
											<td class="res">
											@if($offday->friday == 1)
											<i class="ti-close"></i>
											@else
											<i class="ti-check"></i>
											@endif
											</td>
											<td class="res">
											@if($offday->saturday == 1)
											<i class="ti-close"></i>
											@else
											<i class="ti-check"></i>
											@endif
											</td>
											<td><a href="#"><i class="ti-pencil-alt"></i></a><a href="#"><i class="ti-trash"></i></a></td>
                                        </tr>
										@endforeach
                                        
                                    </tbody>
                                </table>
							</div>
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
