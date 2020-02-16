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
                       
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">List of Application for Ltc</strong>
                            </div>
							<div class="aply-lv" style="    padding-right: 36px;">
								<a href="{{ url('leave/apply-for-ltc') }}" class="btn btn-default">Apply Ltc<i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Application Date</th>
                                            <th>From Date</th>
											<th>To Date</th>
											<th>Duration (Day)</th>
											<th>Leave Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($tour_apply_rs as $tour_apply)
										<?php 
										$fromarr = explode("-",$tour_apply['from_date']);
										$d = $fromarr[2];
										$m = $fromarr[1];
										$y = $fromarr[0];
										$from = $d."-".$m."-".$y;
										$toarr = explode("-",$tour_apply['to_date']);
										$d1 = $toarr[2];
										$m1 = $toarr[1];
										$y1 = $toarr[0];
										$to = $d1."-".$m1."-".$y1;
										$applyarr = explode("-",$tour_apply['apply_date']);
										$d2 = $applyarr[2];
										$m2 = $applyarr[1];
										$y2 = $applyarr[0];
										$apply = $d2."-".$m2."-".$y2;
										?>
                                        <tr>
                                            <td><?php echo $apply; ?></td>
                                            <td><?php echo $from; ?></td>
											<td><?php echo $to; ?></td>
											<td>{{ $tour_apply->duration }}</td>
											<td>{{ $tour_apply->ltc_status }}</td>
                                            
											<td>
                                                <?php if($tour_apply->ltc_status!='APPROVED'){ ?><a href='{{url("leave/apply-for-ltc/$tour_apply->id")}}'><i class="ti-pencil-alt"></i></a><?php } ?>
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
		
		
        @endsection

@section('scripts')
@include('leave.partials.scripts')

@endsection

