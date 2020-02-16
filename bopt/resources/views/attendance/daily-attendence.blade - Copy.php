@extends('attendance.layouts.master')

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
                  
                    <div class="main-card" style="width:1000px;margin:0 auto;">
                        <div class="card">
						<div class="card-header"><strong class="card-title">Daily Attendence Sheet Maintenence</strong></div>
                            
                            <div class="card-body card-block">
                                <form  method="post" action="{{ url('attendance/daily-attendance') }}" enctype="multipart/form-data" class="form-horizontal" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                   
                                    <div class="row form-group">
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Company Name <span> (*)</span></label>
									
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
							
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">From Date <span>(*)</span></label>
									<input type="date" id="text-input" name="from_dt"  class="form-control">
									@if ($errors->has('from_dt'))
									<div class="error" style="color:red;">{{ $errors->first('from_dt') }}</div>
									@endif
									</div>
												
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">To Date <span>(*)</span></label>
									<input type="date" id="text-input" name="to_dt"  class="form-control">
									@if ($errors->has('to_dt'))
									<div class="error" style="color:red;">{{ $errors->first('to_dt') }}</div>
									@endif	
									</div>
										
                                       
                                 </div>
								<div class="row form-group">
								 
									<div class="col col-md-4">
									<label for="text-input" class=" form-control-label">Employee ID</label>
										<input type="text" id="employee_code" name="employee_code"  class="form-control">
									</div>
									
									<!--
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Employee Name <span>(*)</span></label>
										  <select data-placeholder="Choose an Employee..."  class="form-control">
											<option value="" label="Select"></option>
											<option value="Staff">Amit Dey</option>
											<option value="Group D">Joy Ghosh</option>
											
										</select>
									</div>
									-->
									<div class="col col-md-4 btn-up">
									<button type="submit" class="btn btn-danger btn-sm">Search</button>
									<button type="reset" class="btn btn-danger btn-sm">
										<i class="fa fa-ban"></i> Reset
									</button>
									</div>
								</div>	
                                   
                           
                                
                            
							</form>
							 
                        </div>
                       <div class="card-body">
					
								<div class="card-header">
									<strong class="card-title">Search Result</strong>
								</div>
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
								<br/>
								<form method="post" action="{{ url('attendance/add-daily-attendance') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="srch-rslt" style="overflow-x:scroll;">
								<table id="bootstrap-data-table1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th><div class="checkbox">
											<label><input type="checkbox"  name="all" id="all" width="30px;" height="30px;">
											Select</label>
											</div></th>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Boss Name</th>
											<th>Shift Time</th>
											<th>Attendence Date</th>
											<th>Arrival Time<br/>(HH:MM:SS)</th>
											<th>Departure Time<br/>(HH:MM:SS)</th>
											<th>Base Location</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php print_r($result); ?>
                                        
                                    </tbody>
									
                                </table>
								<div class="sv"><button type="button" class="btn btn-danger btn-sm">Check All</button>
										<button type="submit" class="btn btn-danger btn-sm">Save</button>
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