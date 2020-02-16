@extends('attendance.layouts.master')

@section('title')
Holiday Information System
@endsection

@section('sidebar')
	@include('holiday.sidebar')
@endsection

@section('header')
	@include('partials.header')
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
									<strong class="card-title">Holiday List</strong>
								</div>			
                           
							
							<div class="card-body">
					
								<div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
								<a href="{{ url('holiday/add-holiday') }}" class="btn btn-default">Add New Holiday <i class="fa fa-plus"></i></a>
							</div>
								
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>Sl. No.</th>
											<th>Year</th>
                                            <th>Date</th>
                                            <th>No. of Days</th>
                                            <th>Holiday Description</th>
                                            <th>Day of Week</th>
                                            <th>Holiday Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $i=1;
										foreach($holiday_rs as $holiday)
										{ 
										
											$from_date= date("d-m-Y", strtotime($holiday->from_date));
											$to_date= date("d-m-Y", strtotime($holiday->to_date));
										?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
											<td>{{ $holiday->years}}</td>
                                            <td>{{ $from_date.'  -  '.$to_date}}</td>
                                            <td>{{ $holiday->day}}</td>
                                            <td>{{ $holiday->holiday_descripion}}</td>
                                            <td>{{ ucfirst($holiday->weekname) }}</td>
                                            <td>{{ ucfirst($holiday->holiday_type) }}</td>
                                            <td><a href='{{url("holiday/add-holiday/$holiday->id")}}'><i class="ti-pencil-alt"></i></a>
                                            	<a href='{{url("holiday/holidaydelete/$holiday->id")}}' onclick="return confirm('Are you sure you want to delete this holiday?');"><i class="ti-trash"></i></a></td>
                                        </tr>
                                        <?php $i++;?>
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
@include('attendance.partials.scripts')

@endsection
