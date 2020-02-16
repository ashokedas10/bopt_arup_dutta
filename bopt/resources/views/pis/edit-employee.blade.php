@extends('layouts.master')

@section('title')
Payroll Information System-Employee Master
@endsection

@section('sidebar')
	@include('partials.sidebar')
@endsection

@section('header')
	@include('partials.header')
@endsection

@section('content')
<style>
  ul#stepForm, ul#stepForm li {
    margin: 0;
    padding: 0;
  }
  ul#stepForm li {
    list-style: none outside none;
  } 
  label{margin-top: 10px;}
  .help-inline-error{color:red;}
</style>
	
  <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header"> <strong>Employee Master</strong> </div>
            <div class="card-body card-block">
              <div class="panel panel-primary">
    
    <div class="panel-body">
      <form name="basicform" id="basicform" method="post" action="{{ url('pis/edit-employee') }}">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
		  <input type="hidden" name="id" value="{{ $employee_rs->id }}" >
        <div id="sf1" class="frm">
          <fieldset>
            <legend>Employee Information</legend>

            <div class="row form-group">
              <div class="col-md-4">
			  	<label>Select Company <span>(*)</span></label>
				<select class="form-control" id="company_id" name="company_id" onchange="getGrades(this.value);getEmployeeType(this.value);getDesignation(this.value);getBranches(this.value);" onblur="getReportingPerson(this.value);" >
					<option value='' selected disabled>Select</option>
					@foreach($company_rs as $company)
						<option value='{{ $company->id }}' <?php if($employee_rs->company_id == $company->id){ echo "selected"; } ?> >{{ $company->company_name }}</option>
					@endforeach
				</select>
				
				@if ($errors->has('company_id'))
					<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
				@endif
			  </div>
			  <div class="col-md-4">
			  	<label>Branch Name <span>(*)</span></label>
				<select class="form-control" name="branch_id" id="branch_id" >
					<option value='' selected disabled>Select</option>
					@foreach($branch_rs as $branch)
						<option value='{{ $branch->id }}' <?php if($employee_rs->branch_id == $branch->id){ echo "selected"; } ?> >{{ $branch->branch_name }}</option>
					@endforeach
				</select>
				@if ($errors->has('branch_id'))
					<div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
				@endif
			  </div>
			   <div class="col-md-4">
			   	<label>Employee Id <span>(*)</span></label>
				<input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $employee_rs->employee_id }}" >
				@if ($errors->has('employee_id'))
					<div class="error" style="color:red;">{{ $errors->first('employee_id') }}</div>
				@endif
			   </div>
              
            </div>
			
			<div class="row form-group">
				<div class="col-md-4">
					<label>First Name <span>(*)</span></label>
					<input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee_rs->first_name }}" >
					@if ($errors->has('first_name'))
					<div class="error" style="color:red;">{{ $errors->first('first_name') }}</div>
					@endif
				</div>
				<div class="col-md-4">
					<label>Middle Name</label>
					<input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $employee_rs->middle_name }}"  >
					@if ($errors->has('middle_name'))
					<div class="error" style="color:red;">{{ $errors->first('middle_name') }}</div>
					@endif
				</div>
				<div class="col-md-4">
					<label>Last Name <span>(*)</span></label>
					<input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee_rs->last_name }}"  >
					@if ($errors->has('last_name'))
					<div class="error" style="color:red;">{{ $errors->first('last_name') }}</div>
					@endif
				</div>
				
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Reporting Person <span>(*)</span></label>
					<!-- <input type="text" class="form-control" id="reporting_person" name="reporting_person" > -->
					<!--
					<select class="form-control" name="reporting_person" id="reporting_person" >
						<option>Select</option>
						<option >Option1</option>
						<option>Option2</option>
						<option>Option3</option>
					</select>
					-->
					<!--
					<input type="text" class="form-control" name="reporting_person" id="reporting_person"  autocomplete="off" onblur="getReportingPerson(this.value);">
					-->
					<input list="browsers" class="form-control" name="reporting_person" id="reporting_person" value="{{ $reporting_person_rs->first_name }}" >
					  <datalist id="browsers" >
						<!--<option value="Internet Explorer">
						<option value="Firefox">
						<option value="Chrome">
						<option value="Opera">
						<option value="Safari">
						-->
					  </datalist>
  
					@if ($errors->has('reporting_person'))
					<div class="error" style="color:red;">{{ $errors->first('reporting_person') }}</div>
					@endif
				</div>
			</div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>


            <div class="form-group">
             
                <button class="btn btn-primary open1" type="button">Next <i class="ti-arrow-right"></i></button> 
              
            </div>

          </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
          <fieldset>
            <legend>Employee Status</legend>

			
            <div class="row form-group">
				<div class="col-md-4">
				<label>Grade <span>(*)</span></label>
					<select class="form-control" name="grade_id" id="grade_id" onchange="getHeadNames(this.value);" >
						<option value="" selected disabled >Select</option>
						
						@foreach($grade_rs as $grade)
							<option value='{{ $grade->id }}' <?php if($employee_rs->grade_id == $grade->id){ echo "selected"; } ?> >{{ $grade->grade_name }}</option>
						@endforeach
					</select>
					@if ($errors->has('grade_id'))
					<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
					@endif
				</div>
				
				<div class="col-md-4">
				<label>Employee Type <span>(*)</span></label>
					<select name="employee_type_id" id="employee_type_id" class="form-control">
						<option value="" selected disabled >Select</option>						
						@foreach($employee_type_rs as $employee_type)
							<option value='{{ $employee_type->id }}' <?php if($employee_rs->employee_type_id == $employee_type->id){ echo "selected"; } ?> >{{ $employee_type->employee_type_name }}</option>
						@endforeach
					</select>
					@if ($errors->has('employee_type_id'))
					<div class="error" style="color:red;">{{ $errors->first('employee_type_id') }}</div>
					@endif
				</div>
				<div class="col-md-4">
				<label>Confirmation Date <span>(*)</span></label>
					<input type="date" class="form-control" id="confirmation_date" name="confirmation_date" value="{{ $employee_rs->confirmation_date }}" >
					@if ($errors->has('confirmation_date'))
					<div class="error" style="color:red;">{{ $errors->first('confirmation_date') }}</div>
					@endif
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-4">
				<label>Department <span>(*)</span></label>
					<select name="department_id" id="department"  class="form-control">
						<option value="" selected disabled>Select</option>
						@foreach($department_rs as $department)
							<option value="{{ $department->id }}" <?php if($employee_rs->department_id == $department->id){ echo "selected"; } ?> >{{  $department->department_name }}</option>
						@endforeach							
					</select>
					@if ($errors->has('department_id'))
					<div class="error" style="color:red;">{{ $errors->first('department_id') }}</div>
					@endif
				</div>
				<div class="col-md-4">
				<?php //print_r($designation_rs); ?>
				<label>Designation <span>(*)</span></label>
					<select name="designation_id" id="designation_id" class="form-control">
						<option value="" selected disabled>Select</option>
						@foreach($designation_rs as $designation)
							<option value="{{ $designation->id }}" <?php if($employee_rs->designation_id == $designation->id){ echo "selected"; } ?> >{{  $designation->designation_name }}</option>									
						@endforeach	
					</select>
					@if ($errors->has('designation_id'))
					<div class="error" style="color:red;">{{ $errors->first('designation_id') }}</div>
					@endif
				</div>
				<div class="col-md-4">
				<label>CCR <span>(*)</span></label>
					<select data-placeholder="Choose a Grade..." class="form-control" name="ccr" id="ccr" >
						<option value="" label="Select">Select</option>
						<option value="CCR1" <?php if($employee_rs->ccr == "CCR1"){ echo "selected"; } ?> >CCR1</option>
						<option value="CCR2" <?php if($employee_rs->ccr == "CCR2"){ echo "selected"; } ?> >CCR2</option>									
				</select>
				@if ($errors->has('ccr'))
				<div class="error" style="color:red;">{{ $errors->first('ccr') }}</div>
				@endif
				</div>
			</div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>



            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
                <button class="btn btn-warning back2" type="button"><i class="ti-arrow-left"></i> Back</button> 
                <button class="btn btn-primary open2" type="button">Next <i class="ti-arrow-right"></i></span></button> 
              </div>

          </fieldset>
        </div>

        <div id="sf3" class="frm" style="display: none;">
          <fieldset>
            <legend>Personal Details</legend>

            <div class="row form-group">
              <div class="col-md-4">
			  <label>Date of Birth <span>(*)</span></label>
			  <input type="date" class="form-control" id="dob" name="dob" value="{{ $employee_rs->dob }}" >
				@if ($errors->has('dob'))
				<div class="error" style="color:red;">{{ $errors->first('dob') }}</div>
				@endif
			  </div>
			   <div class="col-md-4">
			  <label>Mobile No. <span>(*)</span></label>
			  <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $employee_rs->mobile }}" >
				@if ($errors->has('mobile'))
				<div class="error" style="color:red;">{{ $errors->first('mobile') }}</div>
				@endif
			  </div>
			   <div class="col-md-4">
			  <label>Father's Name / Husband's Name <span>(*)</span></label>
			  <input type="text" class="form-control" id="father_name" name="father_name" value="{{ $employee_rs->father_name }}" >
			  @if ($errors->has('father_name'))
				<div class="error" style="color:red;">{{ $errors->first('father_name') }}</div>
				@endif
			  </div>
            </div>
			
			
			
			 <div class="row form-group">
			 <div class="col-md-4">
			  <label class="sex">Experience <span>(*)</span></label>
			  <input type="text" class="form-control" id="experience" name="experience" value="{{ $employee_rs->experience }}" >
			  @if ($errors->has('experience'))
				<div class="error" style="color:red;">{{ $errors->first('experience') }}</div>
				@endif
			  </div>
              
			   <div class="col-md-4">
			  <label>Home Ph <span>(*)</span></label>
			  <input type="text" class="form-control" id="home_ph" name="home_ph" value="{{ $employee_rs->home_ph }}" >
			   @if ($errors->has('home_ph'))
				<div class="error" style="color:red;">{{ $errors->first('home_ph') }}</div>
				@endif
			  </div>
			   <div class="col-md-4">
			  <label>Qualification <span>(*)</span></label>
			  <input type="text" class="form-control" id="qualification" name="qualification" value="{{ $employee_rs->qualification }}" >
			   @if ($errors->has('qualification'))
				<div class="error" style="color:red;">{{ $errors->first('qualification') }}</div>
				@endif
			  </div>
            </div>
			
			
			<div class="row form-group">
              <div class="col-md-4">
			  <label class="sex">Sex <span>(*)</span></label>
				<div class="radio-inline"><input type="radio" name="sex" value="Male" <?php if($employee_rs->sex == "Male"){ echo "checked"; } ?> >Male</div>
				<div class="radio-inline"><input type="radio" name="sex" value="Female" <?php if($employee_rs->sex == "Female"){ echo "checked"; } ?> >Female</div>
				@if ($errors->has('sex'))
				<div class="error" style="color:red;">{{ $errors->first('sex') }}</div>
				@endif
			  </div>
			   <div class="col-md-8">
				  <label>Marital Status <span>(*)</span></label>
				  <div class="radio-inline"><input type="radio" name="marital_status" value="Single" <?php if($employee_rs->marital_status == "Single"){ echo "checked"; } ?> >Single</span></div>
				  <div class="radio-inline"><input type="radio" name="marital_status" value="Married" <?php if($employee_rs->marital_status == "Married"){ echo "checked"; } ?> >Married</div>
				  <div class="radio-inline"><input type="radio" name="marital_status" value="Other" <?php if($employee_rs->marital_status == "Other"){ echo "checked"; } ?> >Other</div>
				  @if ($errors->has('marital_status'))
					<div class="error" style="color:red;">{{ $errors->first('marital_status') }}</div>
					@endif
			  </div>
			   <br>

                <div class="clearfix" style="height: 10px;clear: both;"></div>



            <div class="clearfix" style="height: 10px;clear: both;"></div>

            </div>
			
			<!--parmanent-address----------->
			<legend>Permanent Address</legend>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Street No. and Name</label>
					<input type="text" class="form-control" name="permanent_street_no" id="permanent_street_no" value="{{ $employee_rs->permanent_street_no }}"  >
					@if ($errors->has('permanent_street_no'))
					<div class="error" style="color:red;">{{ $errors->first('permanent_street_no') }}</div>
					@endif
				</div>
				<div class="col-md-4">
					<label>City</label>
					<input type="text" class="form-control" name="permanent_city" id="permanent_city" value="{{ $employee_rs->permanent_city }}"  >
					@if ($errors->has('permanent_city'))
					<div class="error" style="color:red;">{{ $errors->first('permanent_city') }}</div>
					@endif
				</div>
				<div class="col-md-4">
					<label>State</label>
					<input type="text" class="form-control" name="permanent_state" id="permanent_state" value="{{  $employee_rs->permanent_state  }}" >
					@if ($errors->has('permanent_state'))
					<div class="error" style="color:red;">{{ $errors->first('permanent_state') }}</div>
					@endif
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-4">
					<label>Country</label>
					<input type="text" class="form-control" name="permanent_country" id="permanent_country" value="{{  $employee_rs->permanent_country  }}" >
					@if ($errors->has('permanent_country'))
					<div class="error" style="color:red;">{{ $errors->first('permanent_country') }}</div>
					@endif
				</div>
				<div class="col-md-4">
					<label>Pin Code</label>
					<input type="text" class="form-control" name="permanent_pin" id="permanent_pin" value="{{ $employee_rs->permanent_pin  }}"  >
					@if ($errors->has('permanent_pin'))
					<div class="error" style="color:red;">{{ $errors->first('permanent_pin') }}</div>
					@endif
				</div>
				
			</div>
			<!--------------------------->
			
			<!--present-address----------->
			<legend>Present Address <span><label class="checkbox-inline"><input type="checkbox" value="" name="diffaddrress" id="diffaddrress" onclick="chckaddress();" >( if Present Address is same as Parmanent Address )</label></span></legend>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Street No. and Name</label>
					<input type="text" class="form-control" name="present_street_no" id="present_street_no" value="{{ $employee_rs->present_street_no  }}" >
					@if ($errors->has('present_street_no'))
					<div class="error" style="color:red;">{{ $errors->first('present_street_no') }}</div>
					@endif
				</div>
				<div class="col-md-4">
					<label>City</label>
					<input type="text" class="form-control" name="present_city" id="present_city" value="{{  $employee_rs->present_city   }}" >
					@if ($errors->has('present_city'))
					<div class="error" style="color:red;">{{ $errors->first('present_city') }}</div>
					@endif
				</div>
				<div class="col-md-4">
					<label>State</label>
					<input type="text" class="form-control" name="present_state" id="present_state" value="{{ $employee_rs->present_state   }}" >
					@if ($errors->has('present_state'))
					<div class="error" style="color:red;">{{ $errors->first('present_state') }}</div>
					@endif
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-4">
					<label>Country</label>
					<input type="text" class="form-control" name="present_country" id="present_country" value="{{ $employee_rs->present_country  }}" >
					@if ($errors->has('present_country'))
					<div class="error" style="color:red;">{{ $errors->first('present_country') }}</div>
					@endif
				</div>
				<div class="col-md-4">
					<label>Pin Code</label>
					<input type="text" class="form-control" name="present_pin" id="present_pin" value="{{ $employee_rs->present_pin  }}" >
					@if ($errors->has('present_pin'))
					<div class="error" style="color:red;">{{ $errors->first('present_pin') }}</div>
					@endif
				</div>
				
			</div>
			<!--------------------------->
			
          <div class="form-group">
             
                <button class="btn btn-warning back3" type="button"><i class="ti-arrow-left"></i> Back</button> 
                <button class="btn btn-primary open3" type="button">Next <i class="ti-arrow-right"></i></button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>

          </fieldset>
        </div>
		
		<div id="sf4" class="frm" style="display: none;">
          <fieldset>
            <legend>Professional Details</legend>

            <div class="row form-group">
              <div class="col-md-4">
			  <label>Date of Join <span>(*)</span></label>
			  <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{ $employee_rs->joining_date }}" >
				@if ($errors->has('joining_date'))
				<div class="error" style="color:red;">{{ $errors->first('joining_date') }}</div>
				@endif
			  </div>
			   <div class="col-md-4">
			  <label>Pan No. <span>(*)</span></label>
			  <input type="text" class="form-control" id="pan_no" name="pan_no" value="{{  $employee_rs->pan_no }}"  >
				@if ($errors->has('pan_no'))
				<div class="error" style="color:red;">{{ $errors->first('pan_no') }}</div>
				@endif
			  </div>
			   <div class="col-md-4">
			  <label>Adhar No. <span>(*)</span></label>
			  <input type="text" class="form-control" id="adhar_no" name="adhar_no" value="{{ $employee_rs->adhar_no  }}" >
				@if ($errors->has('adhar_no'))
				<div class="error" style="color:red;">{{ $errors->first('adhar_no') }}</div>
				@endif
			  </div>
            </div>
			
			
			
			 <!--<div class="row form-group">
			 <div class="col-md-4">
			  <label>CL Due</label>
			  <input type="text" class="form-control" id="cl">
			  </div>
              
			   <div class="col-md-4">
			  <label>PL Due</label>
			  <input type="text" class="form-control" id="mobile">
			  </div>
			   <div class="col-md-4">
			  <label>Sick Leave Due</label>
			  <input type="text" class="form-control" id="fthname">
			  </div>
            </div>-->
			
			
			<div class="row form-group">
			 <!--<div class="col-md-4">
			  <label>Half Pay Leave Due</label>
			  <input type="text" class="form-control" id="cl">
			  </div>-->
              
			   <div class="col-md-4">
			  <label>PF Account No.</label>
			  <input type="text" class="form-control" id="pf_no" name="pf_no" value="{{ $employee_rs->pf_no  }}" >
			  </div>
			   <div class="col-md-4">
			  <label>PF Join Date</label>
			  <input type="date" class="form-control" id="pf_join_date" name="pf_join_date" value="{{ $employee_rs->pf_join_date  }}" >
			  </div>
			  <div class="col-md-4">
			  <label>ESIC NO.</label>
			  <input type="text" class="form-control" id="esic_no" name="esic_no"  value="{{ $employee_rs->esic_no  }}"  >
			  </div>
            </div>
			
			
			<div class="row form-group">
			 
              
			   <div class="col-md-4">
				  <label>OT Applicable</label>
				  <select class="form-control" name="ot_applicable">
					<option value="" selected disabled>Select</option>
					<option value="Yes" <?php if($employee_rs->ot_applicable  == "Yes"){ echo "selected"; } ?> >Yes</option>
					<option value="No" <?php if($employee_rs->ot_applicable  == "No"){ echo "selected"; } ?> >No</option>
				  </select>
			  </div>
			   <div class="col-md-4">
			  <label>Nominee</label>
			  <input type="nominee" class="form-control" id="nominee" name="nominee" value="{{ $employee_rs->nominee  }}" >
			  </div>
            </div>
			
				
			
          <div class="form-group">
             
                <button class="btn btn-warning back4" type="button"><i class="ti-arrow-left"></i> Back</button> 
                <button class="btn btn-primary open4" type="button">Next <i class="ti-arrow-right"></i> </button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>

          </fieldset>
        </div>
		
		<div id="sf5" class="frm" style="display: none;">
          <fieldset>
            <legend>Pay Structure</legend>

            <div class="row form-group" style="width:600px;margin:20px auto;">
              
			   
				<div class="col-md-3">
					<label>Basic Salary <span>(*)</span></label>
				</div>
				<div class="col-md-9">
					<input type="text" class="form-control" id="basic_salary" name="basic_salary" value="{{ $employee_rs->basic_salary }}" >
					@if ($errors->has('basic_salary'))
					<div class="error" style="color:red;">{{ $errors->first('basic_salary') }}</div>
					@endif
				</div>
			</div>
			
			<div id="head">
					<?php 
					if(!empty($result))
					{ 
						print_r($result); 
					} 
					?>
			</div>
			
			<div class="form-group">
			 
				<button class="btn btn-warning back5" type="button"><i class="ti-arrow-left"></i> Back</button> 
				<button class="btn btn-primary open5" type="button">Next <i class="ti-arrow-right"></i></button> 
				<img src="spinner.gif" alt="" id="loader" style="display: none">
			</div>

          </fieldset>
        </div>
		
		
		<div id="sf6" class="frm" style="display: none;">
          <fieldset>
            <legend>Transcation Mode</legend>

            <div class="row form-group">
              <div class="col-md-3">
			  <label>Transcation Mode <span>(*)</span></label><br>
			  <div class="radio-inline"><input type="radio" name="transcation_mode" value="Cash" <?php if($employee_rs->transcation_mode == "CASH"){ echo "checked"; } ?>  >Cash</div>
			  <div class="radio-inline"><input type="radio" name="transcation_mode" value="Bank" <?php if($employee_rs->transcation_mode == "BANK"){ echo "checked"; } ?> >Bank</div>
				@if ($errors->has('transcation_mode'))
				<div class="error" style="color:red;">{{ $errors->first('transcation_mode') }}</div>
				@endif
			  </div>
			   <div class="col-md-3">
			  <label>Select Bank <span>(*)</span></label><br>
				 <select class="form-control" name="bank_id"  >
				 	<option value="" selected disabled>Select</option>
					@foreach($bank_rs as $bank)
					<option value="{{ $bank->id }}" <?php if($employee_rs->bank_id == $bank->id){ echo "selected"; } ?> >{{ $bank->bank_name }}</option>
					@endforeach
				 </select>
				 @if ($errors->has('bank_id'))
				<div class="error" style="color:red;">{{ $errors->first('bank_id') }}</div>
				@endif
			  </div>
			   <div class="col-md-3">
			  <label>Account Number <span>(*)</span></label>
			  <input type="text" class="form-control" id="ac" name="account_number"  value="{{ $employee_rs->account_number }}" >
				@if ($errors->has('account_number'))
				<div class="error" style="color:red;">{{ $errors->first('account_number') }}</div>
				@endif
			  </div>
			  <div class="col-md-3">
			  <label>Account Type</label>
			  <select class="form-control" name="account_type" >
				<option>Select</option>
				<option value="Savings" <?php if($employee_rs->account_type == "SAVINGS" ){ echo "selected"; } ?> >Savings</option>
				<option value="Current" <?php if($employee_rs->account_type == "CURRENT"){ echo "selected"; } ?> >Current</option>
				<option value="Salary" <?php if($employee_rs->account_type == "SALARY"){ echo "selected"; } ?> >Salary</option>
			  </select>
				 @if ($errors->has('account_type'))  
				<div class="error" style="color:red;">{{ $errors->first('account_type') }}</div>
				@endif
			  </div>
            </div>
			
			
			
			<div class="form-group">
             
                <button class="btn btn-warning back6" type="button"><i class="ti-arrow-left"></i> Back</button> 
                <button class="btn btn-primary" type="submit">Submit <i class="ti-arrow-right"></i></button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
            </div>

          </fieldset>
        </div>
		
		
      </form>
    </div>
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
<div class="clearfix"></div>

	<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
	
	
	<script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/init/datatables-init.js') }}"></script>
	
	<script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
	</script>

