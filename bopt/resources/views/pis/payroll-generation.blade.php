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
    width: 37%;
    margin: 15px auto;
    background: #e2e1e1;
    padding: 15px;
}
.demo .form-control{width:170px;}
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
            <div class="card-header"> <strong>Employee Payslip Generation</strong> </div>
            <div class="card-body card-block">
              <form action=""  method="post">
                  {{ csrf_field() }}
			  <div class="mon" style="float:right;">
			  <label>Month</label>
			  <div class="input-group mb-3">
			  <input id="demo-1" type="text" placeholder="Mar 2019"/>
			   <div class="input-group-append">
			  <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
			  </div>
			  </div>
			  </div>
			  <div class="row form-group demo">
			  	<div class="col-md-4">
					<label>Employee Id</label>
				</div>
				  <div class="col-md-8 pd-0">                            
                                      <select id="emp_id" onchange="getEmpID(this.value);" class="form-control employee">
                                            <option selected disabled value="">Select</option>
                                            @foreach($Employee as $emp)
                                            <option value="{{$emp->emp_code}}">{{$emp->emp_code}}</option>
                                            @endforeach
					</select>	
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
                                                <input type="text" name="emp_cml" readonly name="emp_cml" class="form-control">
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
				</div>
				
				<div class="row form-group">
				<div class="col-md-12">
					<legend>Calculate Addition Part</legend>
				</div>
					<div class="col-md-3">
						<label>Dearness Allowance</label>
                                                <input onblur="OnblurCalculateAddition();" type="text" id="emp_da" name="emp_da" class="form-control">
					</div>
					<div class="col-md-3">
						<label>HRA</label>
                                                <input  onblur="OnblurCalculateAddition();"  type="text" id="emp_hra" name="emp_hra" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Transport Allowance</label>
                                                <input  onblur="OnblurCalculateAddition();"  type="text" id="emp_transport_allowance" name="emp_transport_allowance" class="form-control">
					</div>
					<div class="col-md-3">
						<label>D.A. on T.A.</label>
                                                <input  onblur="OnblurCalculateAddition();"  type="text"  id="emp_da_on_ta" name="emp_da_on_ta" class="form-control">
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
                                                <input onblur="OnBlurCalculateSubtraction();" name="emp_gpf" id="emp_gpf" type="text" class="form-control">
					</div>
					<div class="col-md-3">
						<label>NPS</label>
                                                <input onblur="OnBlurCalculateSubtraction();" name="emp_nps" id="emp_nps" type="text" class="form-control">
					</div>
					<div class="col-md-3">
						<label>CPF</label>
                                                <input onblur="OnBlurCalculateSubtraction();" name="emp_cpf" id="emp_cpf" type="text" class="form-control">
					</div>
					<div class="col-md-3">
						<label>GSLI</label>
                                                <input onblur="OnBlurCalculateSubtraction();" name="emp_gslt" id="emp_gslt" type="text" class="form-control">
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-md-3">
						<label>Income Tax</label>
                                                <input onblur="OnBlurCalculateSubtraction();" type="text" name="emp_income_tax" id="emp_income_tax" class="form-control">
					</div>
					<div class="col-md-3">
						<label>Professional Tax</label>
                                                <input onblur="OnBlurCalculateSubtraction();" type="text" id="emp_pro_tax" name="emp_pro_tax" class="form-control">
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
                                                <input type="text" id="emp_gross_salary" name="emp_gross_salary" class="form-control">
					</div>
					<div class="col-md-4">
						<label>Total Deductions</label>
                                                <input type="text" id="emp_total_deduction" name="emp_total_deduction" class="form-control">
					</div>
					<div class="col-md-4">
						<label>Net Salary</label>
                                                <input  name="emp_net_salary" id="emp_net_salary" type="text" class="form-control">
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

  function getEmpID(empid){
// emp_present_days/emp_absent_days/emp_cl/emp_el/emp_hpl/emp_rh/emp_cml/emp_eol
//emp_lnd/emp_maternity_leave/emp_ccl/emp_paternity_leave/emp_da/emp_hra
//emp_transport_allowance/emp_da_on_ta/emp_ltc/emp_cea/emp_travelling_allowance
// emp_daily_allowance/emp_advance/emp_adjustment/emp_medical/emp_others1/emp_gpf/
// emp_nps/emp_cpf/emp_gslt/emp_income_tax/emp_pro_tax/emp_others2/emp_gross_salary
//  emp_total_deduction/emp_net_salary  
//   
		$.ajax({
			type:'GET',
			url:'{{url('pis/get-employee-all-details')}}/'+empid,
                        cache: false,
			success: function(response){
			
                      var obj = jQuery.parseJSON( response );
                    
                 
               
$("#emp_name").val(obj[0][0].emp_fname+' '+obj[0][0].emp_mname+' '+obj[0][0].emp_lname);
$("#emp_designation").val(obj[0][0].emp_designation);	
$("#emp_basic_pay").val(obj[0][0].basic_pay);
$("#emp_working_days").val(obj[0][0].no_of_working_days);
$("#emp_present_days").val(obj[0][0].no_of_present);
$("#emp_absent_days").val(obj[0][0].no_of_days_absent);
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
//$("#emp_others2").val(obj[0][0].da); 
//$("#emp_gross_salary").val(obj[0][0].da); 
//$("#emp_total_deduction").val(obj[0][0].da); 
//$("#emp_net_salary").val(obj[0][0].da); 

   //alert(obj[1].length);
   
    $("#emp_cl").val('0');
 $("#emp_el").val('0');
  $("#emp_hpl").val('0');
  $("#emp_rh").val('0');
    $("#emp_cml").val('0');
      $("#emp_eol").val('0');
     $("#emp_maternity_leave").val('0'); 
         
     $("#emp_paternity_leave").val('0'); 
       $("#emp_ccl").val('0');
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
        var no_of_leave=obj[1][i].no_of_leave;
     
        $("#emp_cml").val(no_of_leave);
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
//alert(obj[2].length);
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
      }
      else
      {
          HRA_bal=0;
          $("#emp_hra").val(HRA_bal);
      }
     
}
     if(obj[2][j].head_name==='TA')
    {
        var TA_bal=0;
        if((basic<=obj[2][j].max_basic) && (basic>=obj[2][j].min_basic)){
            TA_bal=obj[2][j].inrupees;
             $("#emp_transport_allowance").val(TA_bal);
         
        }
        if((basic<=obj[2][j].max_basic) && (basic>=obj[2][j].max_basic)){
             TA_bal=obj[2][j].inrupees;
             $("#emp_transport_allowance").val(TA_bal);
            
        }
        
        
       // alert(basic<=obj[2][j].max_basic);
    }

     if(obj[2][j].head_name==='DA_ON_TA')
    {
        var DA_on_TA_bal=0;
       if(obj[0][0].da_on_ta=='1')
       {
           var tr= $("#emp_transport_allowance").val();
          DA_on_TA_bal=Number(tr)*obj[2][j].inpercentage/100;
        $("#emp_da_on_ta").val(DA_on_TA_bal);
       }else{
            DA_on_TA_bal=0;
          $("#emp_da_on_ta").val(DA_on_TA_bal);
       }
     
    }
   
//    if(obj[2][j].head_name==='TA')
//    {
//       var TA_bal=0;
//       if(obj[0][0].trans_allowance=='1')
//       {
//            var TA_bal=basic*obj[2][j].inpercentage/100;
//        $("#emp_transport_allowance").val(TA_bal);
//       }
//       else
//       {
//           TA_bal=0;
//            $("#emp_transport_allowance").val(TA_bal);
//       }
//     
//    }
    

    if(obj[2][j].head_name==='LTC')
    {
      
           var LTC_bal=0;
     if(obj[0][0].ltc=='1')
     {
           LTC_bal=basic*obj[2][j].inpercentage/100;
        $("#emp_ltc").val(LTC_bal);
     }
     else
     {
         LTC_bal=0;
         $("#emp_ltc").val(LTC_bal);
     }
     
    }
  
    if(obj[2][j].head_name==='CEA')
    {
     var CEA_bal=0;
     if(obj[0][0].cea=='1')
     {
         CEA_bal=basic*obj[2][j].inpercentage/100;
        $("#emp_cea").val(CEA_bal);
     }
    else
    {
           CEA_bal=0; 
          $("#emp_cea").val(CEA_bal);
    }
     
    }
  
      if(obj[2][j].head_name==='TR_A')
    {
        var TRA_bal=0;
        if(obj[0][0].travelling_allowance=='1')
        {
           TRA_bal=basic*obj[2][j].inpercentage/100;
        $("#emp_travelling_allowance").val(TRA_bal);
        }else{
            TRA_bal=0;
        $("#emp_travelling_allowance").val(TRA_bal);
        }
     
    }
    
    if(obj[2][j].head_name==='DLA')
    {
       var DLA_bal=0;
     if(obj[0][0].daily_allowance=='1')
    {
          DLA_bal=basic*obj[2][j].inpercentage/100;
        $("#emp_daily_allowance").val(DLA_bal);
    }
    else
    {
         DLA_bal=0;
         $("#emp_daily_allowance").val(DLA_bal);
    }
    
    }
    
     if(obj[2][j].head_name==='ADV')
    {
          var ADV_bal=0;
     if(obj[0][0].advance=='1')
    {
        ADV_bal=basic*obj[2][j].inpercentage/100;
        $("#emp_advance").val(ADV_bal);
    }
    else
    {
        ADV_bal=0;
         $("#emp_advance").val(ADV_bal);
    }
    }
    
      if(obj[2][j].head_name==='ADJ_ADV')
    {
       var ADJ_bal=0;
    if(obj[0][0].adjustment_advance=='1')
    {
          ADJ_bal=basic*obj[2][j].inpercentage/100;
          $("#emp_adjustment").val(ADJ_bal);
    }
    else
    {
         ADJ_bal=0;
         $("#emp_adjustment").val(ADJ_bal);
    }
    
    }
   
    if(obj[2][j].head_name==='MR')
    {
      var MR_bal=0; 
     if(obj[0][0].medical_reimbursement=='1')
    {
         MR_bal=basic*obj[2][j].inpercentage/100;
        $("#emp_medical").val(MR_bal);
    }
    else
    {
        MR_bal=0;
         $("#emp_medical").val(MR_bal);
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
            var nps=Number(basic) + Number(DA_bal);
         tot_nps=nps*10/100;
      $("#emp_nps").val(tot_nps);
      }
      else
      {
          tot_nps=0;
          $("#emp_nps").val(tot_nps);
      }
    }
}

       // gpf/nps/cpf/income_tax/	others
       
  // alert(obj[0][0].gpf);
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
var total_deduction=Number(tot_nps) + Number(pro_tax);
 $("#emp_total_deduction").val(total_deduction);
 //DA_bal/HRA_bal/DA_on_TA_bal/TA_bal/LTC_bal/CEA_bal/TRA_bal/DLA_bal/ADV_bal/ADJ_bal/MR_bal

var gross_salary=Number(basic) + Number(DA_bal) + Number(HRA_bal) + Number(DA_on_TA_bal)+Number(TA_bal)+Number(LTC_bal)+Number(CEA_bal) + Number(TRA_bal)+Number(DLA_bal)+Number(ADV_bal)+Number(ADJ_bal)+Number(MR_bal);

   $("#emp_gross_salary").val(gross_salary);
  var net_salary = (parseInt(gross_salary) - parseInt(total_deduction)).toFixed(2); 

 // alert(total_deduction+' =====  '+gross_salary);
   $("#emp_net_salary").val(net_salary);
   
    }
    
			
});
}

