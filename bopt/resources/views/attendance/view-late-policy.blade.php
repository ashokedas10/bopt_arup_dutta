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



@section('scripts')
	@include('partials.scripts')
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
									<strong class="card-title">Late Policy</strong>
								</div>			
                           
							<div class="aply-lv">
								<a href="{{ url('attendance/late-policy') }}" class="btn btn-default">Add New Late Policy <i class="fa fa-plus"></i></a>
							</div>
							<div class="card-body">						
								
								
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Company Name</th>
                                            <th>Grade</th>
                                            <th>Shift Code</th>
											<th>Max. Grace Period</th>
											<th>No. of Days Allow</th>
											<th>No. of Day Salary Deducted</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($late_policy_rs as $late_policy)
                                        <tr>
											<td>{{ $late_policy->company_name }}</td>
                                            <td>{{ $late_policy->grade_name }}</td>
                                            <td>{{ $late_policy->shift_name }}</td>
											<td>{{ $late_policy->max_grace_period }}</td>
											<th>{{ $late_policy->no_day_allow }}</th>
											<th>{{ $late_policy->no_day_salary_deducted }}</th>
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
                <!-- /Widgets -->
               
                
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>




@endsection