<script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>

<script type="text/javascript">
  
  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
        uname: {
          required: false,
          minlength: 2,
          maxlength: 16
        },
        uemail: {
          required: false,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        upass1: {
          required: false,
          minlength: 6,
          maxlength: 15,
        },
        upass2: {
          required: false,
          minlength: 6,
          equalTo: "#upass1",
        }

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
	$(".open3").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf4").show("slow");
      }
    });
	$(".open4").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf5").show("slow");
      }
    });
	$(".open5").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf6").show("slow");
      }
    });
    
    $(".open6").click(function() {
      if (v.form()) {
        $("#loader").show();
         setTimeout(function(){
           $("#basicform").html('<h2>Employee Added Successfully</h2>');
         }, 1000);
        return false;
      }
    });
    
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });
	$(".back4").click(function() {
      $(".frm").hide("fast");
      $("#sf3").show("slow");
    });
	$(".back5").click(function() {
      $(".frm").hide("fast");
      $("#sf4").show("slow");
    });
	$(".back6").click(function() {
      $(".frm").hide("fast");
      $("#sf5").show("slow");
    });

  });
</script>

<script>
/*
		var company_id=$("#company_id option:selected").val();
		
		if(company_id != '')
		{
			//alert("test");
			$.ajax({
					type:'GET',
					url:'{{url('attendance/get-grades')}}/'+company_id,				
					success: function(response){
					console.log(response); 
					
					$("#grade_id").html(response);
					
					}
					
				});
		}
*/		
		function getGrades(company_id)
		{			
			alert(company_id);
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-grades')}}/'+company_id,				
				success: function(response){
				console.log(response); 
				
				$("#grade_id").html(response);
				
				}
				
			});
		}
