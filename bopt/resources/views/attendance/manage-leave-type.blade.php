
@extends('attendance.layouts.master')

@section('title')
Leave Type System-Company
@endsection

@section('sidebar')
	@include('leavemanagement.sidebar')
@endsection

@section('header')
	@include('attendance.partials.header')
@endsection

@section('scripts')
	@include('attendance.partials.scripts')
@endsection

@section('content')

 <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card" style="width:900px;margin:0 auto;">
                        <div class="card">
						
                            <!-- Displaying success message -->
                         @if(Session::has('success')) 
                                <div class="alert alert-success" role="alert">
                            {{Session::get('success') }}
                                </div>
					     @endif
							<div class="card-body">
								<div class="card-header">
									<strong class="card-title">Leave Type</strong>
								</div>
								@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif
								<div class="aply-lv" style="padding-right: 18px;margin-bottom:15px;">
								<a href="{{url('leave-management/new-leave-type')}}" class="btn btn-default">Manage New Leave Type <i class="fa fa-plus"></i></a>
							</div>
								
							<div class="srch-rslt" style="overflow-x:scroll;">	
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Leave Type</th>
											<th>Alias Name</th>
											<th>Remarks</th>
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($leave_type_rs as $l)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$l->leave_type_name}}</td>
											<td>{{$l->alies}}</td>
											<td>{{$l->remarks}}</td>
											<!--<td style="text-align:center;"><a href="{{url('attendance/leave/'.$l->id)}}"><i class="fa fa-edit"></i></a> <a href="{{url('attendance/leave/del/'.$l->id)}}"><i class="fa fa-trash"></i></a></td>-->
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
