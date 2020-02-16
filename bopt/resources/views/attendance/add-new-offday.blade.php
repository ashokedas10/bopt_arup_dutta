@extends('layouts.master')

@section('title')
Payroll Information System-Offday
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
                            <div class="card-header"><strong class="card-title">Add New Offday</strong></div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                   
                                    <div class="row form-group">
										<div class="col-md-6">
											<label>Enter Employee Code</label>
											<input type="text" class="form-control" id="employee_code" name="employee_code" onblur="getempname();" placeholder="Enter Employee Code">
											@if ($errors->has('employee_code'))
												<div class="error" style="color:red;">{{ $errors->first('employee_code') }}</div>
											@endif
										</div>
										<div class="col-md-6">
											<label>Employee Name</label>
											<input type="text" class="form-control" id="employee_name" name="employee_name" readonly>
											@if ($errors->has('employee_name'))
												<div class="error" style="color:red;">{{ $errors->first('employee_name') }}</div>
											@endif
										</div>
									</div>
							
							<div class="row form-group">
									<div class="col-md-6">
										<label>Company Name</label>
										<input type="text" class="form-control" id="company_id" name="company_id" readonly>
										@if ($errors->has('company_id'))
											<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
											@endif
									</div>
									<div class="col-md-6">
									<label>Grade</label>
								<input type="text" class="form-control" id="grade_id" name="grade_id" readonly>
								@if ($errors->has('grade_id'))
											<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
											@endif
								</div>
									
                                   
                            </div>
							<div class="row form-group">
							
							<label class="col-md-3 checkbox-inline"><input type="checkbox" id="sunday" value="0" name="sunday" > Sunday</label>
							<label class="col-md-3 checkbox-inline"><input type="checkbox" id="monday" name="monday"> Monday</label>
							<label class="col-md-3 checkbox-inline"><input type="checkbox" id="tuesday" name="tuesday"> Tuesday</label>
							<label class="col-md-3 checkbox-inline"><input type="checkbox" id="wednesday" name="wednesday"> Wednesday</label>
							<label class="col-md-3 checkbox-inline"><input type="checkbox" id="thursday" name="thursday"> Thursday</label>
							<label class="col-md-3 checkbox-inline"><input type="checkbox" id="friday" name="friday"> Friday</label>
							<label class="col-md-3 checkbox-inline"><input type="checkbox" id="saturday" name="saturday"> Saturday</label>
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
	@include('partials.scripts')
	<script>
	// Listen for click on toggle checkbox for each Page
		$('#sunday').click(function(event) {   
			if(this.checked) {
				$("#sunday").val(1);
				//this.checked = true;  
			} else {
				//this.checked = false;
				$("#sunday").val(0);
			}
		});
		$('#monday').click(function(event) {   
			if(this.checked) {
				$("#monday").val(1);
				//this.checked = true;  
			} else {
				//this.checked = false;
				$("#monday").val(0);
			}
		});
		$('#tuesday').click(function(event) {   
			if(this.checked) {
				$("#tuesday").val(1);
				//this.checked = true;  
			} else {
				//this.checked = false;
				$("#tuesday").val(0);
			}
		});
		$('#wednesday').click(function(event) {   
			if(this.checked) {
				$("#wednesday").val(1);
				//this.checked = true;  
			} else {
				//this.checked = false;
				$("#wednesday").val(0);
			}
		});
		$('#thursday').click(function(event) {   
			if(this.checked) {
				$("#thursday").val(1);
				//this.checked = true;  
			} else {
				//this.checked = false;
				$("#thursday").val(0);
			}
		});
		$('#friday').click(function(event) {   
			if(this.checked) {
				$("#friday").val(1);
				//this.checked = true;  
			} else {
				//this.checked = false;
				$("#friday").val(0);
			}
		});
		$('#saturday').click(function(event) {   
			if(this.checked) {
				$("#saturday").val(1);
				//this.checked = true;  
			} else {
				//this.checked = false;
				$("#saturday").val(0);
			}
		});
		
		function getempname()
		{
			var employee_code = $('#employee_code').val();
			//alert(employee_code);
			$.ajax({
				url:'{{url('attendance/get-emp-name-offday')}}/'+employee_code,
				type:"GET",
				success:function(jsonStr){
					//alert(jsonStr);
					var obj = JSON.parse(jsonStr);
					$('#employee_name').val(obj.name);
					$('#company_id').val(obj.company);
					$('#grade_id').val(obj.grade);
				}
			});
		}
		
	</script>
	
@endsection