</script>


<script>
		function getEmployeeType(company_id)
		{			
			//alert(company_id);
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-employee-type')}}/'+company_id,				
				success: function(response){
				console.log(response); 
				
				$("#employee_type_id").html(response);
				
				}
				
			});
		}
</script>

<script>

		function getDesignation(company_id)
		{			
			//alert(company_id);
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-designation')}}/'+company_id,				
				success: function(response){
				console.log(response); 
				
				$("#designation_id").html(response);
				
				}
				
			});
		}
</script>

<script>

			/*		
		
			var company_id=$("#company_id option:selected").val();
			var grade_id=$("#grade_id option:selected").val();
			//alert("Company 1"+company_id);
			//alert("Grade 1"+grade_id);
			
			if(company_id != '' && grade_id != '')
			{
				//alert("Company"+company_id);
				//alert("Grade"+grade_id);
				$.ajax({
					type:'GET',
					url:'{{url('attendance/get-head-names')}}/'+company_id+'/'+grade_id,				
					success: function(response){
					console.log(response); 
					
					$("#head").html(response);
					
					}
					
				});
			}
			*/
		function getHeadNames(grade_id)
		{	
			var company_id=$("#company_id option:selected").val();
			//alert("Company"+company_id);
			//alert("Grade"+grade_id);
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-head-names')}}/'+company_id+'/'+grade_id,				
				success: function(response){
				console.log(response); 
				
				$("#head").html(response);
				
				}
				
			});
		}
