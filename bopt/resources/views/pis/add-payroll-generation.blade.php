@extends('layouts.master')

@section('title')
Payroll Information System-Payroll Generation
@endsection

@section('sidebar')
	@include('partials.sidebar')
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
            <div class="card-header"> <strong>Employee Payroll Generation</strong> </div>
            <div class="card-body card-block">
              <form action=""  method="post">
                  {{ csrf_field() }}
				<div class="mon" style="float:right;">
				  	<label>Month</label>
				  	<div class="input-group mb-3">
					<input class="demo-1" id="month_yr" type="text" value="<?php $dt=date('Y-m-d'); $yrdata= strtotime($dt); echo date('M Y', $yrdata); ?>" name="month_yr" placeholder="<?php $dt=date('Y-m-d'); $yrdata= strtotime($dt); echo date('M Y', $yrdata); ?>" readonly="1"/>

					   	<div class="input-group-append">
					  		<span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
					  	</div>
				  	</div>
				</div>
				<div class="row form-group demo">
				  	<div class="col-sm-12">
						<label>Employee Name</label>
						<div class="empnamediv">                            
		                    <select id="empname" name="empname" onchange="getEmpName(this.value);" class="form-control employee">
		                        <option selected disabled value="">Select</option>
		                        @foreach($Employee as $emp)
		                        	<option value="{{$emp->emp_code}}">{{($emp->emp_fname . ' '. $emp->emp_mname.' '.$emp->emp_lname)}} - {{$emp->emp_code}}</option>
		                        @endforeach
							</select>	
						</div>
					</div>
				
				</div>
				<div class="row form-group">
                  
				  <div class="col-md-4">
				  	<label for="text-input" class=" form-control-label">Employee Name</span></label>                                       
                    <input type="text" id="emp_name" readonly="" name="emp_name" class="form-control">
				  </div>
                  <div class="col-md-4">
                    <label class=" form-control-label">Designation</label>
                    <input type="text" id="emp_designation" readonly="" name="emp_designation" class="form-control">
                  </div>
                   <div class="col-md-4">
						<label>Basic Pay</label>
                          <input type="text"  readonly id="emp_basic_pay" name="emp_basic_pay" class="form-control">	
					</div> 
                </div>
				<div class="row form-group">
				<div class="col-md-4">
					<label class="form-control-label">Working Days</label>
                                        <input id="emp_working_days" readonly name="emp_working_days" type="text" class="form-control">
				</div>
				<div class="col-md-4">
					<label class="form-control-label">Present Days</label>
                                        <input type="text" name="emp_present_days" readonly id="emp_present_days" class="form-control">
				</div>

                                    
				<div class="col-md-4">
					<label class="form-control-label">Absent Days</label>
                                        <input type="text"id="emp_absent_days" readonly name="emp_absent_days" class="form-control">
				</div>
                                    <div class="col-md-4">
					<label class="form-control-label">No. of Days Salary</label>
                                        <input type="text" id="emp_no_of_days_salary" readonly name="emp_no_of_days_salary" class="form-control">
				</div>
				</div>
				     
				<div class="row form-group">
				<div class="col-md-12">
					<legend>Leave Details</legend>
				</div>
					<div class="col-md-3">
						<label>CL</label>
                                                <input type="text" name="emp_cl" readonly id="emp_cl" class="form-control">
					</div>
					<div class="col-md-3">
						<label>EL</label>
                                                <input type="text" name="emp_el" readonly id="emp_el" class="form-control">
					</div>
					<div class="col-md-3">
						<label>HPL</label>
                                                <input type="text" name="emp_hpl" readonly id="emp_hpl" class="form-control">
					</div>
					<div class="col-md-3">
						<label>RH</label>
                                                <input type="text" name="emp_rh" readonly id="emp_rh" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-3">
						<label>Commuted Medical Leave</label>
                                                <input type="text" name="emp_cml" id="emp_cml" readonly name="emp_cml" class="form-control">
					</div>
					<div class="col-md-3">
						<label>EOL</label>
                                                <input type="text" id="emp_eol" readonly name="emp_eol" class="form-control">
					</div>
					<div class="col-md-3">
						<label>LND</label>
                                                <input type="text" name="emp_lnd" readonly id="emp_lnd" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Maternity Leave</label>
                                                <input type="text" name="emp_maternity_leave" readonly id="emp_maternity_leave" class="form-control">
					</div>
				</div>
                  
				<div class="row form-group">
					<div class="col-md-3">
						<label>Paternity Leave</label>
                                                <input type="text" name="emp_paternity_leave" readonly id="emp_paternity_leave" class="form-control">
					</div>
					<div class="col-md-3">
						<label>CCL</label>
                                                <input type="text" name="emp_ccl" id="emp_ccl" readonly class="form-control">
					</div>
                                    <div class="col-md-3">
						<label>Tour Leave</label>
                                                <input type="text" name="emp_tour_leave" id="emp_tour_leave" readonly class="form-control">
					</div>
				</div>
				
				<div class="row form-group">
				<div class="col-md-12">
					<legend>Calculate Addition Part</legend>
				</div>
					<div class="col-md-3">
						<label>Dearness Allowance</label>
                        <input readonly="1" type="text" id="emp_da" name="emp_da" class="form-control">
					</div>
					<div class="col-md-3">
						<label>HRA</label>
                        <input readonly="1" type="text" id="emp_hra" name="emp_hra" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Transport Allowance</label>
                        <input  readonly="1" type="text" id="emp_transport_allowance" name="emp_transport_allowance" class="form-control">
					</div>
					<div class="col-md-3">
						<label>D.A. on T.A.</label>
                        <input  readonly="1" type="text"  id="emp_da_on_ta" name="emp_da_on_ta" class="form-control">
					</div>
				</div>
				
				<div class="row form-group">
				
					<div class="col-md-3">
						<label>LTC</label>
                       <input onblur="OnblurCalculateAddition();"  type="text" id="emp_ltc" name="emp_ltc" class="form-control">
					</div>
					<div class="col-md-3">
						<label>CEA</label>
                                                <input  onblur="OnblurCalculateAddition();" type="text" id="emp_cea" name="emp_cea" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Travelling Allowance</label>
                                                <input onblur="OnblurCalculateAddition();" type="text" name="emp_travelling_allowance" id="emp_travelling_allowance" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Daily Allowance</label>
                                                <input onblur="OnblurCalculateAddition();" type="text" id="emp_daily_allowance" name="emp_daily_allowance" class="form-control">
					</div>
				</div>
				
				<div class="row form-group">
				
					<div class="col-md-3">
						<label>Advance</label>
                                                <input onblur="OnblurCalculateAddition();" type="text" id="emp_advance" name="emp_advance" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Adjustment of Advance</label>
                        <input onblur="OnblurCalculateAddition();" type="text" id="emp_adjustment" name="emp_adjustment" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Medical Reimbursement</label>
                                                <input onblur="OnblurCalculateAddition();" name="emp_medical" id="emp_medical" type="text" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Spcial Allowance</label>
                                                <input onblur="OnblurCalculateAddition();" value="0" name="emp_spcl_allowance" id="emp_spcl_allowance" type="text" class="form-control">
					</div>
				</div>
                  <div class="row form-group">
                      <div class="col-md-3">
                        <label>Cash Handling Allowance</label>
                        <input onblur="OnblurCalculateAddition();" value="0" name="cash_handling_allowance" id="cash_handling_allowance" type="text" class="form-control">
			</div>
                      <div class="col-md-3">
						<label>Others</label>
                                                <input onblur="OnblurCalculateAddition();" value="0" name="emp_others_addition" id="emp_others_addition" type="text" class="form-control">
					</div>
                  </div>
				<div class="row form-group">
				<div class="col-md-12">
					<legend>Calculate Deduction Part</legend>
				</div>
					<div class="col-md-3">
						<label>GPF</label>
                        <input name="emp_gpf" id="emp_gpf" type="text" class="form-control" readonly="1">
					</div>
					<div class="col-md-3">
						<label>NPS</label>
                        <input name="emp_nps" id="emp_nps" type="text" class="form-control" readonly="1">
					</div>
					<div class="col-md-3">
						<label>CPF</label>
                         <input name="emp_cpf" id="emp_cpf" type="text" class="form-control" readonly="1">
					</div>
					<div class="col-md-3">
						<label>GSLI</label>
                        <input name="emp_gslt" id="emp_gslt" type="text" class="form-control" readonly="1">
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-md-3">
						<label>Professional Tax</label>
                        <input type="text" id="emp_pro_tax" name="emp_pro_tax" class="form-control" readonly="1">
					</div>
					<div class="col-md-3">
						<label>Income Tax</label>
                        <input onblur="OnBlurCalculateSubtraction();" type="text" name="emp_income_tax" id="emp_income_tax" class="form-control">
					</div>
                    <div class="col-md-3">
						<label>CESS</label>
                         <input onblur="OnBlurCalculateSubtraction();" type="text" name="emp_cess" id="emp_cess" class="form-control">
					</div>
					
					<div class="col-md-3">
						<label>Others</label>
                        <input onblur="OnBlurCalculateSubtraction();" value="0" type="text" id="emp_others_deduction"  name="emp_others2" class="form-control">
					</div>
				</div>
				
				<div class="sal">
				<div class="row form-group">
					<div class="col-md-4">
						<label>Gross Salary</label>
                        <input type="text" id="emp_gross_salary" name="emp_gross_salary" class="form-control" readonly="1">
					</div>
					<div class="col-md-4">
						<label>Total Deductions</label>
                        <input type="text" id="emp_total_deduction" name="emp_total_deduction" class="form-control" readonly="1">
					</div>
					<div class="col-md-4">
						<label>Net Salary</label>
                        <input  name="emp_net_salary" id="emp_net_salary" type="text" class="form-control" readonly="1">
					</div>
				</div>
				</div>
                <button type="submit" class="btn btn-danger btn-sm">Save</button>
                
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

	
	

    
  <script type="text/javascript">
  	function sc(empid){
  		
  		var html = '<select id="emp_id" name="emp_id" onclick="getEmpID(this.value);" class="form-control employee"><option value="">Select</option><option value="'+empid+'" selected="selected">'+empid+'<option></select>';
		$('.empiddiv').html('').html(html);
  		/*$.ajax({
			type:'GET',
			url:'{{url('pis/get-all-employee')}}',
            cache: false,
			success: function(response){

                var obj = jQuery.parseJSON( response );
                $.each( obj, function( key, value ) {  		
                	if(empid == value.emp_code){
                		var select = 'selected="selected"';
                	}else{
                		var select = '';
                	}
                	html += '<option value="'+value.emp_code+'" '+select+'> '+value.emp_code+' <option>';
				});
				html += '<option value="'+value.emp_code+'" '+select+'>'+value.emp_code+' <option>';
				html += '</select>';
				$('.empiddiv').html('').html(html);
            }
        });*/
  	}

