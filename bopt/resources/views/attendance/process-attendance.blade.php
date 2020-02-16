@extends('attendance.layouts.master')

@section('title')
Attendance Information System
@endsection

@section('sidebar')
	@include('attendance.partials.sidebar')
@endsection

@section('header')
	@include('partials.header')
@endsection

@section('content')
<style>
    
    #bootstrap-data-table th{vertical-align:top;text-align: center;}
</style>

      <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                 
                    <div class="main-card" style="width:1000px;margin:0 auto;">
                        <div class="card">
						<div class="card-header"><strong class="card-title">Process Attendance</strong></div>
                             @if(Session::has('message'))										
			<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
			    @endif
                    @if ($errors->has('employee_code'))
		     <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ $errors->first('employee_code') }}</em></div>		
                    @endif
                                                                <div class="card-body card-block">
                                
                                <form action="{{ url('attendance/process-attendance') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                   
                                    <div class="row form-group" style="width:60%;margin:0 auto;">
									
                                       
                                 
                                        <div class="col col-md-3" style="text-align: right;">
                                            <label for="text-input" class=" form-control-label">Select Month <span>(*)</span></label>
                                        </div>
                                        <div class="col-md-5">
                                                                             
						<select data-placeholder="Choose an Employee..."  class="form-control" name="month_yr" id="month_yr" >
								<option value="" selected disabled > Select </option>
											<?php 
											for($yy=2018;$yy<=2030;$yy++)
											{
												for($mm=1; $mm <= 12; $mm++)
												{ 												
													if($mm<10)
													{
														$month_yr='0'.$mm."/".$yy;
													}												
													else
													{
														$month_yr=$mm."/".$yy;														
													}
											?>
												<option value="<?php  echo $month_yr; ?>"><?php echo $month_yr; ?></option>
											<?php 
												
												}
											}
											?>
										</select>
                                        </div>
                                        
                                       
										@if ($errors->has('month_yr'))
											<div class="error" style="color:red;">{{ $errors->first('month_yr') }}</div>
										@endif	
										
									
                                                                    <div class="col-md-4">
										<button type="submit" class="btn btn-danger btn-sm">View</button>
									</div>
                                       
                                 </div>
								
                                   
                           
                                
                            
							</form>
							 
                        </div>
                       <div class="card-body">
					<div class="card-header">
									<strong class="card-title">Search Result</strong>
								</div>
								<br/>
								<form method="post" action="{{ url('attendance/save-Process-Attandance') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="srch-rslt" style="overflow-x:scroll;">
									<table id="bootstrap-data-table" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th><div class="checkbox">
												<label><input type="checkbox"  name="all" id="all" width="30px;" height="30px;">
												Select</label>
												</div></th>
												<th>Employee Code</th>
												<th>Employee Name</th>
												<th>No. of Working Days</th>
                                                                                                <th>No. of Days Leave Taken</th>
                                                                                               
												<th>No. of Absent Days</th>
                                                                                                <th>No. of Present Days</th>
												
											</tr>
										</thead>
										<tbody>
										
										
											<?php print_r($result); ?>
											
										</tbody>
                                                                                <tfoot>
                                                                                    
                                                                                    <tr>
                                                                                        <td colspan="7" style="border:none;"><button type="submit" class="btn btn-danger btn-sm">Save</button></td>
                                                                                        
                                                                                    </tr>
                                                                                </tfoot>     
									</table>
                                                                            
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