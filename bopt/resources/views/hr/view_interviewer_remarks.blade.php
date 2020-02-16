@extends('hr.layouts.master')

@section('title')
HR - Job Application
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
            <div class="card-header"> <strong class="card-title">View Interviewer Remarks</strong> </div>
			@if(Session::has('message'))										
				<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
			@endif	
            <div class="card-body">
              <!--<div class="aply-lv" style="padding-right: 18px;margin-bottom:15px;"> <a href="{{ url('hr/add-new-job-application') }}" class="btn btn-default">Add New Job Application <i class="fa fa-plus"></i></a> </div>-->
              <table id="bootstrap-data-table" class="table table-striped table-bordered " >
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th >Name</th>
                    <th >Post</th>
                    <th >Interviewer Name</th>
                    <th >Remarks</th>
					<th >Status</th>
					
                  </tr>
				  
                </thead>
				
                <tbody>
				@foreach($remarks_rs as $remarks)
				<?php
				
				?>
                  <tr>
				  	<td>{{ $loop->iteration }}</td>
					<td>{{ $remarks->name }}</td>
					<td>{{ $remarks->post }}</td>
					<td>{{ $remarks->interviewer_name }}</td>
					<td>{{ $remarks->remarks }}</td>
					<td>{{ $remarks->status }}</td>
					
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
