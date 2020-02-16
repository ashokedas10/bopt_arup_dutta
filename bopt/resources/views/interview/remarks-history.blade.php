@extends('interview.layouts.master')

@section('title')
Interview
@endsection

@section('sidebar')
	@include('interview.partials.sidebar')
@endsection

@section('header')
	@include('interview.partials.header')
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
                    
					<th>Date</th>
					<th>Remarks</th>
					<th>Status</th>
                  </tr>
				 
                </thead>
				
                <tbody>
				
                  <tr>
				  	
					<td>{{ $interviewer_remarks_status_rs->date ?? '' }}</td>
					<td>{{ $interviewer_remarks_status_rs->remarks ?? ''}}</td>
					<td>{{ $interviewer_remarks_status_rs->status ?? ''}}</td>
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
@endsection

@section('scripts')
@include('interview.partials.scripts')

@endsection
