@extends('sms.admission.layouts.master')

@section('title')
Admission Management
@endsection

@section('sidebar')
	@include('sms.admission.partials.sidebar')
@endsection

@section('header')
	@include('sms.admission.partials.header')
@endsection



@section('scripts')
	@include('sms.admission.partials.scripts')
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
                                <strong class="card-title">View Admission</strong>
                            </div>
							@if(Session::has('message'))										
									<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('sms/admission/new-admission-institute') }}" class="btn btn-default">New Admission <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
										
                                        <tr>
											<th>Institute</th>
											<th>Faculty</th>
											<th>Course</th>
											<th>Application No.</th>
											<th>Applicant Name</th>
											<th>Application Date</th>
											<th>Father's Name</th>
											<th>Address</th>
											<th>Phone No.</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
										
                                    </thead>
                                    <tbody>
									
                                        <tr>
                                            <td>Adamas University</td>
                                            <td>School of Management</td>
											<td>BCA</td>
											<td>BCA001</td>
											<td>Amitava Banerjee</td>
											<td>21/12/2018</td>
											<td>Sujit Banerjee</td>
											<td>Kalyani</td>
											<td>135268790</td>
											<td>Active</td>
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
