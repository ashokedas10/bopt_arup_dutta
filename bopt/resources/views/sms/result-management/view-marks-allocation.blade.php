@extends('sms.result-management.layouts.master')

@section('title')
		Result Management-Marks Allocation
@endsection

@section('sidebar')
	@include('sms.result-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.result-management.partials.header')
@endsection

@section('scripts')
	@include('sms.result-management.partials.scripts')
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
                                <strong class="card-title">Marks Allocation</strong>
                            </div>
							@if(Session::has('message'))										
									<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif	
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('sms/result-management/institute-marks-allocation') }}" class="btn btn-default">Add Marks Allocation <i class="fa fa-plus"></i></a>
							</div>
							
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Institute Name</th>
											<th>Faculty Name</th>
											<th>Course</th>
											<th>Batch</th>
											<th>Semester</th>
											<th>Subject</th>
											<th>Session</th>
											<th>Total Marks</th>
											<th>Pass Marks</th>
											<th>Exam Type</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										
                                        <tr>
                                           <td>Adamas University</td>
                                            <td>School of Management</td>
											<td>BBA</td>
											<td></td>
											<td>Semester I</td>
											<td>Business Analysis</td>
											<td>2018</td>
											<td>80</td>
											<td>30</td>
											<td>Written</td>
											<td><a href="#"><i class="ti-pencil-alt"></i></a>
												<a href="#"><i class="ti-trash"></i></a></td>
                                        </tr>
										
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
