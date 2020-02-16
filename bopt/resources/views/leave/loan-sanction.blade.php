@extends('leave.layouts.master')

@section('title')
Payroll Information System-Loan Sanction
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
                                <form action="{{ url('leave/loan-sanction') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="clearfix"></div>
									<div class="lv-due" style="border:none;">
										<!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
										<div class="row form-group lv-due-body">
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Loan Apply No.</label>
											<input type="text" class="form-control" readonly="" name="loan_applied_no" value="{{ $loan_apply_rs->loan_applied_no }}" > 
											
										</div>
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Loan Apply Date</label>
										<input type="date" class="form-control" id="loan_apply_dt" name="loan_apply_dt" value="{{ $loan_apply_rs->apply_date }}" > 
										</div>
										
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Employee Id</label>
										<input type="text" class="form-control" id="employee_code" name="employee_code" value="{{ $loan_apply_rs->employee_code }}" >
										</div>
										
										</div>
										
										<div class="row form-group">
										<div class="col-md-4">
											<label>Employee Name</label>
											<input type="text" class="form-control" id="employee_name" name="employee_name" value="{{ $employee_rs->first_name.' '.$employee_rs->middle_name.' '.$employee_rs->last_name }}">
										</div>
										<div class="col-md-4">
											<label>Purpose of Loan<span>(*)</span></label>
											<input type="text" class="form-control" id="purpose_of_loan" name="purpose_of_loan" value="{{ old('purpose_of_loan') }}" >
											@if ($errors->has('purpose_of_loan'))
											<div class="error" style="color:red;">{{ $errors->first('purpose_of_loan') }}</div>
											@endif	
										</div>
										<div class="col-md-4">
											<label>Applied Amount</label>
											<input type="text" class="form-control" id="applied_amt" name="applied_amt" value="{{ $loan_apply_rs->loan_amount }}" >
											
										</div>
										</div>
										
										<div class="row form-group">
										<div class="col-md-4">
											<label>Sanction Amount<span>(*)</span></label>
											<input type="text" class="form-control" id="sanction_amt" name="sanction_amt" value="{{ old('sanction_amt') }}" >
											@if ($errors->has('sanction_amt'))
											<div class="error" style="color:red;">{{ $errors->first('sanction_amt') }}</div>
											@endif	
										</div>
										
										<div class="col-md-4">
											<label>Loan Type</label>
											<select class="form-control" name="loan_type">
											<option value="" selected disabled>Select</option>
											@foreach($loan_type_rs as $loan_type)
											<option value="{{ $loan_type->loan_type }}" <?php if($loan_type->loan_type == $loan_apply_rs->loan_type){ echo "selected"; } ?> >{{ $loan_type->loan_type }}</option>
											@endforeach
										</select>

										</div>
										
										<div class="col-md-4">
											<label>Rate of Interest</label>
											<input type="text" class="form-control" id="rate" name="rate" value="{{ $loan_configuration_rs->rate_of_interest }}" readonly>
											<input type="hidden" class="form-control" id="loan_config_id" name="loan_config_id" value="{{ $loan_configuration_rs->loan_config_id }}" >
											<input type="hidden" class="form-control" id="max_time" name="max_time" value="{{ $loan_configuration_rs->max_time }}" >
											<input type="hidden" class="form-control" id="max_sanction_amt" name="max_sanction_amt" value="{{ $loan_configuration_rs->max_sanction_amt }}" >
										</div>
										
										</div>
										<div class="row form-group">
											<div class="col-md-4">
											<label>Status<span>(*)</span></label>
											<select class="form-control" name="loan_sanction_status">
											<option value="" selected disabled>Select</option>
											<option value="Not Approved" <?php if(old('loan_sanction_status') == 'Not Approved'){ echo "selected"; } ?> >Not Approved</option>
											
										</select>
										@if ($errors->has('loan_sanction_status'))
										<div class="error" style="color:red;">{{ $errors->first('loan_sanction_status') }}</div>
										@endif	
										</div>
										<div class="col-md-4 btn-up">
											<button type="submit" class="btn btn-danger btn-sm">Next</button>
											<button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
										</div>
										</div>
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
	
@endsection