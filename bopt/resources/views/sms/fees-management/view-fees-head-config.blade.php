@extends('sms.fees-management.layouts.master')

@section('title')
Student Management System-Fees Head Configuration
@endsection

@section('sidebar')
	@include('sms.fees-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.fees-management.partials.header')
@endsection



@section('scripts')
	@include('sms.fees-management.partials.scripts')
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
                                <strong class="card-title">Fees Head</strong>
                            </div>
							@if(Session::has('message'))										
									<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif	
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('sms/fees-management/fees-head-config') }}" class="btn btn-default">Add Fees Head Configuration <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Institute Name</th>
											<th>School Name</th>
											<th>Branch </th>
											<th>Course</th>
											<th>Class</th>
											<th>Fees Head</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($feesHead_rs as $feeshead)										
                                        <tr>
                                            <td> {{ $feeshead->institute_name }}</td>
                                            <td> {{ $feeshead->faculty_name }}</td>
											<td> {{ $feeshead->branch_name }}</td>
											<td>  {{ $feeshead->course_name }}</td>
											<td>  {{ $feeshead->class_name }}</td>
											<td> {{ $feeshead->fees_head_name }}</td>
											<td>Active</td>
											<td><a href="#"><i class="ti-pencil-alt"></i></a>
												<a href="#"><i class="ti-trash"></i></a></td>
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
