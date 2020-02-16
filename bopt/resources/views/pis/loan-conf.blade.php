@extends('layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('partials.sidebar')
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
        <div class="main-card">
          <div class="card">
            <div class="card-header"> <strong class="card-title">Loan Configuration</strong> </div>
			@if(Session::has('message'))										
				<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
			@endif	
            <div class="aply-lv"> <a href="{{ url('pis/add-new-loan-conf') }}" class="btn btn-default">Add New Loan Configuration <i class="fa fa-plus"></i></a> </div>
            <br/>
            <div class="clear-fix">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Sl. No.</th>
                    <th>Loan Id</th>
                    <th>Loan Type</th>
					<th>Max. Sanction Amount</th>
					<th>Max. Time (in month)</th>
					<th>Rate of Interest</th>
					<th>Status</th>
					<th>Action</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($loan_config_rs as $loan_config)
                  <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $loan_config->loan_config_id }}</td>
                    <td>{{ $loan_config->loan_type }}</td>
					<td>{{ $loan_config->max_sanction_amt }}</td>
					<td>{{ $loan_config->max_time }} months</td>
					<td>{{ $loan_config->rate_of_interest }}%</td>
					<td>{{ $loan_config->loan_config_status }}</td>
					<td><a href="#"><i class="ti-pencil-alt"></i></a><a href="#"><i class="ti-trash"></i></a></td>
                  </tr>
                 @endforeach 
                </tbody>
              </table>
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