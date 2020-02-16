@extends('hr.layouts.master')

@section('title')
HR - Job Description
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
									<strong class="card-title">Job Description</strong>
								</div>	
							@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif		
							<div class="card-body">
							<div class="aply-lv" style="padding-right: 18px;margin-bottom:15px;">
								<a href="{{ url('hr/add-new-job-description') }}" class="btn btn-default">Add New Job Description <i class="fa fa-plus"></i></a>
							</div>	
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Sl. No.</th>
                                            <th>Job Title</th>
                                            <th>Experience</th>
											<th>Key Skill</th>
											<th>Description</th>
											<th>Date</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($job_description_rs as $job_description)
                                        <tr>
											<td>{{ $loop->iteration }}</td>
                                            <td>{{ $job_description->job_title }}</td>
											<td>{{ $job_description->experience }} Years</td>
											<td>{{ $job_description->key_skill }}</td>
											<td>{{ $job_description->job_description }}</td>
											<td>{{ $job_description->date }}</td>
											<td>{{ $job_description->status }}</td>
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