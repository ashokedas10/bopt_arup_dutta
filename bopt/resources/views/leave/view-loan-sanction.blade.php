@extends('leave.layouts.master')

@section('title')
Payroll Information System- Loan Sanction
@endsection

@section('sidebar')
	@include('leave.partials.sidebar')
@endsection

@section('header')
	@include('leave.partials.header')
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
                            <div class="card-header">
                                <strong class="card-title">Loan Sanction</strong>
                            </div>
							<div class="aply-lv" style="    padding-right: 36px;">
								<a href="{{ url('leave/loan-sanction') }}" class="btn btn-default">Add New Loan Sanction <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive" style="overflow-x:scroll;">
                                    <thead>
                                        <tr>
											<th>Sl. No.</th>
                                            <th>Loan Apply No.</th>
                                            <th>Apply Date</th>
											<th>Employee Id</th>
											<th>Employee Name</th>
											<th>Purpose of Loan</th>
											<th>Applied Amount</th>
											<th>Sanction Amount</th>
											<th>Loan Type</th>
											<th>Rate of Interest</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
										@foreach($loan_sanction_rs as $loan_sanction)
											
										<tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $loan_sanction->loan_applied_no }}</td>
											<td>{{ $loan_sanction->loan_apply_dt }}</td>
											<td>{{ $loan_sanction->employee_code }}</td>
											<td>{{ $loan_sanction->employee_name }}</td>
											<td>{{ $loan_sanction->purpose_of_loan}}</td>
											<td>{{ $loan_sanction->applied_amt }}</td>
											<td>{{ $loan_sanction->sanction_amt }}</td>
											<td>{{ $loan_sanction->loan_type }}</td>
											<td>{{ $loan_sanction->rate }}</td>
											<td>{{ $loan_sanction->loan_sanction_status }}</td>
											<td>
												<a href="#"><i class="ti-pencil-alt"></i></a>
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
		
		
        <div class="clearfix"></div>
		
		 @endsection

@section('scripts')
@include('leave.partials.scripts')

@endsection

