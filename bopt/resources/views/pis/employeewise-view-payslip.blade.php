@extends('layouts.master')

@section('title')
Payroll Information System
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
            <div class="card-header"> <strong>Employeewise Payslip</strong> </div>
            <div class="card-body card-block">
              <form action="{{ url('pis/vw-employeewise-view-payslip') }}" method="post">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row form-group">
		<div class="col-md-5">
                     <label for="text-input" class=" form-control-label">Select Month <span>(*)</span></label>                             
						<select data-placeholder="Choose an Employee..."  class="form-control" name="month_yr" id="month_yr" >
								<option value="" selected disabled > Select </option>
											<?php 
											for($yy=2018;$yy<=2030;$yy++)
											{
												for($mm=1; $mm <= 12; $mm++)
												{ 												
													if($mm<10)
													{
														$month_yr='0'.$mm."/".$yy;
													}												
													else
													{
														$month_yr=$mm."/".$yy;														
													}
											?>
												<option value="<?php  echo $month_yr; ?>"><?php echo $month_yr; ?></option>
											<?php 
												
												}
											}
											?>
										</select>
                     @if ($errors->has('month_yr'))
						<div class="error" style="color:red;">{{ $errors->first('month_yr') }}</div>
					@endif
                                        </div>	
                  <div class="col-md-4">
                    <label class=" form-control-label">Enter Employee Id <span>(*)</span></label>
                    <input type="text" class="form-control" id="emp_code" name="emp_code" value="{{ old('emp_code') }}">
					@if ($errors->has('emp_code'))
						<div class="error" style="color:red;">{{ $errors->first('emp_code') }}</div>
					@endif
                  </div>
                  
                  <div class="col-md-4 btn-up">
                    <button type="submit" class="btn btn-danger btn-sm">View </button>
                  </div>
                </div>
                
                
              </form>
            </div>
          </div>
          <div class="card">
            <div class="card-header"> <strong class="card-title">View Payslip</strong> </div>
            <br/>
            <div class="clear-fix">
      			<div class="card-body card-block">
      			<div class="table-responsive">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead style="text-align:center;vertical-align: middle;">
                  <tr style="font-size:11px;text-align:center">
          				  <th>Employee Code</th>
          				  <th>Employee Name</th>
          				  <th>Designation</th>
          				  <th>Month</th>
                    <th>Gross Salary</th>
                    <th>Total Deductions</th>
                    <th>Net Salary</th>
          				  <th>View</th>
                  </tr>
                </thead>
                <tbody>
        					<?php print_r($result); ?>
        				</tbody>
              </table>
      			</div>
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