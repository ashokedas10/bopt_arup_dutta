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
						
                            <div class="card-header"><strong class="card-title">Add New Late Policy</strong></div>
                            <div class="card-body card-block">
                                <form action="{{ url('attendance/late-policy') }}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                   
                                    <div class="row form-group">
									<div class="col-md-3">
										<label>Select Company Name<span>(*)</span></label>
										<select class="form-control" name="company_id" id="company_id" onchange="getGrades(this.value);" >
											<option value='' selected disabled>Select</option>
											@foreach($company_rs as $company)
											<option value="{{$company->id}}" <?php if(old('company_id') == $company->id){ echo "selected"; } ?>>{{ $company->company_name }}</option>
											@endforeach
										</select>
										@if ($errors->has('company_id'))
											<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
										@endif
										
									</div>
									<div class="col-md-3">
									<label>Select Grade<span>(*)</span></label>
										<select class="form-control" name="grade_id" id="grade_id" onchange="getShifts(this.value);">
											<option value="" selected disabled >Select</option>
											
										</select>
										@if ($errors->has('grade_id'))
											<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
										@endif
									</div>
										
									<div class="col-md-3">
										<label>Shift Code<span>(*)</span></label>
										<select name="shift_id" id="shift_id"  class="form-control">
											<option value="" selected disabled>Select</option>											
										</select>
										@if ($errors->has('shift_id'))
										<div class="error" style="color:red;">{{ $errors->first('shift_id') }}</div>
										@endif
									</div> 
									<div class="col-md-3">
									<label>Maximum Grace Period<span>(*)</span> <label>
									<input type="text" class="form-control" id="max_grace_period" name="max_grace_period" value="{{ old('max_grace_period') }}" >
									@if ($errors->has('max_grace_period'))
										<div class="error" style="color:red;">{{ $errors->first('max_grace_period') }}</div>
									@endif
									</div>
									</div>
							
									<div class="row form-group">
									<div class="col-md-3">
									<label>No. of Day Allow<span>(*)</span></label>
									<input type="text" class="form-control" id="no_day_allow" name="no_day_allow" value="{{ old('no_day_allow') }}" >
									@if ($errors->has('no_day_allow'))
										<div class="error" style="color:red;">{{ $errors->first('no_day_allow') }}</div>
									@endif
									</div>
									<div class="col-md-3">
									<label>No. of Day Salary Deducted<span>(*)</span></label>
									<input type="text" class="form-control" id="no_day_salary_deducted" name="no_day_salary_deducted" value="{{ old('no_day_salary_deducted') }}">
									@if ($errors->has('no_day_salary_deducted'))
										<div class="error" style="color:red;">{{ $errors->first('no_day_salary_deducted') }}</div>
									@endif
									</div>
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
        <div class="clearfix"></div>


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
				
				}
				
			});
		}
	</script>
	
	<script>
		function getShifts(grade_id)
		{			
			//alert(company_id);
			var company_id=$('select#company_id').find('option:selected').val();
			//alert(company_id);
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-shifts')}}/'+company_id+'/'+grade_id,				
				success: function(response){
				console.log(response); 
				
					$("#shift_id").html(response);
				
				}
				
			});
		}
	</script>
	
@endsection