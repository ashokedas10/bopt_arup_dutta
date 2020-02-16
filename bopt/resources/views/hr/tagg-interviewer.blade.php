@extends('hr.layouts.master')

@section('title')
HR - Tag Interviewer
@endsection

@section('sidebar')
	@include('hr.partials.sidebar')
@endsection

@section('header')
	@include('hr.partials.header')
@endsection





@section('content')        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card">
                        <div class="card">						
						<div class="card-header">
									<strong class="card-title">Tagg Interviewer</strong>
								</div>	
							@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif			
							<div class="card-body">
							<div class="aply-lv" style="padding-right: 18px;margin-bottom:15px;">
								<a href="{{ url('hr/assign-interviewer') }}" class="btn btn-default">Assign Interviewer <i class="fa fa-plus"></i></a>
							</div>	
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Company Name</th>
                                            <th>Department Name</th>
											<th>Interviewer Name</th>
                                            <th>Applicant Name</th>
											<th>Job Title</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($assign_interviewer_rs as $assign_interviewer)
                                        <tr>
											<td>{{ $assign_interviewer->company_name }}</td>
                                            <td>{{ $assign_interviewer->department_name }}</td>
											<td>{{ $assign_interviewer->interviewer_name }}</td>
											<td>{{ $assign_interviewer->applicant_name }}</td>
											<td>{{ $assign_interviewer->job_title }}</td>
                                            <td><a href="mailto:"><i class="ti-email"></i></a></td>
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