var tr=0;

function getEmpName(empid){
		
        var month_yr=$("#month_yr").val(); 
        var d = new Date(month_yr);
        //var monthYR='0'+(d.getMonth()-1)+'/'+d.getFullYear();
        //var res = monthYR.split("/");
        var check_month=d.getMonth()-1;

        //alert(d.getMonth()+1);
        if(d.getMonth()-1>'09'){
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
		    var basicpay=obj[0][0].basic_pay;
		    var no_of_working_days=obj[0][0].no_of_working_days;
		    var totaldays_salary=(parseInt(basicpay)/ Number(no_of_working_days));
		    //var total_basic_salary=Math.round(parseInt(totaldays_salary)* Number(obj[0][0].no_of_days_salary)).toFixed(2);

		    var total_basic_salary=parseInt((basicpay / no_of_working_days) * obj[0][0].no_of_days_salary);
		   
	        $("#empname option:selected").val(empid);       
			$("#emp_name").val(obj[0][0].emp_fname+' '+obj[0][0].emp_mname+' '+obj[0][0].emp_lname);
			$("#emp_designation").val(obj[0][0].emp_designation);	
            //$("#emp_basic_pay").val(total_basic_salary);
            $("#emp_basic_pay").val(basicpay);
			$("#emp_working_days").val(obj[0][0].no_of_working_days);
			$("#emp_present_days").val(obj[0][0].no_of_present);
			$("#emp_absent_days").val(obj[0][0].no_of_days_absent);
            $("#emp_no_of_days_salary").val(obj[0][0].no_of_days_salary);
            $("#emp_tour_leave").val(obj[0][0].no_of_tour_leave);
			$("#emp_da").val(obj[0][0].da);
			$("#emp_hra").val(obj[0][0].hra);        
			$("#emp_daily_allowance").val(obj[0][0].daily_allowance);
			$("#emp_advance").val(obj[0][0].advance); 
			$("#emp_adjustment").val(obj[0][0].adjustment_advance);        
			$("#emp_medical").val(obj[0][0].medical_reimbursement);
			//$("#emp_others1").val(obj[0][0].da); 
			$("#emp_gpf").val(obj[0][0].gpf);
			$("#emp_nps").val(obj[0][0].nps); 
			$("#emp_cpf").val(obj[0][0].cpf);        
			$("#emp_gslt").val(obj[0][0].gsli);
			$("#emp_income_tax").val(obj[0][0].income_tax); 
			$("#emp_pro_tax").val(obj[0][0].professional_tax); 
                        
            //$("#emp_cess").val(obj[0][0].income_tax*cx);
			//$("#emp_others2").val(obj[0][0].da); 
			//$("#emp_gross_salary").val(obj[0][0].da); 
			//$("#emp_total_deduction").val(obj[0][0].da); 
			//$("#emp_net_salary").val(obj[0][0].da); 

			   //alert(obj[1].length);
			//var TA_bal=0;
			$("#emp_cl").val('0');
			$("#emp_el").val('0');
			$("#emp_hpl").val('0');
			$("#emp_rh").val('0');
			$("#emp_cml").val('0');
			$("#emp_eol").val('0');
			$("#emp_maternity_leave").val('0');     
			$("#emp_paternity_leave").val('0'); 
			$("#emp_ccl").val('0');
			$("#emp_lnd").val('0');
			
			   
			for (var i = 0; i < obj[1].length; i++)
			{    
			   
			    if(obj[1][i].leave_type_name=='Casual Leave')
			    {
			          var no_of_leave='0';
			        if(obj[1][i].no_of_leave!='')
			        {
			           no_of_leave=obj[1][i].no_of_leave;
			        }
			        $("#emp_cl").val(no_of_leave);
			    }
			    if(obj[1][i].leave_type_name=='Earn Leave')
			    {
			        var no_of_leave='0';
			        if(obj[1][i].no_of_leave!='')
			        {
			           no_of_leave=obj[1][i].no_of_leave;
			        }
			        $("#emp_el").val(no_of_leave);
			    }
			     if(obj[1][i].leave_type_name=='Half Pay Leave')
			    {
			        var no_of_leave=obj[1][i].no_of_leave;
			   
			        $("#emp_hpl").val(no_of_leave);
			    }
			    if(obj[1][i].leave_type_name=='Restricted Holidays')
			    {
			         var no_of_leave=obj[1][i].no_of_leave;
			     
			        $("#emp_rh").val(no_of_leave);
			    }
			    if(obj[1][i].leave_type_name=='Commuted Medical Leave')
			    {
					var no_of_leave='0';
			        if(obj[1][i].no_of_leave!='')
			        {
			           no_of_leave=obj[1][i].no_of_leave;
			        }
			        $("#emp_cml").val(no_of_leave);
			        //var no_of_leave=obj[1][i].no_of_leave;
			        //$("#emp_cml").val(no_of_leave);
			    }
			     if(obj[1][i].leave_type_name=='Extra Ordinary Leave')
			    {
			        var no_of_leave=obj[1][i].no_of_leave;
			      
			        $("#emp_eol").val(no_of_leave);
			    }
			    if(obj[1][i].leave_type_name=='Maternity Leave')
			    {
			         var no_of_leave=obj[1][i].no_of_leave;
			     
			        $("#emp_maternity_leave").val(no_of_leave);
			    }

				if(obj[1][i].leave_type_name=='LND')
			    {
			        var no_of_leave='0';
			        if(obj[1][i].no_of_leave!='')
			        {
			           no_of_leave=obj[1][i].no_of_leave;
			        }
			        $("#emp_lnd").val(no_of_leave);
			    } 
			    if(obj[1][i].leave_type_name=='Paternity Leave')
			    {
			        var no_of_leave=obj[1][i].no_of_leave;
			    
			        $("#emp_paternity_leave").val(no_of_leave);
			    } 
			    if(obj[1][i].leave_type_name=='Child Care Leave')
			    {
			        var no_of_leave=obj[1][i].no_of_leave;
			      
			        $("#emp_ccl").val(no_of_leave);
			    } 
			           // alert( obj[1][i].leave_type_name);
			    
			}


			var basic = $('#emp_basic_pay').val();
			
			var pro_tax=0;

			for (var j = 0; j < obj[2].length; j++)
			{  
			   // alert( obj[2][i].head_name);
			  
			    if(obj[2][j].head_name==='DA')
			    {
			      var DA_bal=0;
			      if(obj[0][0].da=='1')
			      {
			        DA_bal=basic*obj[2][j].inpercentage/100;
			        $("#emp_da").val(DA_bal);
			      }
			      else
			      {
			        DA_bal=0;
			        $("#emp_da").val(DA_bal);
			      }
			      
			    }

			   
			if(obj[2][j].head_name==='HRA')
			{
			    var HRA_bal=0;
			    if(obj[0][0].hra=='1')
			    {
			        HRA_bal=basic*obj[2][j].inpercentage/100;
			        $("#emp_hra").val(HRA_bal);
			    }else
			    {
			        HRA_bal=0;
			        $("#emp_hra").val(HRA_bal);
			    }  
			}

			 	
			    if(obj[2][j].head_name==='TA')
			    {
			        var  TA_bal=0;
			        var  DA_on_TA_bal=0;
				    if(obj[0][0].trans_allowance=='1')
				    {
				        if((basic<=obj[2][j].max_basic) && (basic>=obj[2][j].min_basic)){
				          TA_bal=obj[2][j].inrupees;
				         // tttt='dsfds'+Number(tttt)+Number(TA_bal);
				          $("#emp_transport_allowance").val(TA_bal);
				          DA_on_TA_bal=parseInt(TA_bal)*9/100;
				          $("#emp_da_on_ta").val(DA_on_TA_bal);
				         
				        }
				        if((basic<=obj[2][j].max_basic) && (basic>=obj[2][j].max_basic)){
				             TA_bal=obj[2][j].inrupees;
				             //tttt='sdfsd'+Number(tttt)+Number(TA_bal);
				             $("#emp_transport_allowance").val(TA_bal);
				             DA_on_TA_bal=parseInt(TA_bal)*9/100;
				             $("#emp_da_on_ta").val(DA_on_TA_bal);
				             
				        }
				        
				    }else{

			            $("#emp_transport_allowance").val(TA_bal); 
			            $("#emp_da_on_ta").val(DA_on_TA_bal);    
				    }

			    }
			    
			    
			    /*if(obj[2][j].head_name==='DA_ON_TA')
			    {
			    	
			    	DA_on_TA_bal=0;
			       if(obj[0][0].da_on_ta=='1')
			       {
			       
			        DA_on_TA_bal=parseInt(TA_bal)*obj[2][j].inpercentage/100;

			        $("#emp_da_on_ta").val(DA_on_TA_bal);
			       }else{

			        
			        $("#emp_da_on_ta").val(DA_on_TA_bal);
			       }
			    }*/
			     
			    if(obj[2][j].head_name==='LTC')
			    {
				    var LTC_bal=0;
				    if(obj[0][0].ltc=='1')
				     {
				        $("#emp_ltc").val(LTC_bal);
				     }else{

				     	 //LTC_bal=basic*obj[2][j].inpercentage/100;
				     	 $("#emp_ltc").attr("readonly", true);
				     	 $("#emp_ltc").val(LTC_bal); 
				     }
			    }
			  
			    if(obj[2][j].head_name==='CEA')
			    {
				     var CEA_bal=0;
				     if(obj[0][0].cea=='1')
				     {
				         //CEA_bal=basic*obj[2][j].inpercentage/100;
				        $("#emp_cea").val(CEA_bal);
				     }
				    else
				    {
				          $("#emp_cea").attr("readonly", true); 
				          $("#emp_cea").val(CEA_bal);
				    }
			     
			    }
			  
			    if(obj[2][j].head_name==='TR_A')
			    {
			        var TRA_bal=0;
			        if(obj[0][0].travelling_allowance=='1')
			        {
			           //TRA_bal=basic*obj[2][j].inpercentage/100;
			           $("#emp_travelling_allowance").val(TRA_bal);
			        }else{
			            $("#emp_travelling_allowance").attr("readonly", true);  
			         	$("#emp_travelling_allowance").val(TRA_bal);
			        }
			     
			    }
			    
			    if(obj[2][j].head_name==='DLA')
			    {
			       var DLA_bal=0;
			     if(obj[0][0].daily_allowance=='1')
				    {
				        //DLA_bal=basic*obj[2][j].inpercentage/100;
				        $("#emp_daily_allowance").val(DLA_bal);
				    }
				    else
				    {
				         $("#emp_daily_allowance").attr("readonly", true);  
				         $("#emp_daily_allowance").val(DLA_bal);
				    }
			    
			    }
			    
			    if(obj[2][j].head_name==='ADV')
			    {
				    var ADV_bal=0;
				    if(obj[0][0].advance=='1')
				    {
				        //ADV_bal=basic*obj[2][j].inpercentage/100;
				        $("#emp_advance").val(ADV_bal);
				    }
				    else
				    {
				        $("#emp_advance").attr("readonly", true);  
				         $("#emp_advance").val(ADV_bal);
				    }
			    }
			    
			    if(obj[2][j].head_name==='ADJ_ADV')
			    {
			       	var ADJ_bal=0;
				    if(obj[0][0].adjustment_advance=='1')
				    {
				          //ADJ_bal=basic*obj[2][j].inpercentage/100;
				          $("#emp_adjustment").val(ADJ_bal);
				    }
				    else
				    {
				         $("#emp_adjustment").attr("readonly", true);  
				         $("#emp_adjustment").val(ADJ_bal);
				    }
			    
			    }
			   
			    if(obj[2][j].head_name==='MR')
			    {
			      	var MR_bal=0; 
				    if(obj[0][0].medical_reimbursement=='1')
				    {
				         //MR_bal=basic*obj[2][j].inpercentage/100;
				        $("#emp_medical").val(MR_bal);
				    }
				    else
				    {
				        $("#emp_medical").attr("readonly", true);  
				        $("#emp_medical").val(MR_bal);
				    }
			    }

			    if(obj[2][j].head_name==='SA')
			    {
			      	var SA_bal=0; 
				    if(obj[0][0].spcl_allowance=='1')
				    {
				        $("#emp_spcl_allowance").val(SA_bal);
				    }
				    else
				    {
				        $("#emp_spcl_allowance").attr("readonly", true);  
				        $("#emp_spcl_allowance").val(SA_bal);
				    }
			    }

			    if(obj[2][j].head_name==='CHA')
			    {
			      	var CHA_bal=0; 
				    if(obj[0][0].spcl_allowance=='1')
				    {
				        $("#cash_handling_allowance").val(CHA_bal);
				    }
				    else
				    {
				        $("#cash_handling_allowance").attr("readonly", true);  
				        $("#cash_handling_allowance").val(CHA_bal);
				    }
			    }
			    
			    if(obj[2][j].head_name==='PTAX')
			    {
			        var gross_salary_ptax=Number(basic) + Number(DA_bal) + Number(HRA_bal) + Number(DA_on_TA_bal)+Number(TA_bal)+Number(LTC_bal)+Number(CEA_bal) + Number(TRA_bal)+Number(DLA_bal)+Number(ADV_bal)+Number(ADJ_bal)+Number(MR_bal);
				    if(obj[0][0].professional_tax=='1')
				    {
				        if((gross_salary_ptax<=obj[2][j].max_basic) && (gross_salary_ptax>=obj[2][j].min_basic))
				        {
				            pro_tax=obj[2][j].inrupees;
				             $("#emp_pro_tax").val(pro_tax);
				        }
				           if((gross_salary_ptax>=obj[2][j].max_basic) && (gross_salary_ptax<=obj[2][j].min_basic))
				        {
				            pro_tax=obj[2][j].inrupees;
				            $("#emp_pro_tax").val(pro_tax);
				        }
				    }
				    else
				    {
				         pro_tax=0;
				          $("#emp_pro_tax").val(pro_tax);
				    }
			    }
			    if(obj[2][j].head_name==='NPS')
			    {
			       var tot_nps=0;
			      if(obj[0][0].nps=='1')
			      {
			         var nps=Math.round(parseInt(basic) + parseInt(DA_bal));
			         tot_nps=nps*10/100;
			      $("#emp_nps").val(tot_nps);
			      }
			      else
			      {
			          tot_nps=0;
			          $("#emp_nps").val(tot_nps);
			      }
			    }
			     if(obj[2][j].head_name==='GSLI')
			    {
			        var gsval=0;
			        if(obj[0][0].gsli=='1')
			      {
			          gsval=obj[2][j].inrupees;
			          $("#emp_gslt").val(gsval);
			      } 
			      else{
			          gsval=0;
			          $("#emp_gslt").val(gsval);
			      }
			    }

                if(obj[2][j].head_name==='CESS')
			    {
			        var tot_cess=0;
			        var cess=obj[2][j].inpercentage;
			      if(obj[0][0].cess=='1')
			      {
			            var tot_cess=Number(obj[0][0].income_tax)* Number(cess)/100;
			        // tot_nps=nps*10/100;
			      $("#emp_cess").val(cess);
			      }
			      else
			      {
			          tot_cess=0;
			          $("#emp_cess").val(tot_cess);
			      }
			    }
			    
			}

			if(obj[0][0].gpf=='1')
			{
			        $("#emp_gpf").val('0');
			}
			else
			{
			       $("#emp_gpf").val('0');
			}

			if(obj[0][0].cpf=='1')
			{
			      $("#emp_cpf").val('0');
			}
			else
			{
			      $("#emp_cpf").val('0');
			}
			if(obj[0][0].income_tax=='1')
			{
			     $("#emp_income_tax").val('0');
			}
			else
			{
			     $("#emp_income_tax").val('0');
			}
			//var gs = $("#emp_gslt").val();
			var total_deduction=(parseInt(tot_nps) + parseInt(pro_tax)+parseInt(gsval));
			
			 $("#emp_total_deduction").val((total_deduction).toFixed(0));
			
			
			ta_bal= $("#emp_transport_allowance").val();
			var gross_salary=(parseInt(basic) + parseInt(DA_bal) + parseInt(HRA_bal) + parseInt(DA_on_TA_bal)+parseInt(ta_bal)+parseInt(LTC_bal)+parseInt(CEA_bal) + parseInt(TRA_bal)+parseInt(DLA_bal)+parseInt(ADV_bal)+parseInt(ADJ_bal)+parseInt(MR_bal));

			   $("#emp_gross_salary").val(gross_salary);
			  var net_salary = (parseInt(gross_salary) - parseInt(total_deduction)).toFixed(2); 

			 // alert(total_deduction+' =====  '+gross_salary);
			   $("#emp_net_salary").val(net_salary);
	   		
	    }
    
			
	});
}
 
