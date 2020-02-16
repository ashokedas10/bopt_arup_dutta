<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Payslip</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
body {-webkit-print-color-adjust: exact;}
  	.payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 25px;color: #0099be;text-align:right;margin:0;}
	.payslip .pay-head h4 {font-size: 19px;text-align:right;margin:0;}
	.payslip .pay-month{text-align:center;}
	.payslip .pay-month h3{margin:0;color: #0099be;}
	.pay-logo img {max-width: 80px;}
	.pay-head{text-align:right;}
	.pay-head h2{text-align:right;}
	.emp-det{width:100%;}
	.emp-det thead tr th{text-align:center;}
	.emp-det thead tr th{border-bottom:none;}
	.emp-det thead tr th {border-bottom: none;background: #0099be;color: #fff;padding: 5px;font-size: 18px;}
	.emp-det tbody tr td{padding:10px;}
	table.emp-det tr td span {font-weight: 600;}
	.sal-det tr th {background: #0099be;padding: 5px 10px;border-bottom: none;color: #fff;text-align:center;}
	.sal-det tr.part td{padding:7px 10px;text-align:left;font-weight:600;border-top:none;}
	.sal-det tr td{padding:7px 10px;text-align:left;}
	.sal-det tr td p{text-align:right;margin:0;}.mon{text-align:right;}.mon h3{color:#0099be;margin:0;font-size:25px;}.mon h4{margin:0;}
	.sal-det tr:nth-child(odd) {background-color: #f2f2f2;}
	.emp-det{margin-bottom:15px;}.total td{font-weight:600;}.leave{border-top:none;}
	.leave tr th{padding:7px 10px;text-align:left;}.sal-det .right{text-align:right;}
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
			 <img src="{{ asset('theme/images/bopt-logo.png') }}" alt="logo">
			</div>
			</td>
			<td>
				<div class="pay-head">
				<h2><?php echo $company_rs->company_name; ?></h2>
				<h4><?php echo $company_rs->company_address; ?></h4>
				</div>
				<div class="mon">
                                      <?php 
                                    $dt=$payroll_rs[0]->month_yr;
                                    $dtar=explode('/',$dt);
                                    $paymonth= $monthName = strftime('%B', mktime(0, 0, 0, $dtar[0]));
                                    ?>
					<h4><?php echo $paymonth.' - '.$dtar[1] ; ?></h4>
				</div>
			</td>
			
			</tr>
		</table>	
	<!--------------------------->
	<!--------------employee-details--------------->
		
		<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#cacaca;">
			<thead>
				<tr>
					<th colspan="3">Deduction</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><span>Branch Name :</span> Director</td>
					<td><span>Division :</span> AAO</td>
					<td><span>Deductiona Name :</span> Profession Tax</td>
				</tr>
				
				
				
			</tbody>
		</table>
	<!------------------------------------------>
	
	<!------------Salary-details----------------->	
			<table border="1" class="sal-det" style="width:100%;border-collapse:collapse;border-color:#cacaca;">
				<thead>
					<tr>
						<th>Sl. No.</th>
						<th>Employee ID</th>
						<th>Employee Name</th>
						<th>Designation</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
                                    <?php $tot_deduction=0; ?>
					@foreach($payroll_rs as $pay)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$pay->employee_id}}</td>
						<td>{{$pay->emp_name}}</td>
						<td>{{$pay->emp_designation}}</td>
						<td class="right">{{$pay->emp_pro_tax}}</td>
					</tr>
                                       <?php  $tot_deduction=$tot_deduction+$pay->emp_pro_tax; ?>
				@endforeach
					<tr>
						<td style="font-weight:600;" colspan="3">Total Deduction Amount</td>
						<td style="font-weight:600;text-align:right;" colspan="2">{{$tot_deduction}}</td>
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