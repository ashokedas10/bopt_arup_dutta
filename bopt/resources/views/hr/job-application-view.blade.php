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
            <div class="card-header"> <strong class="card-title">View Job Applications</strong> </div>
			@if(Session::has('message'))										
				<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
			@endif	
            <div class="card-body">
              <div class="aply-lv" style="padding-right: 18px;margin-bottom:15px;"> <a href="{{ url('hr/add-new-job-application') }}" class="btn btn-default">Add New Job Application <i class="fa fa-plus"></i></a> </div>
              <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive" style="overflow-x:scroll;width:100%">
                <thead>
                  <tr>
                    <th rowspan="2">Apply Date</th>
					<th rowspan="2">Company Name</th>
					<th rowspan="2">Department</th>
                    <th rowspan="2">Name</th>
                    <th rowspan="2">Post</th>
                    <th rowspan="2">Mobile</th>
                    <th rowspan="2">Email</th>
                    <th colspan="2">Experience</th>
                    <th rowspan="2">Highest Qualification</th>
                    <th rowspan="2">CV</th>
                    <th rowspan="2">Remarks</th>
					<th rowspan="2">Status</th>
					<th rowspan="2">Action</th>
                  </tr>
				  <tr>
					<td style="font-weight:600;font-size:12px;">Years</td>
					<td style="font-weight:600;font-size:12px;">Months</td>
				</tr>
                </thead>
				
                <tbody>
				@foreach($jobappplication_rs as $jobapplication)
				<?php
				$apply_dt_arr=explode('-',$jobapplication->apply_date);
				$d=$apply_dt_arr[2];
				$m=$apply_dt_arr[1];
				$y=$apply_dt_arr[0];
				$apply_dt=$d.'-'.$m.'-'.$y;
				?>
                  <tr>
				  	<td><?php echo $apply_dt; ?></td>
					<td>{{ $jobapplication->company_name }}</td>
					<td>{{ $jobapplication->department_name }}</td>
					<td>{{ $jobapplication->name }}</td>
					<td>{{ $jobapplication->post }}</td>
					<td>{{ $jobapplication->mobile }}</td>
					<td>{{ $jobapplication->email }}</td>
					<td>{{ $jobapplication->experience_year }}</td>
					<td>{{ $jobapplication->experience_months }}</td>
					<td>{{ $jobapplication->highest_qualification }}</td>
					<td><a href="{{ url('/') }}/storage/app/{{ $jobapplication->resume_name }}" target="_blank" class="btn btn-primary">View</a></td>
					<td>{{ $jobapplication->remarks }}</td>
					<td>{{ $jobapplication->status }}</td>
					<td><a href="{{ url('hr/update-job-application') }}/{{ $jobapplication->id }}" title="Edit"><i class="ti-pencil-alt"></i></a><a href="{{ url('hr/remarks-history') }}/{{ $jobapplication->id }}" title="History"><i class="ti-reload"></i></a><a href="mailto:" title="email"><i class="ti-email"></i></a></td>
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
