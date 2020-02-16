@extends('layouts.master')

@section('title')
Payroll Information System-PTAX
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
	            <div class="card-header"> <strong>GPF Statement Employeewise</strong> </div>
	            <div class="card-body card-block">
                        @if(Session::has('message'))										
			<div class="alert alert-danger" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
			@endif	
	            <form action="" method="post" style="width: 70%;margin: 0 auto;" target="_blank">
	              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="row form-group">
                            
					<div class="col-md-4">
					<label>Select From Month</label>
						<select data-placeholder="Choose Month..." name="from_month" class="form-control" required>
							<option value="" selected disabled > Select </option>
							<?php foreach($monthlist as $month){?>
							<option value="<?php  echo $month->month_yr; ?>"><?php echo $month->month_yr; ?></option>
							<?php } ?>
                        </select>
					</div>
	                
	                <div class="col-md-4">
					<label>Select To Month</label>
						<select data-placeholder="Choose Month..." name="to_month" class="form-control" required>
							<option value="" selected disabled > Select </option>
							<?php foreach($monthlist as $month){?>
							<option value="<?php  echo $month->month_yr; ?>"><?php echo $month->month_yr; ?></option>
							<?php } ?>
                        </select>
					</div>


					<div class="col-md-4">
					<label>Select Employee</label>
						<select data-placeholder="Choose Month..." name="emp_code" class="form-control" required>
							<option value="" selected disabled > Select </option>
							<?php foreach($employeeslist as $employee){?>
							<option value="<?php echo $employee->emp_code; ?>" ><?php echo $employee->emp_fname." ".$employee->emp_mname." ".$employee->emp_lname." (".$employee->emp_code.") "; ?></option>
							<?php } ?>
                        </select>
					</div>
	                  
	                  <div class="col-md-4 btn-up">
	                    <button type="submit" class="btn btn-danger btn-sm" id="showbankstatement">Show </button>
	                  </div>
	                </div>
	                
	                
	              </form>
	            </div>
	          </div>


	        </div>
	      </div>
	      <!-- /Widgets -->
	    </div>
	    <!-- .animated -->
  	</div>
  	<!-- /.content -->
 

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','#showbankstatement',function(){
			$('#View_Bank_Statement').css('display','block');
		});
	})

</script> 
@endsection