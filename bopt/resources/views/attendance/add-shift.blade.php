@extends('layouts.master')

@section('title')
Payroll Information System-Company
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
								<strong class="card-title">Add Shift</strong>
							</div>
                            <div class="card-body card-block">
                                <form action="{{ url('attendance/add-shift') }}" method="post" enctype="multipart/form-data" class="form-horizontal" >
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
									 <div class="row form-group">
                                        <div class="col col-md-3"><label for="company-name" class=" form-control-label">Company Name <span>(*)</span></label>
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
                                    
									<div class="col col-md-3"><label for="text-input" class=" form-control-label">Grade <span>(*)</span></label>
										  <select data-placeholder="Choose a Grade..." class="form-control" name="grade_id" id="grade_id">
											<option value="" selected disabled >Select</option>
											
										</select>
										@if ($errors->has('grade_id'))
											<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
										@endif
									</div>
								
                                        <div class="col col-md-3"><label for="company-name" class=" form-control-label">Shift Name <span>(*)</span></label>
										<input type="text" class="form-control" placeholder="Shift Name" name="shift_name" value="{{ old('shift_name') }}">
										@if ($errors->has('shift_name'))
											<div class="error" style="color:red;">{{ $errors->first('shift_name') }}</div>
										@endif
										</div>
                                    
                                        <div class="col col-md-3"><label for="company-name" class=" form-control-label">Shift Description <span>(*)</span></label>
										<input type="text" class="form-control" placeholder="Shift Description" name="shift_description" value="{{ old('shift_description') }}">
										@if ($errors->has('shift_description'))
											<div class="error" style="color:red;">{{ $errors->first('shift_description') }}</div>
										@endif
										</div>
                                    </div>
                                  	 
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="company-name" class=" form-control-label">Shift In Time <span>(*)</span></label>
										<input type="time" class="form-control" placeholder="Shift In Time" name="shift_in_time" value="{{ old('shift_in_time') }}">
										@if ($errors->has('shift_in_time'))
											<div class="error" style="color:red;">{{ $errors->first('shift_in_time') }}</div>
										@endif
										</div>
                                 
									
                                        <div class="col col-md-3"><label for="company-name" class=" form-control-label">Shift Out Time <span>(*)</span></label>
										<input type="time" class="form-control" placeholder="Shift Out Time" name="shift_out_time" value="{{ old('shift_out_time') }}">
										@if ($errors->has('shift_out_time'))
											<div class="error" style="color:red;">{{ $errors->first('shift_out_time') }}</div>
										@endif
										</div>
                                   									
									
                                        <div class="col col-md-3"><label for="company-name" class=" form-control-label">Recess From Time <span>(*)</span></label>
										<input type="time" class="form-control" placeholder="Shift In Time" name="recess_from_time" value="{{ old('recess_from_time') }}">
										@if ($errors->has('recess_from_time'))
											<div class="error" style="color:red;">{{ $errors->first('recess_from_time') }}</div>
										@endif
										</div>
                                    
									
                                        <div class="col col-md-3"><label for="company-name" class=" form-control-label">Recess to Time <span>(*)</span></label>
										<input type="time" class="form-control" placeholder="Shift Out Time" name="recess_to_time" value="{{ old('recess_to_time') }}">
										@if ($errors->has('recess_to_time'))
											<div class="error" style="color:red;">{{ $errors->first('recess_to_time') }}</div>
										@endif
										</div>
                                    </div>
                                    
                                    
									
                            <div class="text-right">
                           
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
	</script>
	
@endsection
