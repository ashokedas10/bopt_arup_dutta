@extends('layouts.master')

@section('title')
Payroll Information System-Shift
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
						
                        <div class="card-body">
								<div class="card-header">
									<strong class="card-title">Shift Details</strong>
								</div>
								@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif
								<div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
								<a href="{{ url('attendance/add-shift') }}" class="btn btn-default">Add New Shift <i class="fa fa-plus"></i></a>
							</div>
								
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Company Name</th>
											<th>Grade Name</th>
											<th>Shift Name</th>
                                            <th>Shift Description</th>
                                            <th>Shift IN Time</th>
                                            <th>Shift OUT Time</th>
											<th>Recess From Time</th>
											<th>Recess To Time</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($shift_time_rs as $shift)
                                        <tr>
											<td>{{ $shift->company_name }}</td>
											<td>{{ $shift->grade_name }}</td>
                                            <td>{{ $shift->shift_name }}</td>
                                            <td>{{ $shift->shift_description }}</td>
											<td>{{ $shift->shift_in_time }}</td>
                                            <td>{{ $shift->shift_out_time }}</td>
											<td>{{ $shift->recess_from_time }}</td>
											<td>{{ $shift->recess_to_time }}</td>
											<td><a href="#"><i class="ti-pencil-alt"></i></a>
												<a href="#"><i class="ti-trash"></i></a>
											</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
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
