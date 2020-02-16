@extends('attendance.layouts.master')

@section('title')
Leave Allocation System
@endsection

@section('sidebar')
    @include('leavemanagement.sidebar')
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
                  
                    <div class="main-card" style="width:900px;margin:0 auto;">
                        <div class="card">  
							
							<div class="card-body">
								<div class="card-header">
									<strong class="card-title">Leave Allocation</strong>
								</div>
								@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif
								<div class="aply-lv" style="padding-right: 18px;margin-bottom:15px;">
								<a href="{{ url('leave-management/save-leave-allocation') }}" class="btn btn-default">Add New Leave Allocation <i class="fa fa-plus"></i></a>
							</div>
								
							<div class="srch-rslt" style="overflow-x:scroll;">	
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Leave Type</th>
                                            <th>Employee Code</th>
                                            <th>Max No. Of Leave</th>
                                            <th>Opening Balance</th>
                                            <th>Leave in Hand</th>
                                            <th>Month/Year</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($leave_allocation as $leave_allo)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$leave_allo->leave_type_name}}</td>
                                            <td>{{$leave_allo->employee_code}}</td>
                                            <td>{{$leave_allo->max_no}}</td>
                                            <td>{{$leave_allo->opening_bal}}</td>
                                            <td>{{$leave_allo->leave_in_hand}}</td>
                                            <td>{{$leave_allo->month_yr}}</td>
                                            <td>
                                                @if($leave_allo->leave_type_name=='EARNED LEAVE' || $leave_allo->leave_type_name=='HALF PAY LEAVE')
                                                <a href='{{url("leave-management/leave-allocation-dtl/$leave_allo->id")}}'><i class="ti-pencil-alt"></i></a>
                                                @endif
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
