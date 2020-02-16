@extends('layouts.master')

@section('title')
Payroll Information System-Duty Roaster
@endsection

@section('sidebar')
	@include('attendance.partials.sidebar')
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
						<div class="card-header"><strong class="card-title">Duty Roster</strong></div>
						@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif
                            
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                   
								   
									<div class="row form-group">
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Company Name <span>(*)</span></label>
										  <select class="form-control" name="company_id" onchange="getGrades(this.value);">
											<option value="" label="Select"></option>
											@foreach($company_rs as $company)
											<option value="{{ $company->id }}">{{ $company->company_name }}</option>
											@endforeach
										</select>
										@if ($errors->has('company_id'))
											<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
										@endif
									</div>
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Grade <span>(*)</span></label>
										  <select data-placeholder="Choose a Grade..." class="form-control" id="grade_id" name="grade_id">
											<option value="" selected disabled label="Select"></option>
											
											
										</select>
										@if ($errors->has('grade_id'))
											<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
										@endif
									</div>
									
									<div class="col col-md-4"><label for="text-input" class=" form-control-label">Employee ID</label>
										<input type="text" id="employee_id" name="employee_code" class="form-control"></div>
									</div>
									
                                    
								
									
									
                             
                                <button type="submit" class="btn btn-danger btn-sm">View Schedule</button>
                                
                           
							</form>
							</div>
							 
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <strong>Shift Schedule</strong>
                            </div>
							<div class="aply-lv">
								<a href="{{ url('attendance/add-duty-roaster-emp-wise') }}" class="btn btn-default">Add Duty Roaster (Employee wise) <i class="fa fa-plus"></i></a> <a href="{{ url('attendance/add-duty-roaster') }}" class="btn btn-default">Add Duty Roaster (Grade wise) <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body card-block">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Company Name</th>
											<th>Grade Name</th>
											<th>Employee Code</th>
											<th>Shift Code</th>
                                            <th>Shift IN Time</th>
                                            <th>Recess From</th>
                                            <th>Recess To</th>
											<th>Shift OUT Time</th>
											<th>Action</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--<tr>
                                            <td>SHIFT-7-1</td>
                                            <td>09:25</td>
                                            <td>13:15</td>
											<td>13:30</td>
											<td>07:25</td>
											<td><a href="#"><i class="ti-pencil-alt"></i></i>&nbsp;&nbsp;<a href="#"><i class="ti-trash"></i></a></td>
											
                                        </tr>-->
                                        <?php print_r($result); ?>
                                    </tbody>
                                </table>
							 
                        </div>
                        
                    </div>
                    </div>
                      

					<!--<div class="card-body">
					
							<div class="card-header">
									<strong class="card-title">Search Results</strong>
								</div>
								<br/>
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Select All</th>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Valid From</th>
											<th>SHIFT-7-1</th>
											<th>SHIFT-7-2</th>
											<th>SHIFT-7-3</th>
											<th>SHIFT-7-4</th>
											<th>SHIFT-7-5</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
                                            <td>12589</td>
                                            <td>Dibyendu Roy</td>
											<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
											<td><label><input type="checkbox" value=""></label></td>
											<td><label><input type="checkbox" value=""></label></td>
											<td><label><input type="checkbox" value=""></label></td>
											<td><label><input type="checkbox" value=""></label></td>
											<td><label><input type="checkbox" value=""></label></td>
											
                                        </tr>
                                        
                                    </tbody>
                                </table>
								</div>-->


					  
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
@endsection