//emp_present_days/emp_absent_days/emp_cl/emp_el/emp_hpl/emp_rh/emp_cml/emp_eol
//emp_lnd/emp_maternity_leave/emp_ccl/emp_paternity_leave/emp_da/emp_hra
//emp_transport_allowance/emp_da_on_ta/emp_ltc/emp_cea/emp_travelling_allowance
// emp_daily_allowance/emp_advance/emp_adjustment/emp_medical/emp_others1/emp_gpf/
// emp_nps/emp_cpf/emp_gslt/emp_income_tax/emp_pro_tax/emp_others2/emp_gross_salary
//  emp_total_deduction/emp_net_salary  
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
            

     $("#emp_total_deduction").val('');
     $('#emp_gross_salary').val('');
 
    //Total Addition
    var total_gross_on_blur=Number(basic_pay)+Number(emp_da) + Number(emp_hra)+ Number(emp_da_on_ta) + Number(emp_transport_allowance) + Number(emp_ltc) + Number(emp_cea)+ Number(emp_travelling_allowance) +Number(emp_daily_allowance)+ Number(emp_advance)+ Number(emp_adjustment)+Number(emp_medical)+Number(other_addition);
    $('#emp_gross_salary').val(total_gross_on_blur);
     
 

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
    
    var total_deduction=Number(emp_gpf)+Number(emp_nps) + Number(emp_cpf)+Number(emp_gslt)+Number(emp_income_tax)+Number(emp_pro_tax)+Number(other_deduction);
    $("#emp_total_deduction").val(total_deduction);
     var Gross_Sal= $('#emp_gross_salary').val();
     var Tot_deduction= $("#emp_total_deduction").val();
        var netsal=Number(Gross_Sal)-Number(Tot_deduction);
         $('#emp_net_salary').val('');
         $('#emp_net_salary').val(netsal);
}


</script>  
    
   <script> 
    
    
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
$('#demo-1').Monthpicker();
$('#startDate').Monthpicker({
        onSelect: function () {
            $('#endDate').Monthpicker('option', { minValue: $('#startDate').val() });
        }
    });
    $('#endDate').Monthpicker({
        onSelect: function () {
            $('#startDate').Monthpicker('option', { maxValue: $('#endDate').val() });
        }
    });
</script>
	
@endsection
