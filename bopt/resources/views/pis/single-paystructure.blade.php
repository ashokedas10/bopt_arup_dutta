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
            <div class="card-header"> <strong>Employee Pay Structure Generation</strong> </div>
            	@if(Session::has('message'))
				<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em ><i class="fa fa-check"></i> {{ Session::get('message') }}</em></div>
				@endif
            <div class="card-body card-block">
              <form action=""  method="post">
                  {{ csrf_field() }}

				<div class="row form-group demo">
				  	<div class="col-sm-12">
						<label>Employee Name</label>
						<div class="empnamediv">
		                    <select id="emp_code" name="emp_code" onchange="getEmpId(this.value);" class="form-control employee">
		                        <option selected disabled value="">Select</option>
		                        @foreach($employee as $emp)
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
				<div class="col-md-12">
					<legend>Calculate Earning Part</legend>
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
						<label>Special Allowance</label>
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




				<div class="sal">
				<div class="row form-group">
					<div class="col-md-4">
						<label>Gross Salary</label>
                        <input type="text" id="emp_gross_salary" name="emp_gross_salary" class="form-control" readonly="1">
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
@endsection




  <script type="text/javascript">

var transport_allowance=0;
var cess=0;


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
	        //console.log(obj[0].emp_physical_status);
		    var basicpay=obj[0].basic_pay;

		    var calculate_basic_salary=0;

			var pro_tax=0;
			var DA_bal=0;
			var HRA_bal=0;
			var DA_on_TA_bal=0;
			var ta_bal=0;
			var TA_bal=0;
			var ta_bal =0;
			var LTC_bal=0;
			var CEA_bal=0;
			var TRA_bal=0;
			var DLA_bal=0;
			var ADV_bal=0;
			var ADJ_bal=0;
			var MR_bal=0;
			var tot_nps=0;
			var gsval=0;
			var SA_bal=0;



	        $("#emp_code option:selected").val(empid);
			$("#emp_name").val(obj[0].emp_fname+' '+obj[0].emp_mname+' '+obj[0].emp_lname);
			$("#emp_designation").val(obj[0].emp_designation);

			$("#emp_da").val(obj[0].da);
			$("#emp_hra").val(obj[0].hra);
			$("#emp_daily_allowance").val(obj[0].daily_allowance);
			$("#emp_advance").val(obj[0].advance);
			$("#emp_adjustment").val(obj[0].adjustment_advance);
			$("#emp_medical").val(obj[0].medical_reimbursement);

			$("#emp_basic_pay").val(basicpay);

			var basic = $('#emp_basic_pay').val();

			for (var j = 0; j < obj[3].length; j++)
			{

			    if(obj[3][j].head_name==='DA')
			    {

			      if(obj[0].da=='1')
			      {
			        DA_bal=Math.round(basic*obj[3][j].inpercentage/100);
			        $("#emp_da").val(DA_bal);
			      }
			      else
			      {

			        $("#emp_da").val(0);
			      }

			    }

				if(obj[3][j].head_name==='HRA')
				{

				    if(obj[0].hra=='1')
				    {
				        HRA_bal=Math.round(basic*obj[3][j].inpercentage/100);
				        if(HRA_bal<=5400){
				        	HRA_bal='5400';
				        	$("#emp_hra").val(HRA_bal);
				        }else{
				        	$("#emp_hra").val(HRA_bal);
				        }

				    }else
				    {

				        $("#emp_hra").val(HRA_bal);
				    }
				}



			    if(obj[3][j].head_name==='TA')
			    {

				    if(obj[0].trans_allowance=='1')
				    {

				        if((basic<=obj[3][j].max_basic) && (basic>=obj[3][j].min_basic)){
					         if(obj[0].emp_physical_status=='yes'){
					         	TA_bal=parseInt(obj[3][j].inrupees)*2;
					         }else{
					         	TA_bal=obj[3][j].inrupees;
					         }

				          $("#emp_transport_allowance").val(TA_bal);
				          DA_on_TA_bal=parseInt(TA_bal)*17/100;
				          $("#emp_da_on_ta").val(DA_on_TA_bal);

				        }

				    }else{

			            $("#emp_transport_allowance").val(TA_bal);
			            $("#emp_da_on_ta").val(DA_on_TA_bal);
				    }

			    }

			    /*if(obj[3][j].head_name==='DA_ON_TA')
			    {
			    	if(obj[0].da_on_ta=='1')
				    {
				        DA_on_TA_bal=parseInt(transport_allowance)*9/100;
				        $("#emp_da_on_ta").val(DA_on_TA_bal);
				    }else{

				     	 $("#emp_da_on_ta").attr("readonly", true);
				     	 $("#emp_da_on_ta").val(0);
				    }
			    }*/



			    if(obj[3][j].head_name==='LTC')
			    {

				    if(obj[0].ltc=='1')
				     {
				        $("#emp_ltc").val(LTC_bal);
				     }else{

				     	 //LTC_bal=basic*obj[2][j].inpercentage/100;
				     	 $("#emp_ltc").attr("readonly", true);
				     	 $("#emp_ltc").val(LTC_bal);
				     }
			    }

			    if(obj[3][j].head_name==='CEA')
			    {
				    if(obj[0].cea=='1')
				    {
				         //CEA_bal=basic*obj[2][j].inpercentage/100;
				        $("#emp_cea").val(CEA_bal);
				    }else{
				          $("#emp_cea").attr("readonly", true);
				          $("#emp_cea").val(CEA_bal);
				    }
			    }

			    if(obj[3][j].head_name==='TR_A')
			    {
			        if(obj[0].travelling_allowance=='1')
			        {
			           //TRA_bal=basic*obj[2][j].inpercentage/100;
			           $("#emp_travelling_allowance").val(TRA_bal);
			        }else{
			            $("#emp_travelling_allowance").attr("readonly", true);
			         	$("#emp_travelling_allowance").val(TRA_bal);
			        }
			    }

			    if(obj[3][j].head_name==='DLA')
			    {

			     	if(obj[0].daily_allowance=='1')
				    {
				        //DLA_bal=basic*obj[2][j].inpercentage/100;
				        $("#emp_daily_allowance").val(DLA_bal);
				    }else{
				        $("#emp_daily_allowance").attr("readonly", true);
				        $("#emp_daily_allowance").val(DLA_bal);
				    }

			    }

			    if(obj[3][j].head_name==='ADV')
			    {

				    if(obj[0].advance=='1')
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

			    if(obj[3][j].head_name==='ADJ_ADV')
			    {

				    if(obj[0].adjustment_advance=='1')
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

			    if(obj[3][j].head_name==='MR')
			    {

				    if(obj[0].medical_reimbursement=='1')
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

			    if(obj[3][j].head_name==='SA')
			    {

				    if(obj[0].spcl_allowance=='1')
				    {
				        $("#emp_spcl_allowance").val(SA_bal);
				    }
				    else
				    {
				        $("#emp_spcl_allowance").attr("readonly", true);
				        $("#emp_spcl_allowance").val(SA_bal);
				    }
			    }

			    if(obj[3][j].head_name==='CHA')
			    {
			      	var CHA_bal=0;
				    if(obj[0].cash_handling_allowance=='1')
				    {
				        $("#cash_handling_allowance").val(CHA_bal);
				    }
				    else
				    {
				        $("#cash_handling_allowance").attr("readonly", true);
				        $("#cash_handling_allowance").val(CHA_bal);
				    }
			    }




			    if(obj[3][j].head_name==='NPS')
			    {

			      if(obj[0].nps=='1')
			      {
			         var nps=Math.round(parseInt(basic) + parseInt(DA_bal));
			         var tot_nps=Math.round((nps*obj[3][j].inpercentage)/100);
			         $("#emp_nps").val(tot_nps);
			      }
			      else
			      {

			        $("#emp_nps").val(tot_nps);
			      }
			    }

			    if(obj[3][j].head_name==='GSLI')
			    {

			        if(obj[0].gsli=='1')
			      {
			          gsval=obj[3][j].inrupees;
			          $("#emp_gslt").val(gsval);
			      }
			      else{

			          $("#emp_gslt").val(gsval);
			      }
			    }

                if(obj[3][j].head_name==='CESS')
			    {
			      cess=obj[3][j].inpercentage;
			    }

			}

			ta_bal= $("#emp_transport_allowance").val();
			
			var gross_salary=Math.round(parseInt(basic) + parseInt(DA_bal) + parseInt(HRA_bal) + parseInt(DA_on_TA_bal)+parseInt(ta_bal)+parseInt(LTC_bal)+parseInt(CEA_bal) + parseInt(TRA_bal)+parseInt(DLA_bal)+parseInt(ADV_bal)+parseInt(ADJ_bal)+parseInt(MR_bal));
			$("#emp_gross_salary").val(gross_salary);

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
    var emp_cash_handling_allowance= $('#cash_handling_allowance').val();
    var emp_spcl_allowance= $('#emp_spcl_allowance').val();

    $('#emp_gross_salary').val('');

    //Total Addition
    var total_gross_on_blur=(parseInt(basic_pay)+parseInt(emp_da) + parseInt(emp_hra)+ parseInt(emp_da_on_ta) + parseInt(emp_transport_allowance) + parseInt(emp_ltc) + parseInt(emp_cea)+ parseInt(emp_travelling_allowance) +parseInt(emp_daily_allowance)+ parseInt(emp_advance)+ parseInt(emp_adjustment)+parseInt(emp_medical)+parseInt(other_addition) +parseInt(emp_cash_handling_allowance) +parseInt(emp_spcl_allowance));
    $('#emp_gross_salary').val(total_gross_on_blur);

}


</script>
<script src="{{ asset('js/monthpicker.min.js') }}"></script>
<script>
//$('.demo-1').Monthpicker();
</script>


