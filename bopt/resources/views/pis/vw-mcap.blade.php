@extends('layouts.master')

@section('title')
Employee Information System-Employees
@endsection

@section('sidebar')
	@include('employee.sidebar')
@endsection

@section('header')
	@include('partials.header')
@endsection


@section('content')
<style>
	.left select {
	    width: 100px;
	}
	.right{float:right;}
	.right select {
	    width: 100px;
		
	}
	.card-body.card-block span{color:#000;}
	.main-card legend {
	    color: #fff;
	    background: #1c9ac5;
	    padding: 0 15px;
	}
	.demo {
	    width: 75%;
	    margin: 15px auto;
	    background: #e2e1e1;
	    padding: 15px;
	}
	.demo .form-control{/*width:170px;*/}
	.pd-0{padding:0;}
	.sal {
	    background: #e0e0e0;
	    padding: 7px 15px 1px;
	    margin-bottom: 15px;
	}
</style>
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
	
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header"> <strong>MACP</strong> </div>
            	@if(Session::has('message'))										
				<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em ><i class="fa fa-check"></i> {{ Session::get('message') }}</em></div>
				@endif
            <div class="card-body card-block">
              <form action="{{url('macp')}}"  method="post">
                  {{ csrf_field() }}
				
				<div class="row form-group demo">
				  	<div class="col-sm-12">
						<label>Employee Name</label>
						<div class="empnamediv">                            
		                    <select id="emp_code" name="emp_code" onchange="getEmpId(this.value);" class="form-control employee">
		                        <option selected disabled value="">Select</option>
		                        @foreach($employees as $employee)
		                        	<option value="{{$employee->emp_code}}">{{($employee->emp_fname . ' '. $employee->emp_mname.' '.$employee->emp_lname)}} - {{$employee->emp_code}}</option>
		                        @endforeach
							</select>	
						</div>
					</div>
				</div>


				<div class="row form-group">
					<div class="col-md-12">
					<legend>Current Employee Paystructure</legend>
					</div>
                  
				  <!--<div class="col-md-3">
				  	<label for="text-input" class=" form-control-label">Employee Name</span></label>                                       
                    <input type="text" id="emp_name" readonly="" name="emp_name" class="form-control">
				  </div>-->
				  <input type="hidden" id="emp_name" name="emp_name" value="" class="form-control">
                  <div class="col-md-3">
                   <label>Current Department</label>
                        <input type="text"  readonly id="current_emp_dept" name="current_emp_dept" class="form-control">
                  </div>
                   <div class="col-md-3">
						
                    <label class=" form-control-label">Current Designation</label>
                    <input type="text" id="current_emp_designation" readonly="" name="current_emp_designation" class="form-control">	
					</div>

					<div class="col-md-3">
						<label>Current Pay In The Pay Level</label>
                        <input type="text" id="current_payscale" name="current_payscale" class="form-control" value="" readonly>
                    </div>

					<div class="col-md-3">
						<label>Current Basic Pay</label>
                        <input type="text"  readonly id="current_emp_basic_pay" name="current_emp_basic_pay" class="form-control">	
					</div>  
                </div>		
				<div class="row form-group">
					<div class="col-md-12">
					<legend>Present Employee Paystructure</legend>
					</div>
                  
                  

					<div class="col-md-4">
						<label>Present Pay In The Pay Level <span>(*)</span> </label>
                       <select class="form-control" name="present_emp_payscale" id="present_emp_payscale" onchange="setbasicpay()" required>
						<option value="" label="Select">Select</option>
						<?php foreach($payscale_master as $payscale){ ?>
							<option value="<?php echo $payscale->id;?>"><?php echo $payscale->payscale_code;  ?></option>
						<?php } ?>				
						</select>	
					</div>

					<div class="col-md-4">
						<label>Present Basic Pay</label>
                        <select class="form-control" name="present_emp_basic_pay" id="present_emp_basic_pay" required>
                   		</select>	
					</div>

					<div class="col-md-4">
						<label>Date of Promotion</label>
                        <input type="date" name="date_of_promotion" value="" class="form-control">	
					</div>    
                </div>
				

					
			
                <button type="submit" class="btn btn-danger btn-sm">Update</button>
                
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
@endsection
	
	

    
  <script type="text/javascript">
  	



function getEmpId(empid){

        var month_yr=$("#month_yr").val(); 
        var d = new Date(month_yr);
        var currentMonth=(d.getMonth()-1);
        var monthCount = currentMonth.toString().length;
        
        var current_month_days= new Date(d.getFullYear(), (d.getMonth()+1), 0).getDate();

        if(monthCount=1){
        	var monthYR='0'+(d.getMonth()-1)+'/'+d.getFullYear();

        }else{

        	var monthYR=(d.getMonth()-1)+'/'+d.getFullYear();
        }
       
		$.ajax({
		type:'GET',
		url:'{{url('pis/get-employee-all-details')}}/'+empid+'/'+monthYR,
        cache: false,
		success: function(response){
			
	        var obj = jQuery.parseJSON( response );      
	        $("#emp_code option:selected").val(empid);       
			$("#emp_name").val(obj[0].emp_fname+' '+obj[0].emp_mname+' '+obj[0].emp_lname);
			$("#current_emp_designation").val(obj[0].emp_designation);
			$("#current_emp_dept").val(obj[0].emp_department);
			$("#current_payscale").val(obj[0].emp_pay_scale);		
			$('#current_emp_basic_pay').val(obj[0].basic_pay);
	   		
	    }	
	});
}


function setbasicpay(){
	var emp_payscale_id = $("#present_emp_payscale option:selected" ).val();
			
	$.ajax({
		type:'GET',
		url:'{{url('attendance/get-employee-scale')}}/'+emp_payscale_id,				
		success: function(response){
			if(response.length>0){
				var option = '';
			for (var i=0;i<response.length;i++){
			   option += '<option value="'+ response[i].pay_scale_basic + '">' + response[i].pay_scale_basic + '</option>';
			}
			$('#present_emp_basic_pay').html(option);

			}	
				        	
		}
	});
}

</script>  
<script src="{{ asset('js/monthpicker.min.js') }}"></script>
<script>
//$('.demo-1').Monthpicker();
</script>
	