function OnblurCalculateAddition()
{

    var basic_pay = $('#emp_basic_pay').val();
    
    //Calculate Addition Part
    var emp_da= $('#emp_da').val();
    var emp_hra= $('#emp_hra').val();
    var emp_da_on_ta= $('#emp_da_on_ta').val();
    var emp_transport_allowance= $('#emp_transport_allowance').val();
    var emp_ltc= $('#emp_ltc').val();  
    var emp_cea= $('#emp_cea').val();
    var emp_travelling_allowance= $('#emp_travelling_allowance').val();
    var emp_daily_allowance= $('#emp_daily_allowance').val();
    var emp_advance= $('#emp_advance').val();
    var emp_adjustment= $('#emp_adjustment').val();
    var emp_medical= $('#emp_medical').val();
    var other_addition=$('#emp_others_addition').val();

    $('#emp_gross_salary').val('');
 
    //Total Addition
    var total_gross_on_blur=(parseInt(basic_pay)+parseInt(emp_da) + parseInt(emp_hra)+ parseInt(emp_da_on_ta) + parseInt(emp_transport_allowance) + parseInt(emp_ltc) + parseInt(emp_cea)+ parseInt(emp_travelling_allowance) +parseInt(emp_daily_allowance)+ parseInt(emp_advance)+ parseInt(emp_adjustment)+parseInt(emp_medical)+parseInt(other_addition));
    $('#emp_gross_salary').val(total_gross_on_blur);
     
    var Tot_deduction= $("#emp_total_deduction").val();
    var netsal=(parseInt(total_gross_on_blur)-parseInt(Tot_deduction));
    $('#emp_net_salary').val(netsal);

}

