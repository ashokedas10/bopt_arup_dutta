@extends('attendance.layouts.master')

@section('title')
Leave Allocation
@endsection

@section('sidebar')
    @include('leavemanagement.sidebar')
@endsection

@section('header')
	@include('attendance.partials.header')
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
										<strong class="card-title">Leave Allocation</strong>
									</div>
									@if(Session::has('message'))										
									<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
									@endif
								<div class="card-body card-block">
									<form action="{{ url('leave-management/get-leave-allocation') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										
										
										<div class="row form-group">
											<div class="col-md-6">
											<label class="form-control-label">Employee Code <span>(*)</span> </label>
											<select id="employee_code" name="employee_code" class="form-control employee" required>
						                       <option selected disabled value="">Select</option>
						                        @foreach($employees as $emp)
						                        	<option value="{{$emp->emp_code}}">{{($emp->emp_fname . ' '. $emp->emp_mname.' '.$emp->emp_lname)}} - {{$emp->emp_code}}</option>
						                        @endforeach
											</select>	
												@if ($errors->has('employee_code'))
												<div class="error" style="color:red;">{{ $errors->first('employee_code') }}
												</div>
											    @endif
											</div>
										</div>



											
									<button type="submit" class="btn btn-danger btn-sm">Go</button>
									
									
									</form>
										</div>
										
										</div>
                                    
							<div class="card">
								<div class="card-header"> <strong class="card-title">Leave Allocation</strong> </div>
								<!--<div class="aply-lv"><a href="add-new-leave-allocation.php" class="btn btn-default">Add New Leave Allocation <i class="fa fa-plus"></i></a></div>-->
								<br/>
								<div class="clear-fix">
								<form method="post" action="{{ url('leave-management/save-leave-allocation') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								  <table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
											<th><div class="checkbox">
											<label><input type="checkbox"  name="all" id="all" width="30px;" height="30px;">
											Select</label></th>
											<th>Employee Code</th>
											<th>Employee Name</th>
											<th>Leave Name</th>
											<th>Maximum No.</th>
											<th>Opening Balance</th>
											<th>Leave in Hand</th>
											<th>Month/Year</th>
											<!--<th>Action</th>-->
									  </tr>
									</thead>
									<tbody>
									  
									<?php print_r($result); ?>
									
									</tbody>
									
									<tfoot>
									 <tr>
										<td colspan="3" style="border:none;"></td>
										<td colspan="4" style="text-align:right;border:none;"><button type="submit" class="btn btn-danger btn-sm">Save</button>
										
									  </tr>
									  </tfoot>
								  </table>
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
		
		
//		$('#check_all').click(function() {
//			
//			$(':checkbox').each(function() {
//					this.checked = true;                        
//				});
//		});
		
		
	</script>
	
	
@endsection