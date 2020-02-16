@extends('hr.layouts.master')

@section('title')
HR - Job Application Remarks
@endsection

@section('sidebar')
	@include('hr.partials.sidebar')
@endsection

@section('header')
	@include('hr.partials.header')
@endsection





@section('content')   <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header"> <strong class="card-title">Remarks History</strong> </div>
			<div class="card-body">
				<table id="bootstrap-data-table" class="table table-striped table-bordered" style="border: 2px solid #05546f; width: 50%; margin: 0 auto;">
					<tbody>
						<tr>
							<td>Name</td>
							<td>{{ $jobappplication_rs->name }}</td>
						</tr>
						<tr>
							<td>Post</td>
							<td>{{ $jobappplication_rs->post }}</td>
						</tr>
						<tr>
							<td>Highest Qualification</td>
							<td>{{ $jobappplication_rs->highest_qualification }}</td>
						</tr>
					</tbody>
				</table>
			</div>
            <div class="card-body">
              
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Sl. No.</th>
					<th>Date</th>
					<th>Remarks</th>
					<th>Status</th>
                  </tr>
				 
                </thead>
				
                <tbody>
				@foreach($jobapplystatus_rs as $jobapplystatus)
                  <tr>
				  	<td>{{ $loop->iteration }}</td>
					<td>{{ $jobapplystatus->date }}</td>
					<td>{{ $jobapplystatus->remarks }}</td>
					<td>{{ $jobapplystatus->status }}</td>
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