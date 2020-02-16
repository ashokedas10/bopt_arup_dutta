@extends('leave.layouts.master')

@section('title')
Payroll Information System-Company
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
                        <!--<div class="card">
                            <div class="card-header">
                                <strong><i class="fa fa-eye" aria-hidden="true"></i> View Leave Status for the Month: October, 2018</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
                                    
                                    
                                    <div class="row form-group">
									<div class="col-md-6">
                                        <label for="from-date" class=" form-control-label">From Date (*)</label>
                                        <input type="date" id="from-date" name="from-date" placeholder="dd/mm/yyyy" class="form-control">
										<p>(*) marked fields are mandatory</p>
                                   </div>
								   <div class="col-md-6">
                                        <label for="to-date" class=" form-control-label">To Date (*)</label>
                                        <input type="date" id="from-date" name="to-date" placeholder="dd/mm/yyyy" class="form-control">
										</div>
                                    </div>
							<div class="card-body" style="text-align:center;">
                                <button type="button" class="btn btn-danger btn-sm">Search</button>
                                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                            </div>		
                                   
                           
							
                            
							
							</form>
							
							
                        </div>
                        
                    </div>-->
                       
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-eye"></i> View Leave Status</strong>
                            </div>
							@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif	
							<div class="aply-lv">
								<a href="{{ url('leave/apply-leave') }}" class="btn btn-default">Apply for Leave <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Application Date</th>
                                            <th>Leave Type</th>
                                            <th>From Date</th>
											<th>To Date</th>
											<th>Duration (Day)</th>
											<th>Supervisor Name</th>
											<th>Supervisor Remarks</th>
											<th>Leave Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
										foreach($leave_apply_rs as $leave_apply)
										{
										$fromdtarr = explode('-',$leave_apply->from_date); 
										$d = $fromdtarr[2];
										$m = $fromdtarr[1];
										$y = $fromdtarr[0];
										$from = $d."-".$m."-".$y;
										$todtarr = explode('-',$leave_apply->to_date); 
										$d1 = $todtarr[2];
										$m1 = $todtarr[1];
										$y1 = $todtarr[0];
										$to = $d1."-".$m1."-".$y1;
										$date_of_applyarr = explode('-',$leave_apply->date_of_apply); 
										$d2 = $date_of_applyarr[2];
										$m2 = $date_of_applyarr[1];
										$y2 = $date_of_applyarr[0];
										$date_of_apply = $d2."-".$m2."-".$y2;
										?>
                                        <tr>
                                            <td><?php echo $date_of_apply; ?></td>
											<td><?php echo $leave_apply->leave_type; ?></td>
                                            <td><?php echo $from; ?></td>
											<td><?php echo $to; ?></td>
											<td><?php echo $leave_apply->no_of_leave; ?></td>
											<td>Dibyendu Paul</td>
											<td>Approved</td>
											<td><?php echo $leave_apply->status; ?></td>
                                        </tr>
                                        <?php
										}
										?>
                                        
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
@include('leave.partials.scripts')

@endsection
