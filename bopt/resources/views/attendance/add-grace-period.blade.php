@extends('layouts.master')

@section('title')
Payroll Information System-Grace Period
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
                            <div class="card-header">
								<strong class="card-title">Add Grace Period</strong>
							</div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									 <div class="row form-group">
                                        <div class="col col-md-4"><label for="company-name" class=" form-control-label">Company Name <span>(*)</span></label>
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
                                    
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Grade <span>(*)</span></label>
										  <select data-placeholder="Choose a Grade..." class="form-control" name="grade_id" id="grade_id">
										 
											<option value="" selected disabled >Select</option>
											
										</select>
										@if ($errors->has('grade_id'))
											<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
										@endif
									</div>
									
									<div class="col col-md-4"><label for="company-name" class=" form-control-label">Branch <span>(*)</span></label>
										<select class="form-control" name="branch_id" id="branch_id">
											<option value="" selected disabled >Select</option>
											@foreach($branch_rs as $branch)
											<option value="{{ $branch->id }}" <?php if(old('branch_id') == $branch->id){ echo "selected"; } ?>>{{ $branch->branch_name }}</option>
											@endforeach
										</select>
										@if ($errors->has('branch_id'))
											<div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
										@endif
								</div>
                                        
                                    
                                        
                                    </div>
                                  	 
									<div class="row form-group">
										<div class="col col-md-4"><label for="company-name" class=" form-control-label">Shift Name <span>(*)</span></label>
											<select class="form-control" name="shift_name" id="shift_name" onblur="getshiftintime();">
												<option value="" selected disabled >Select</option>
												@foreach($shift_rs as $shift)
												<option value="{{ $shift->shift_name }}" <?php if(old('shift_name') == $shift->shift_name){ echo "selected"; } ?>>{{ $shift->shift_name }}</option>
												@endforeach
											</select>
											@if ($errors->has('shift_name'))
												<div class="error" style="color:red;">{{ $errors->first('shift_name') }}</div>
											@endif
										</div>
                                        <div class="col col-md-4"><label for="company-name" class=" form-control-label">Shift In Time <span>(*)</span></label>
										<input type="time" class="form-control" placeholder="Shift In Time" name="shift_in_time" id="shift_in_time" value="{{ old('shift_in_time') }}">
										@if ($errors->has('shift_in_time'))
												<div class="error" style="color:red;">{{ $errors->first('shift_in_time') }}</div>
											@endif
										</div>
										<div class="col col-md-4"><label for="company-name" class=" form-control-label">Grace Period (in minutes) <span>(*)</span></label>
										<input type="text" class="form-control" name="grace_period" value="{{ old('grace_period') }}"  >
										@if ($errors->has('grace_period'))
												<div class="error" style="color:red;">{{ $errors->first('grace_period') }}</div>
											@endif
										</div>
                                   									
									</div>
                                        
                                    
                                    
									
                            <div>
                           
                                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
								<p>(*) marked fields are mandatory</p>
                            
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
         @endsection

@section('scripts')
@include('partials.scripts')
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
		function getshiftintime()
		{
			var shift_name = $('#shift_name').val();
			//alert(employee_code);
			$.ajax({
				url:'{{url('attendance/get-shift')}}/'+shift_name,
				type:"GET",
				success:function(jsonStr){
					//alert(jsonStr);
					$('#shift_in_time').val(jsonStr);
				}
			});
		}
	</script>	
@endsection