function OnBlurCalculateSubtraction()
{
    //Deduction Part
    var emp_gpf= $('#emp_gpf').val();
    var emp_nps= $('#emp_nps').val();
    var emp_cpf= $('#emp_cpf').val();
    var emp_gslt= $('#emp_gslt').val();
    var emp_income_tax= $('#emp_income_tax').val();
    var emp_pro_tax= $('#emp_pro_tax').val();
    var other_deduction=$('#emp_others_deduction').val();
    
    var total_deduction=(parseInt(emp_gpf)+parseInt(emp_nps) + parseInt(emp_cpf)+parseInt(emp_gslt)+parseInt(emp_income_tax)+parseInt(emp_pro_tax)+parseInt(other_deduction));
    $("#emp_total_deduction").val(total_deduction);
     var Gross_Sal= $('#emp_gross_salary').val();
     var Tot_deduction= $("#emp_total_deduction").val();
     var netsal=(parseInt(Gross_Sal)-parseInt(Tot_deduction));
    $('#emp_net_salary').val('');
    $('#emp_net_salary').val(netsal);
}

function getEmployeeType(company_id)
	{			
		
		$.ajax({
			type:'GET',
			url:'{{url('attendance/get-employee-type')}}/'+company_id,				
			success: function(response){
			console.log(response); 
			
			$("#employee_type_id").html(response);
			
			}
			
		});
	}

</script>  
    

	
<script src="{{ asset('js/monthpicker.min.js') }}"></script>
<script>
//$('.demo-1').Monthpicker();
</script>
	
@endsection
