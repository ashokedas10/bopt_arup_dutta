@extends('layouts.master')

@section('title')
Payroll Information System-Company
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
						<div class="card-header"><strong class="card-title">Grace Period</strong></div>
                        @if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif    
                          
                        <div class="card-body">
					
								<div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
								<a href="{{ url('attendance/add-grace-period') }}" class="btn btn-default">Add Grace Period <i class="fa fa-plus"></i></a>
							</div>
							<div class="srch-rslt" style="overflow-x:scroll;">	
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Company Name</th>
                                            <th>Grade</th>
                                            <th>Branch</th>
                                            <th>Shift Name</th>
											<th>Shift IN-Time</th>
											<th>Grace Period(min)</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($grace_period_rs as $grace_period)
                                        <tr>
											
                                            <td>{{ $grace_period->company_name }}</td>
                                            <td>{{ $grace_period->grade_name }}</td>
											<td>{{ $grace_period->branch_name }}</td>
                                            <td>{{ $grace_period->shift_name }}</td>
											<td>{{ $grace_period->shift_in_time }}</td>
											<td>{{ $grace_period->grace_period }}</td>
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
