@extends('leave.layouts.master')

@section('title')
Payroll Information System-Loan Sanction Detail
@endsection

@section('sidebar')
	@include('leave.partials.sidebar')
@endsection

@section('header')
	@include('leave.partials.header')
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
                            <div class="card-header"><strong class="card-title">Add New Loan Sanction</strong></div>
                            <div class="card-body card-block">
                                <form action="{{ url('leave/loan-sanction-config') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!--<div class="emp-descp-main">   
								<div class="col-md-4 emp-desc">Employee Id: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Employee Name: <span>Dibyendu Paul</span></div>
								<div class="col-md-4 emp-desc">Designation: <span>Manager</span></div>
								<div class="col-md-4 emp-desc">Grade: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Date of Application: <span>13.10.2018</span></div>
								</div>-->
											<div class="clearfix"></div>
									<div class="lv-due" style="border:none;">
										<!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
										<div class="row form-group lv-due-body">
										<div class="col-md-4">
											<label>Loan Applied Id</label>
											<input type="text" class="form-control" id="loan_applied_no" name="loan_applied_no" readonly="" value="{{ $data->loan_applied_no }}" >
										</div>
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Loan Sanction Id</label>
										<input type="text" class="form-control" id="loan_sanction_no" name="loan_sanction_no" readonly="" value="{{ $data->loan_sanction_no }}" >
										</div>
										
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Member Id</label>
										<input type="text" class="form-control" id="employee_code" readonly="" name="employee_code" value="{{ $data->employee_code }}" >
										</div>
										
										</div>
										
										<div class="row form-group">
										<div class="col-md-4">
											<label>Loan Type</label>
											<input type="text" class="form-control" id="loan_type" name="loan_type" readonly="" value="{{ $data->loan_type }}" >
										</div>
										<div class="col-md-4">
											<label>Loan Sanction Date</label>
											<input type="text" class="form-control" id="loan_sanction_date" name="loan_sanction_date" readonly="" value="{{ $loan_sanction_date }}" >
										</div>
										<div class="col-md-4">
											<label>Loan Sanction Amount</label>
											<input type="text" class="form-control" id="loan_sanction_amount" name="loan_sanction_amount" readonly="" value="{{ $data->sanction_amt }}" >
											<input type="hidden"  class="form-control"  name="loan_apply_date" id="loan_apply_date" value="{{ $data->loan_apply_dt }}"  >
											<input type="hidden"  class="form-control"  name="rate_of_intrest" id="rate_of_intrest" value="{{ $data->rate }}"  >
											<input type="hidden"  class="form-control"  name="number_of_installement" id="number_of_installement" value="{{ $data->max_time }}" >
											<input type="hidden"  class="form-control"  name="recover_month" id="recover_month" value="{{ $data->months }}" >
											<input type="hidden"  class="form-control"  name="recover_year" id="recover_year" value="{{ $data->years }}" >
											<input type="hidden"  class="form-control"  name="recover_status" id="recover_status" value="{{ $data->loan_sanction_status }}" >
										</div>
										</div>
										
										
										
									</div>	
									 
                                  
                                   
                           
							
                            
							
							
							 </div>
                        </div>
						
						<div class="card">
							<div class="card-body card-block">
							
							<div class="srch-rslt">
                                <table id="bootstrap-data-table1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Sl no.</th>
                                            <th>Employee Code</th>
                                            <th>Principal Amount</th>
											<th>Interest Amount</th>
											<th>Recover Month</th>
											<th>Recover Year</th>
											<th>Recover Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										$loan_sanction_amount=$data->max_sanction_amt;
										$rate_of_intrest=$data->rate;
										$number_of_installement=$data->max_time;
										$months=$data->months;
										$years=$data->years;
										
										$intrest_amt=($loan_sanction_amount*$rate_of_intrest)/100;
										
										$principal_amt_per_month=$loan_sanction_amount/$number_of_installement;
										$intrest_amt_per_month=$intrest_amt/$number_of_installement;
										$tot_principal_amt_per_month=$principal_amt_per_month+$intrest_amt_per_month;
									?>
									
									<?php 
										$j=1;
										$k=1;
										for($i=$number_of_installement; $i >= 1; $i--)
										{
									?>
									<tr class="odd gradeX">
										<td>{{ $j }}</td>
										<td>{{ $data->employee_code }}</td>
										<td>{{ round($principal_amt_per_month,2) }}</td>
										<td>{{ round($intrest_amt_per_month,2) }}</td>
										<td><?php 
											
											if($months == 13){ $months=1; echo $months; $years=$years+$k;}
											else if($months == 1){ $months=$months+$k; echo $months; }
											else { echo $months;  $months=$months+$k; } 
											?>
										</td>
										<td>{{ $years  }}</td>
										<td>{{ $data->loan_sanction_status  }}</td>
									</tr>
									<?php
										
										$j++;
										}
									?>
									
									<!--
                                        <tr>
                                            <td>1</td>
                                            <td>47</td>
											<td>555.56</td>
											<td>44.44</td>
											<td>12</td>
											<td>2018</td>
											<td>Not Approved</td>
                                        </tr>
                                     -->   
                                    </tbody>
                                </table>
								<div class="sv"><button type="button" class="btn btn-danger btn-sm">Check All</button>
										<button type="submit" class="btn btn-danger btn-sm">Save</button>
								</div>
                            </div>
                        </div>
						</div>
                        </form>
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
@include('leave.partials.scripts')

<script>

	function getLoanDetails(loan_apply_no)
	{
		//var member_code=$("#member_id").val();
		
		$.ajax({
			type:'GET',
			url:'{{url('attendance/get-loan-details')}}/'+loan_apply_no,				
			success: function(response){
			console.log(response); 
			alert(response);
			//var jqObj = jQuery.parseJSON(response); 
				
			var jqObj =JSON.parse(response);
			//var jqObj = response.map(JSON.parse)
			//var jqObj = jQuery(response);
			//alert(jqObj.loan_applied_no);
			
			//$("#previous_loan").val(jqObj.previous_loan);
			$("#loan_apply_dt").val(jqObj.apply_date);
			$("#employee_id").val(jqObj.employee_id);
			$("#employee_name").val(jqObj.employee_name);
			$("#purpose_of_loan").val(jqObj.purpose_of_loan);
			$("#applied_amt").val(jqObj.loan_amount);
			
			}
			
		});
	}
</script>

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
	
</script>	
	
@endsection