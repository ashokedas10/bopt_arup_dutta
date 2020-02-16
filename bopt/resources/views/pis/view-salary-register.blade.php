<?php
//$month=$monthly_salary_rs[0]->month_yr;
//$montharr = explode('/',$month);
//$m = $montharr[0];
//$y = $montharr[1];
//$m = ltrim($m, '0');
$dt=$month;
$dtar=explode('/',$dt);
$monthName = strftime('%B', mktime(0, 0, 0, $dtar[0]));
$YearName=$dtar[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Board of Practical Training | Salary Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <style type="text/css" media="print"> @page { size: auto; /* auto is the initial value */  
   	margin-top: 0;
    margin-bottom: 0; /* this affects the margin in the printer settings */ }  
   </style>
  <style>
body {-webkit-print-color-adjust: exact;}
  	.payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 35px;color: #292929;text-align:center;margin:0;}
	.payslip .pay-head h4 {font-size: 19px;text-align:center;margin:0;}
	.payslip .pay-month{text-align:center;}
	.payslip .pay-month h3{margin:0;color: #0099be;}
	.pay-logo img {max-width: 80px;}
	.emp-det{width:100%;}
	.emp-det thead tr th{text-align:center;}
	.emp-det thead tr th{border-bottom:none;}
	.emp-det thead tr th {border-bottom: none;background: #0099be;color: #fff;padding: 5px;font-size: 18px;}
	.emp-det tbody tr td{padding:10px;}
	table.emp-det tr td span {font-weight: 600;}
	.sal-det tr th {background: #a7a8a9;padding: 5px;border-bottom: none;color: #000;text-align:center;font-size:12px;}
	.sal-det tr.part td{padding:5px;text-align:left;font-weight:600;background: #a7a8a9;color:#000;text-align:center;font-size:12px;}
	.sal-det tr td{padding:5px;text-align:center;font-size:12px;}
	.sal-det tr td p{text-align:right;margin:0;}.mon{text-align:center;}.mon h3{color:#0099be;margin:0;font-size:25px;}.mon h4{margin:0;font-size: 24px;}
	.sal-det tr:nth-child(odd) {background-color: #f2f2f2;}
	.emp-det{margin-bottom:15px;}.total td{font-weight:600;}.leave{border-top:none;}
	.leave tr th{padding:7px 10px;text-align:left;}
	@media print{@page {size: landscape}}
  </style>
</head>
<body>
<!-------------------payslip-body------------------------->
<div class="payslip">
	<!-----------company-details----------->
		<table class="comp-det" style="width:100%;">
		<tr>
		
			<td>
			<div class="pay-logo">
					<img src="{{ asset('theme/payslip-img/logo.png') }}" alt="logo">
				</div>
			</td>
			<td>
				<div class="text-center pay-head">
				<h2>Board of Practical Training (ER)</h2>
				<h4></h4>
				</div>
				<div class="mon">
					<h4>Employee Salary Register for the month of  <?php echo $monthName.' - '.$YearName ; ?></h4>
				</div>
			</td>
			</tr>
		</table>	
	<!--------------------------->
	<?php $totalbasic=0; ?>
	<?php $totalda=0; ?>
	<?php $totalhra=0; ?>
	<?php $totalta=0; ?>
	<?php $totaldaonta=0; ?>
	<?php $totalsa=0; ?>
	<?php $totalcha=0; ?>
	<?php $totalcea=0; ?>
	<?php $totalotherincome=0; ?>
	<?php $totalearnings=0; ?>
	<?php $totalgpf=0; ?>
	<?php $totalnps=0; ?>
	<?php $totalcpf=0; ?>
	<?php $totalgsli=0; ?>
	<?php $totalptax=0; ?>
	<?php $totalit=0; ?>
	<?php $totalcess=0; ?>
	<?php $totalad=0; ?>
	<?php $totalod=0; ?>
	<?php $totaldeduction=0; ?>
	<?php $totalsalary=0; ?>

	
	<!------------Salary-details----------------->	
			<table border="1" class="sal-det" style="width:100%;border-collapse:collapse;border-color:#cacaca;">
				<thead style="margin-top: 10px;">
					<tr>
						<th rowspan="2">SL.NO.</th>
						<th rowspan="2">EMPLOYEE ID</th>
						<th rowspan="2">EMPLOYEE Name</th>
						<th rowspan="2">DESIGNATION</th>
						
						<th colspan="9">EARNINGS(Amount in <i class="fas fa-rupee-sign"></i>)</th>
						<th colspan="10">DEDUCTIONS (Amount in <i class="fas fa-rupee-sign"></i>)</th>
						<th rowspan="2">NET SALARY (<i class="fas fa-rupee-sign"></i>)</th>
					</tr>
					<tr class="part">
						<td>BASIC PAY</td>
						<td>DEAR. ALLOW.</td>
						<td>HRA</td>
						<td>TRAN ALLOW.</td>
						<td>D.A. on T.A.</td>
						<td>SPCL ALLOW</td>
						<td>CHA</td>
						<td>OTHER INCOME</td>
						<td>TOTAL EARNINGS</td>
						<td>GPF</td>
						<td>NPS</td>
						<td>CPF</td>
						<td>GSLI</td>	
						<td>PROF. TAX</td>
						<td>INCOME TAX</td>
						<td>CESS</td>
						<td>ABSENT DEDUCTIONS</td>
						<td>OTHER DEDUCTIONS</td>
						<td>TOTAL DEDUCTIONS</td>
					</tr>
				</thead>
				<tbody>
					@foreach($monthly_salary_rs as $ms)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$ms->employee_id}}</td>
						<td>{{$ms->emp_name}}</td>
						<td>{{$ms->emp_designation}}</td>
						
						<td>{{$ms->emp_basic_pay}}</td>
						<td>{{$ms->emp_da}}</td>
						<td>{{$ms->emp_hra}}</td>
						<td>{{$ms->emp_transport_allowance}}</td>
						<td>{{$ms->emp_da_on_ta}}</td>
						<td>{{$ms->emp_spcl}}</td>
						<td>{{$ms->emp_cash_handle}}</td>
						<td>{{$ms->other_addition}}</td>
						<td>{{$ms->emp_gross_salary}}</td>
						<td>{{$ms->emp_gpf}}</td>
						<td>{{$ms->emp_nps}}</td>
						<td>{{$ms->emp_cpf}}</td>
						<td>{{$ms->emp_gslt}}</td>
						<td>{{$ms->emp_pro_tax}}</td>
						<td>{{$ms->emp_income_tax}}</td>
						<td>{{$ms->emp_cess}}</td>
						<td>{{$ms->emp_absent_deduction}}</td>
						<td>{{$ms->other_deduction}}</td>
						<td>{{$ms->emp_total_deduction}}</td>
						<td>{{$ms->emp_net_salary}}</td>
						
					</tr>
                     <?php $totalbasic+=$ms->emp_basic_pay; ?>
                     <?php $totalda+=$ms->emp_da; ?>    
                     <?php $totalhra+=$ms->emp_hra; ?>
                     <?php $totalta+=$ms->emp_transport_allowance; ?>
                     <?php $totaldaonta+=$ms->emp_da_on_ta; ?>
                     <?php $totalsa+=$ms->emp_spcl; ?>
                     <?php $totalcha+=$ms->emp_cash_handle; ?>
                     <?php $totalotherincome+=$ms->other_addition; ?>
                     <?php $totalearnings+=$ms->emp_gross_salary; ?>
                     <?php $totalgpf+=$ms->emp_gpf; ?>
                     <?php $totalnps+=$ms->emp_nps; ?>
                     <?php $totalcpf+=$ms->emp_cpf; ?>
                     <?php $totalgsli+=$ms->emp_gslt; ?>
                     <?php $totalptax+=$ms->emp_pro_tax; ?>
                     <?php $totalit+=$ms->emp_income_tax; ?>
                     <?php $totalcess+=$ms->emp_cess; ?>
                     <?php $totalad+=$ms->emp_absent_deduction; ?>
                     <?php $totalod+=$ms->other_deduction; ?>
                     <?php $totaldeduction+=$ms->emp_total_deduction; ?>
                     <?php $totalsalary+=$ms->emp_net_salary; ?>              
					@endforeach

					<tr>
						<th colspan="4" style="text-align: left;">Total (In RUPEES)</th>
						<th><?php echo $totalbasic; ?></th>
						<th><?php echo $totalda; ?></th>
						<th><?php echo $totalhra; ?></th>
						<th><?php echo $totalta; ?></th>
						<th><?php echo $totaldaonta; ?></th>
						<th><?php echo $totalsa; ?></th>
						<th><?php echo $totalcha; ?></th>
						<th><?php echo $totalotherincome; ?></th>
						<th><?php echo $totalearnings; ?></th>
						<th><?php echo $totalgpf; ?></th>
						<th><?php echo $totalnps; ?></th>
						<th><?php echo $totalcpf; ?></th>
						<th><?php echo $totalgsli; ?></th>
						<th><?php echo $totalptax; ?></th>
						<th><?php echo $totalit; ?></th>
						<th><?php echo $totalcess; ?></th>
						<th><?php echo $totalad; ?></th>
						<th><?php echo $totalod; ?></th>
						<th><?php echo $totaldeduction; ?></th>
						<th><?php echo $totalsalary; ?></th>
					</tr>
					<tr>
						<td colspan="22" style="border-right:none;"></td>
						<td colspan="2" style="width:150px;border-left:none;"></td>
					</tr>

				
					
					
				</tbody>
				
			</table>
			
	<!------------------------------------->
</div>

<!---------------------------------------------------->


<!---------------------js------------------------------------->
<!-------------------------------------------------------->
</body>
</html>