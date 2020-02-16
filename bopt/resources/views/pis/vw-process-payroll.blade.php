@extends('layouts.master')

@section('title')
Payroll Information System-Payroll Generation
@endsection

@section('sidebar')
	@include('partials.sidebar')
@endsection

@section('header')
	@include('partials.header')
@endsection


@section('content')
<style>
    
    #bootstrap-data-table th{vertical-align:top;text-align: center;}
</style>

      <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                 
                    <div class="main-card" style="width:1000px;margin:0 auto;">
                        <div class="card">
						<div class="card-header"><strong class="card-title">Process Employee Payroll</strong></div>
                             @if(Session::has('message'))										
			<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
			    @endif
                    @if ($errors->has('employee_code'))
		     <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ $errors->first('employee_code') }}</em></div>		
                    @endif
            <div class="card-body card-block">
                                
            <form action="{{ url('pis/vw-process-payroll') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">                                   
             <div class="row form-group" style="width:60%;margin:0 auto;">
          
	                <div class="col col-md-3" style="text-align: right;">
	                    <label for="text-input" class=" form-control-label">Select Month <span>(*)</span></label>
	                </div>
                    <div class="col-md-5">                                                
						<select data-placeholder="Choose an Month..."  class="form-control" name="month_yr" id="month_yr" required>
							<option value="" selected disabled > Select </option>
							<?php foreach($monthlist as $month){?>
								<option value="<?php  echo $month->month_yr; ?>"><?php echo $month->month_yr; ?></option>
							<?php } ?>
						</select>
						@if ($errors->has('month_yr'))
						<div class="error" style="color:red;">{{ $errors->first('month_yr') }}</div>
						@endif
                	</div>
				
                <div class="col-md-4">
					<button type="submit" class="btn btn-danger btn-sm">View</button>
				</div>
                                       
            </div>                        
		</form>
							 
       </div>

    
                       <div class="card-body">
					<div class="card-header">
									<strong class="card-title">Search Result</strong>
								</div>
								<br/>
								<form method="post" action="{{ url('pis/edit-process-payroll') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="srch-rslt" style="overflow-x:scroll;">
									<table id="bootstrap-data-table" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th><div class="checkbox">
												<label><input type="checkbox"  name="all" id="all" width="30px;" height="30px;">
												Select</label>
												</div></th>
												<td>Employee Code</td>
												<td>Employee Name</td>
												<td>Month</td>
												<td>Basic Pay</td>
												<td>Dear. Allow.</td>
												<td>HRA</td>
												<td>TRAN ALLOW.</td>
												<td>D.A. on T.A.</td>
												<td>LTC</td>
												<td>CEA</td>
												<td>T.A.</td>
												<td>D.A.</td>
												<td>Advance</td>
												<td>Adjustment of Advance</td>
												<td>Medical Reimbursement</td>
												<td>Others</td>
												<td>GPF</td>
												<td>NPS</td>
												<td>CPF</td>
												<td>GSLI</td>
												<td>Inc. Tax.</td>
												<td>Prof. Tax</td>
												<td>Others</td>
												<td>Gross Salary</td>
												<td>Deduction</td>
												<td>Net Salary</td>
												<td>Action</td>
										    </tr>
										</thead>
										<tbody>

											 <?php if(!empty($process_payroll)){ 
											 foreach($process_payroll as $processpayroll) { ?>
							                  <tr>
							                  <td><div class="checkbox"><label><input type="checkbox" name="payroll_id[]" value="<?php echo $processpayroll->id; ?>"></label>
							                  	
							                  </div></td>
							               		
							                    <td>{{$processpayroll->employee_id}}</td>
							                    <td>{{$processpayroll->emp_name}}</td>
							                    <td>{{$processpayroll->month_yr}}</td>
							                    <td>{{$processpayroll->emp_basic_pay}}</td>
							                    <td>{{$processpayroll->emp_da}}</td>
							                    <td>{{$processpayroll->emp_hra}}</td>
							                    <td>{{$processpayroll->emp_transport_allowance}}</td>
							                    <td>{{$processpayroll->emp_da_on_ta}}</td>
							                    <td>{{$processpayroll->emp_ltc}}</td>
							                    <td>{{$processpayroll->emp_cea}}</td>
							                    <td>{{$processpayroll->emp_travelling_allowance}}</td>
							                    <td>{{$processpayroll->emp_daily_allowance}}</td>
							                    <td>{{$processpayroll->emp_advance}}</td>
							                    <td>{{$processpayroll->emp_adjustment}}</td>
							                    <td>{{$processpayroll->emp_medical}}</td>
							                    <td>{{$processpayroll->other_addition}}</td>
							                    <td>{{$processpayroll->emp_gpf}}</td>
							                    <td>{{$processpayroll->emp_nps}}</td>
							                    <td>{{$processpayroll->emp_cpf}}</td>
							                    <td>{{$processpayroll->emp_gslt}}</td>
							                    <td>{{$processpayroll->emp_income_tax}}</td>
							                    <td>{{$processpayroll->emp_pro_tax}}</td>
							                    <td>{{$processpayroll->other_deduction}}</td>
							                    <td>{{$processpayroll->emp_gross_salary}}</td>
							                    <td>{{$processpayroll->emp_total_deduction}}</td>	
							                    <td>{{$processpayroll->emp_net_salary}}</td>
							                    <td>
                                            	<a href='{{url("pis/payrolldelete/$processpayroll->id")}}' onclick="deleteProcessPayroll(this.val)"><i class="ti-trash"></i></a></td>
							                  </tr>
							                  
							             <?php } } ?>
										
										</tbody>
									<tfoot>
										
										<tr>
											<td colspan="7" style="border:none;"><button type="submit" class="btn btn-danger btn-sm">Save</button></td>
											
										</tr>
									</tfoot>     
									</table>
                                                                            
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
        <div class="clearfix"></div>
@endsection

@section('scripts')
@include('attendance.partials.scripts')

	<script>
	// Listen for click on toggle checkbox for each Page
		$('#all').click(function(event) {  
		
			if(this.checked) {
				//alert("test");
				// Iterate each checkbox
				$(':checkbox').each(function() {
					this.checked = true;                        
				});
			} else {
				$(':checkbox').each(function() {
					this.checked = false;                       
				});
			}
		});
		
	
	// Listen for click on toggle checkbox for each Page
		$('#all').click(function(event) {  
		
			if(this.checked) {
				//alert("test");
				// Iterate each checkbox
				$(':checkbox').each(function() {
					this.checked = true;                        
				});
			} else {
				$(':checkbox').each(function() {
					this.checked = false;                       
				});
			}
		});


		/*function deleteProcessPayroll(clrt){

			alert(clrt);


		}*/
		
	</script>	
	
@endsection