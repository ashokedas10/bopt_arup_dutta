@extends('sms.fees-management.layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('sms.fees-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.fees-management.partials.header')
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
            <div class="card-header"><strong class="card-title">Add New Payment Structure</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('sms/fees-management/payment-school-config') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<?php if(old('institute_code')==''){ $institute=$institute_code; }else{ $institute=old('institute_code');} ?>
				<input type="hidden" name="institute_code" id="institute_code" value="{{ $institute }}" >
				
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                 
                  <div class="row form-group lv-due-body">					  
					  <div class="col-md-4">
					  	<label for="text-input" class=" form-control-label">Class Name</label>
						<select class="form-control" name="class_code" onchange="get_fees_head(this.value);">
                            <option value="" selected disabled>Select</option>
							@foreach($class_rs as $class)
                            <option value="{{ $class->class_code }}"  <?php if(old('class_code') ==$class->class_code) { echo "selected"; } ?> >{{ $class->class_name }}</option>
                            @endforeach
                        </select>
						@if ($errors->has('class_code'))
							<div class="error" style="color:red;">{{ $errors->first('class_code') }}</div>
						@endif
					  </div>
					  
					  <div class="col-md-4">
					 	<label>Fees Head</label>
						 <select class="form-control" name="fees_head_code" id="fees_head_code">
							<option value="" selected disabled >Select</option>
							
						</Select>
						 @if ($errors->has('fees_head_code'))
							<div class="error" style="color:red;">{{ $errors->first('fees_head_code') }}</div>
						@endif
					 </div>
					 
					<div class="col-md-4">
					<label>Select Category</label>
                      <select class="form-control" name="category" id="category" >
                        <option value="" selected disabled>Select</option>
                        <option value="General" >General</option>
                        <option value="SC/ST" >SC/ST</option>
						<option value="OBC" >OBC</option>
                      </select>	
					   @if ($errors->has('category'))
							<div class="error" style="color:red;">{{ $errors->first('category') }}</div>
						@endif
					</div>
					
					</div>
					
					<div class="row form-group">
					  <div class="col-md-4">
						<label>Session</label>
						<select class="form-control" name="session" >
							<option value='' selected disabled>Select</option>
							<?php
								for($i=2016; $i<=2030; $i++)
								{
							?>
							<option value="{{ $i }}" >{{ $i }}</option>
							<?php
								}
							?>
						</select>
					</div>
					
					
					<div class="col-md-4">
							<label>Mode of Payment</label>
							<select class="form-control" name="mode_of_payment">
								<option value='' selected disabled >Select</option>
								<option value="Annualy" >Annualy</option>
								<option value="Half Yearly">Half Yearly</option>
								<option value="Quarterly" >Quarterly</option>
								<option value="Fort Night">Fort Night</option>
							</select>
						</div>
						<div class="col-md-4">
							<label>No. of Installment</label>
							<input type="text" class="form-control" name="no_of_installement" >
						</div>
					  </div>
					  
					
					  <div class="row form-group">
                     
					 
                    <div class="col-md-4">
					<label>Select National Type</label>
                     <select class="form-control" id="national_type" name="national_type" >
						<option value="" selected disabled >Select</option>
						<option value="Domestic" >Domestic</option>
						<option value="Bangladesh"  >Bangladesh</option>
						<option value="Foreigner" >Foreigner</option>
					</select>
					  @if ($errors->has('national_type'))
							<div class="error" style="color:red;">{{ $errors->first('national_type') }}</div>
						@endif
					</div>
					
					
					 <div class="col-md-4">
					 <label>From Date</label>
					 <input type="date" class="form-control" name="frm_dt" id="frm_dt" >
					 @if ($errors->has('frm_dt'))
							<div class="error" style="color:red;">{{ $errors->first('frm_dt') }}</div>
						@endif
					</div>
					 
					 
					 <div class="col-md-4">
					 <label>To Date</label>
					 <input type="date" class="form-control" name="to_dt" id="to_dt" >
					  @if ($errors->has('to_dt'))
							<div class="error" style="color:red;">{{ $errors->first('to_dt') }}</div>
						@endif
					 </div>
					 
					 
                  </div>
				  
				   <div class="row form-group">
                     
					 
					<div class="col-md-4">
					 <label>Actual Amount</label>
					 <input type="text" class="form-control" name="ammount" id="ammount" >
					 @if ($errors->has('ammount'))
							<div class="error" style="color:red;">{{ $errors->first('ammount') }}</div>
						@endif
					 </div>
					 
					 <div class="col-md-4 btn-up">
					 	<button type="submit" class="btn btn-danger btn-sm">Submit</button>
                     <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
					 </div>
					 </div>
					 
				 
                </div>
				
              </form>
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
@endsection



@section('scripts')
	@include('sms.fees-management.partials.scripts')
	
	<script>
		function get_fees_head(class_code)
		{	
			//var faculty_id=$("#faculty_code option:selected").val();
			//alert("Company"+company_id);
			//alert("course_id "+course_id+ "faculty_id  "+faculty_id);
			$.ajax({
				type:'GET',
				url:'{{url('sms/get-fees-head-by-classes')}}/'+class_code,				
				success: function(response){
				console.log(response); 
				
				$("#fees_head_code").html(response);
				
				}
				
			});
		}
	</script>
	
@endsection
