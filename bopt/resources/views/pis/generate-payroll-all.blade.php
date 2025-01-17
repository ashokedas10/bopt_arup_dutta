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
		#bootstrap-data-table th{vertical-align:middle;}tr.spl td {font-weight: 600;}table#bootstrap-data-table tr td {font-size: 12px;padding: 8px 10px;}
	</style>
 <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header">
              <strong>Payroll Generation for All Employee</strong>
            </div>
             
                	 @if ($errors->has('month_yr.*'))										
			<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em ><i class="fa fa-warning"></i> {{ $errors->first('month_yr.*') }}</em></div>
			@endif	
            <div class="card-body card-block">
              <form action="{{url('pis/vw-generate-payroll-all')}}" method="post" enctype="multipart/form-data" style="width:50%;margin:0 auto;padding: 18px 20px 1px;background: #ecebeb;">
              	{{ csrf_field() }}
                <div class="row form-group">
									<div class="col-md-3">
                    <label for="text-input" class=" form-control-label" style="text-align:right;">Select Month</label>
                </div>
				<div class="col-md-6">
					<select class="form-control" name="month_yr" id="month_yr">
						<?php for ($i = 1; $i <= 12; $i++) {
						if($i<=9){
                             $val0='0';
						}else{
							$val0='';
						}
										 ?> 
					<option><?php echo $val0.$i.'/'.date("Y") ?></option><?php } ?>
					
						<!--<?php for ($i = 1; $i <= 12; $i++) { ?> 
							<option><?php //echo date("m/Y", strtotime( date( 'Y-m-01' )." -$i months")) ?></option>
						<?php } ?>-->
					</select>
				</div>
								
				<div class="col-md-3">
					<button type="submit" class="btn btn-success" style="color: #fff;background-color: #0884af;border-color: #0884af;padding: 0px 8px;
					height: 32px;">Go</button>
				</div>
			</div>
			</form>
            </div>
					</div>

					<div class="card">	
						<!----------------view----------------->
					  <div class="card-header">
					 		<strong class="card-title">Payroll Generation for All Employee</strong>
					  </div>
						<div class="card-body card-block">
							<div class="payroll-table table-responsive" style="width:1020px;margin:0 auto;overflow-x:scroll;">
                             <form action="{{url('pis/save-payroll-all')}}" method="post">
                                                                {{csrf_field()}}
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
					        <thead style="text-align:center;vertical-align:middle;">
					          <tr>
					            <th rowspan="2">Sl. No.</th>
											<th rowspan="2">Employee Id</th>
											<th rowspan="2">Employee Name</th>
											<th rowspan="2">Designation</th>
											<th rowspan="2">Month</th>
											<th rowspan="2">Basic Pay</th>
											<th rowspan="2">Working Days</th>
											<th rowspan="2">Present Days</th>
											<th rowspan="2">Absent Days</th>
                                            <th rowspan="2">Salary Days</th>
											<th colspan="11" style="text-align:center;">Leave Details</th>
											<th colspan="13" style="text-align:center;">Addition</th>
											<th colspan="8" style="text-align:center;">Deduction</th>
											<th rowspan="2">Gross Salary</th>
											<th rowspan="2">Total Deductions</th>
											<th rowspan="2">Net Salary</th>
					        	</tr>
							  	<tr class="spl">
							  		<td>CL</td>
									<td>EL</td>
									<td>HPL</td>
									<td>RH</td>
									<td>Commuted Medical Leave</td>
									<td>EOL</td>
									<td>LND</td>
									<td>Maternity Leave</td>
									<td>Paternity Leave</td>
									<td>CCL</td>
                                    <td>Tour Leave</td>
									<td>Dearness Allowance</td>
									<td>HRA</td>
									<td>Transport Allowance</td>
									<td>D.A. on T.A.</td>
									<td>LTC</td>
									<td>CHA</td>
									<td>Travelling Allowance</td>
									<td>Daily Allowance</td>
									<td>Special Allowance</td>
									<td>Advance</td>
									<td>Adjustment of Advance</td>
									<td>Medical Reimbursement</td>
									<td>Others</td>
									<td>GPF</td>
									<td>NPS</td>
									<td>CPF</td>
									<td>GSLI</td>
									<td>Income Tax</td>
									<td>Cess</td>
									<td>Professional Tax</td>
									<td>Others</td>
							  	</tr>
					        </thead>
                                              
					        <tbody>
					        	<?php print_r($result); ?>
					        </tbody> 
					       
					          <tfoot> 
					            <tr>
					              <td colspan="32" style="border:none;">
					              	<button type="button" class="btn btn-danger btn-sm checkall" style="margin-right:2%;">Check All</button>
							<button type="submit" class="btn btn-danger btn-sm">Save</button>
					                <button type="reset" class="btn btn-danger btn-sm"> Reset</button>
					              </td>
					            </tr>
						 </tfoot>
					       
                                               
					      </table>
                          </form>
							</div>
						</div>
						<!------------------------------->
                            
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
		var clicked = false;
		$(".checkall").on("click", function() {
		  $(".checkhour").prop("checked", !clicked);
		  clicked = !clicked;
		});

		
		$('input[type=text]' ).on('blur',function() {
		   var bid = this.id; // button ID 
		   var trid = $(this).closest('tr').attr('id'); // table row ID 
		   //alert(trid);
		   var emp_gross_pay = $('#emp_total_gross_'+trid).val();
		   var emp_ltc= $('#ltc_'+trid).val();
		   var emp_cea= $('#cea_'+trid).val();
		   var emp_travelling_allowance= $('#tra_'+trid).val();
		   var emp_daily_allowance= $('#dla_'+trid).val();
		   var emp_spcl_allowance= $('#spcl_allowance_'+trid).val();
		   var emp_adv= $('#adv_'+trid).val();
		   var emp_adjustment= $('#adjadv_'+trid).val();
		   var emp_medical= $('#mr_'+trid).val();
		   var other_addition=$('#other1_'+trid).val();

		   var total_gross_on_blur=(parseInt(emp_gross_pay)+parseInt(emp_ltc) + parseInt(emp_cea)+ parseInt(emp_travelling_allowance) + parseInt(emp_daily_allowance) + parseInt(emp_spcl_allowance) + parseInt(emp_adv) + parseInt(emp_adjustment) +parseInt(emp_medical)+ parseInt(other_addition));
		   var emp_gross_pay = $('#emp_total_gross_'+trid).val(total_gross_on_blur);
    	   var Tot_deduction= $('#emp_total_deduction_'+trid).val();
		   var netsal=(parseInt(total_gross_on_blur)-parseInt(Tot_deduction));
		   $('#emp_net_salary_'+trid).val(netsal);
		    
		 });


		 $('input[type=text]' ).on('blur',function() {
		   var bid = this.id; // button ID 
		   var trid = $(this).closest('tr').attr('id'); // table row ID 
		   //alert(trid);
		   
		   var emp_nps= $('#nps_'+trid).val();
		   var emp_gsli= $('#gsli_'+trid).val();
		   var emp_income_tax= $('#income_tax_'+trid).val();
		   var emp_tax= $('#tax_'+trid).val();
		   var emp_other2= $('#other2_'+trid).val();
		   var emp_total_deduction=(parseInt(emp_nps)+parseInt(emp_gsli) + parseInt(emp_income_tax)+ parseInt(emp_tax) + parseInt(emp_other2));
		   $('#emp_total_deduction_'+trid).val(emp_total_deduction);
		   var emp_gross_pay = $('#emp_total_gross_'+trid).val();
		   var netsal=(parseInt(emp_gross_pay)-parseInt(emp_total_deduction));
		   $('#emp_net_salary_'+trid).val(netsal);
		    
		 });

		
		   	

		 
		 
		
	</script>
@endsection