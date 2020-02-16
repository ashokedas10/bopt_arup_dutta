@extends('attendance.layouts.master')

@section('title')
Payroll Information System-Duty Roaster Employee Wise
@endsection

@section('sidebar')
	@include('attendance.partials.sidebar')
@endsection

@section('header')
	@include('partials.header')
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
						<div class="card-header"><strong class="card-title">Add Duty Roaster (Employee wise) </strong></div>                          
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                    
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									<div class="col-md-6">
										<label>Select Company Name <span>(*)</span></label>
										<select class="form-control" name="company_id" id="company_id" onchange="getGrades(this.value);">
											<option value='' selected disabled>Select</option>
											@foreach($company_rs as $company)
											<option value="{{$company->id}}" <?php if(old('company_id') == $company->id){ echo "selected"; } ?>>{{ $company->company_name }}</option>
											@endforeach
										</select>
										@if ($errors->has('company_id'))
											<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
										@endif
									</div>
									<div class="col-md-6">
									<label>Select Grade <span>(*)</span></label>
									<select data-placeholder="Choose a Grade..." class="form-control" name="grade_id" id="grade_id" onchange="getshift(this.value);">
											<option value="" label="Select"></option>
											
										</select>
										@if ($errors->has('grade_id'))
											<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
										@endif
								</div>
								<div class="col-md-6">
									<label>Enter Employee Code <span>(*)</span></label>
									<input type="text" class="form-control" placeholder="Employee Code" id="employee_code" name="employee_code" value="{{ old('employee_code') }}" onblur="getempname();">
									@if ($errors->has('employee_code'))
											<div class="error" style="color:red;">{{ $errors->first('employee_code') }}</div>
										@endif
								</div>
								<div class="col-md-6">
									<label>Employee Name<span>(*)</span></label>
									<input type="text" class="form-control" placeholder="Employee Name" id="employee_name" name="employee_name" value="{{ old('employee_name') }}">
									@if ($errors->has('employee_name'))
											<div class="error" style="color:red;">{{ $errors->first('employee_name') }}</div>
										@endif
								</div>		
                                   
                            </div>
							
							<div id="new">								
							
							</div>
                           
                                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
								<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                                
                            
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
        @endsection

@section('scripts')
@include('attendance.partials.scripts')
<script>
		function getGrades(company_id)
		{			
			//alert(company_id);
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-grades')}}/'+company_id,				
				success: function(response){
				console.log(response); 
				
				$("#grade_id").html(response);
				//var jqObj = jQuery.parseJSON(response); 
					//alert(response);
					//var jqObj =JSON.parse(response);
					//var jqObj = response.map(JSON.parse)
				//var jqObj = jQuery(response);
				//alert(jqObj.emp_present_address);
				//$("#grade_id").val(jqObj.emp_name);
				//$("#address").val(jqObj.emp_present_address);
				}
				
			});
		}
		function getshift(val)
		{
			var comp_id = $('#company_id').val();
			var grade_id = val;
			//alert(comp_id);alert(grade_id);
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-shift-duty-roaster')}}/'+comp_id+'/'+grade_id,				
				success: function(response){
				console.log(response); 
				//alert(response);
				$("#new").html(response);
				
				}
				
			});
			
		}
		function getempname()
		{
			var emp_code = $('#employee_code').val();
			//alert(emp_code);
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-emp-name')}}/'+emp_code,				
				success: function(response){
				console.log(response);
				//var jqObj =JSON.parse(response);
				//alert(response);
				$("#employee_name").val(response);
				
				}
				
			});
			
		}
	</script>	
@endsection
