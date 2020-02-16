@extends('hr.layouts.master')

@section('title')
HR - Job Requisition
@endsection

@section('sidebar')
	@include('hr.partials.sidebar')
@endsection

@section('header')
	@include('hr.partials.header')
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
									<strong class="card-title">Job Requisition</strong>
								</div>	
							@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif		
							<div class="card-body">
							<div class="aply-lv" style="padding-right: 18px;margin-bottom:15px;">
								<a href="{{ url('hr/add-new-job-requisition') }}" class="btn btn-default">Add New Job Requisition <i class="fa fa-plus"></i></a>
							</div>	
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Company</th>
											<th>Department</th>
                                            <th>Job Title</th>
											<th>Location</th>
											<th>No. of Vacancy</th>
											<th>Date</th>
											<th>Vacancy Status</th>
											<th>Share</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($job_requisition_rs as $job_requisition)
                                        <tr>
											<td>{{ $job_requisition->company_name }}</td>
                                            <td>{{ $job_requisition->department_name }}</td>
											<td>{{ $job_requisition->job_title }}</td>
											<td>{{ $job_requisition->location }}</td>
											<td>{{ $job_requisition->no_of_vacancy }}</td>
											<td>{{ $job_requisition->date }}</td>
											<!--<td>{{ $job_requisition->job_title }}</td>-->
											<td>{{ $job_requisition->vacancy_status }}</td>
											<td style="font-size:11px;margin-right:9px;"><a href="#"><i style="font-size:11px;margin-right:9px;" class="ti-facebook"></i></a><a href="#"><i style="font-size:13px;margin-right:9px;" class="ti-twitter-alt"></i></a>
											<a href="#"><i style="font-size:11px;" class="ti-linkedin"></i></a></td>
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
         @endsection

@section('scripts')
@include('hr.partials.scripts')

@endsection
