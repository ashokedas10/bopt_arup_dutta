@extends('attendance.layouts.master')

@section('title')
Payroll Information System
@endsection

@section('sidebar')
    @include('leavemanagement.sidebar')
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
                  
                    <div class="main-card">
                        <div class="card">
						<div class="card-header"><strong class="card-title">Leave Balance</strong></div>
                          
                        <div class="card-body">
					
								
							<div class="srch-rslt" style="overflow-x:scroll;">	
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
									
                                            <th>Employee Code</th>
                                            <th>Employee Name</th>
                                            <th>Leave Type</th>
											<th>Leave in Hand</th>
                                        </tr>
                                    </thead>
                                    <tbody>
					@foreach($leave_balance_rs as $leave_balance)
                                        <tr>	
                                                <td>{{ $leave_balance->emp_code }}</td>
                                                <td>{{ $leave_balance->emp_fname.' '.$leave_balance->emp_mname.' '.$leave_balance->emp_lname }}</td>
                                                <td>{{ $leave_balance->leave_type_name }}</td>
                                                <td>{{ $leave_balance->leave_in_hand }}</td>
								
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
	@include('partials.scripts')
 @endsection