</script>


<script type="text/javascript">
	
	function chckaddress() {
		var ischecked=$('#diffaddrress').is(":checked");
		//alert(ischecked);
		var permanent_street_no=$("#permanent_street_no").val();
		var permanent_city=$("#permanent_city").val();
		var permanent_state=$("#permanent_state").val();
		var permanent_country=$("#permanent_country").val();
		var permanent_pin=$("#permanent_pin").val();
		
		if(ischecked)
		{
			$("#present_street_no").val(permanent_street_no);
			$("#present_city").val(permanent_city);
			$("#present_state").val(permanent_state);	
			$("#present_country").val(permanent_country);
			$("#present_pin").val(permanent_pin);
		}
		else
		{
			$("#present_street_no").val('');
			$("#present_city").val('');
			$("#present_state").val('');	
			$("#present_country").val('');
			$("#present_pin").val('');
		}
		
		
		
	}

</script>
<script src="{{ asset('js/jquery.autosuggest.js') }}"></script>
<script>
var reporting_person='';
var persons= reporting_person;
//alert("Suggest"+persons);
$("#reporting_person").autosuggest({
			sugggestionsArray: persons
		});
</script>
<script>

function getReportingPerson(val)
{
	//alert(val);
	//var reporting_person= encodeURIComponent(val);
	//window.location = 'payment_receive.php?job_work_no='+reporting_person;\
	$.ajax({
		type:'GET',
		url:'{{url('attendance/get-reporting-names')}}',				
		success: function(response){
		//alert(response);
		//var jqObj = jQuery.parseJSON(response); 
		//var jqObj =JSON.parse(response);
		//var jqObj = $.parseJSON(response);		
		//console.log(jqObj.reporting_person); 
		//alert(jqObj);
		$("#browsers").html(response);
		//reporting_person= response;
		//$("#reporting_person").val(jqObj.reporting_person);
		}
		
	});
}

</script>

<script>
	function getBranches(company_id)
	{			
		//alert(company_id);
		$.ajax({
			type:'GET',
			url:'{{url('pis/get-branches')}}/'+company_id,				
			success: function(response){
			console.log(response); 
			
			$("#branch_id").html(response);
			
			}
			
		});
	}
</script>

@endsection

