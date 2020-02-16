<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Monthwise Summary of GPF Member</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <style>
body {-webkit-print-color-adjust: exact;font-family:Arial;}
payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 35px;color: #000;text-align:center;margin:0;}
	.payslip .pay-head h4 {font-size: 19px;text-align:center;margin:0;}
	.payslip .pay-month{text-align:center;}
	.payslip .pay-month h3{margin:0;color: #000;}
	.pay-logo img {max-width: 80px;}
.bank-state table td h2, .bank-state table td h1{text-align:center;}
.bank-state table tr td{vertical-align:top;}
table{width:100%;}
.acnt thead tr th, .acnt tr td{padding:2px 3px;font-size:14px;}
.acnt .head td{background:#ddd;font-weight:600;text-align:center;}.left{text-align:left;}
.center{text-align:center;}.right{text-align:right;}
tbody{height:100%;}
li{padding-bottom:5px;}
.ledger tr td{padding:3px;font-size:14px;}
	.sub{padding-left:30px;}.sub2{padding-left:40px;}
	.pl20{padding-left:20px;}
/*tfoot{position:fixed;bottom:0;width:100%;}
.bank-state.header table{position:fixed;top:0;}*/
/*.footer{position:relative;}
.footer table{position:fixed;bottom:0;}*/
.brdr{border-bottom:1px solid;}
	@media print
{
 table {page-break-after: auto;}
  tr    {page-break-inside:avoid !important; page-break-after:auto !important; }
  td    { page-break-inside:avoid !important; page-break-after:auto !important; }
  thead { display:table-header-group !important; }
  
  
  tfoot { display:table-footer-group !important;}
 @page {
	size:landscape;
    margin-top:0; 
	margin-bottom: 0;
    
	}

}
  </style>
</head>
<body>
<!-------------------Designated-fund-head------------------------>
<div class="payslip">
<table class="comp-det" style="width:100%;">
		<tr>
		
			<td>
			<div class="pay-logo">
					<img src="{{asset('images/logo2.png')}}" alt="logo">
				</div>
			</td>
			<td>
				<div class="text-center pay-head" style="margin-bottom:20px;">
				<h2>Board of Practical Training (ER)</h2>
				<!--<h3 style="text-align:center;margin:0;">Establishment Account</h3>-->
				
				<h4>Monthwise Summary of GPF Member fo year 2018-19</h4>
				</div>
				
			</td>
			</tr>
		</table>	


<!--------------------------fund-body------------------------>

<table border="1" style="border-collapse:collapse;width:100%;FONT-SIZE:11PX;">

	<thead>
		
		<tr>
			<th style="padding:4px;">Sl. No.</th>
			<th style="padding:4px;">Name</th>
			<th style="padding:4px;">A/c No.</th>
			<th style="padding:4px;">L/F NO.</th>
			<th style="padding:4px;">Opening Balance</th>
			<th style="padding:4px;">Apr</th>
			<th style="padding:4px;">May</th>
			<th style="padding:4px;">Jun</th>
			<th style="padding:4px;">Jul</th>
			<th style="padding:4px;">Aug</th>
			<th style="padding:4px;">Sept</th>
			<th style="padding:4px;">Oct</th>
			<th style="padding:4px;">Nov</th>
			<th style="padding:4px;">Dec</th>
			<th style="padding:4px;">Jan</th>
			<th style="padding:4px;">Feb</th>
			<th style="padding:4px;">Mar</th>
			<th style="padding:4px;">Total contribution during the year</th>
			<th style="padding:4px;">Opening balance with Cont.</th>
			<th style="padding:4px;">Total withdrawal</th>
			<th style="padding:4px;">Total refund</th>
			<th style="padding:4px;">Interest during the year</th>
			<th style="padding:4px;">Closing balance</th>
		</tr>
		
	</thead>
	<tbody style="border:none;">
		
		@if(!empty($employee_gpf))
		@foreach($employee_gpf as $empkey=>$employeegpf)
		@php  $total_contribution=0; $monthly_contribution=0;  @endphp
		<tr>
			<td style="padding:3px;border:none;" class="center">{{ $loop->iteration}}</td>
			<td style="padding:3px;border:none;" class="left"><b>{{ $employeegpf['emp_name']}}</b></td>
			<td style="padding:3px;border:none;" class="center">{{ $employeegpf['emp_ac_no']}}</td>
			<td colspan="23" style="padding:3px;border:none;" class="right">{{ $employeegpf['lf_no']}}</td>
		</tr>
		<tr>
			<td style="padding:3px;border:none;" class="center"></td>
			<td style="padding:3px;border:none;" class="left">Contribution</td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right">0</td>
			@if(!empty($employeegpf['data_array']))
			@for($i=0; $i<12; $i++)
			@php  $monthly_contribution = $employeegpf['data_array'][$i]['own_share']+$employeegpf['data_array'][$i]['company_share'];
				$total_contribution+=$monthly_contribution;
			@endphp
			<td style="padding:3px;border:none;" class="right">{{ $monthly_contribution}}</td>
			@endfor
			@else
			@for($i=0; $i<12; $i++)
			<td style="padding:3px;border:none;" class="right">0</td>
			@endfor
			@endif
			<td style="padding:3px;border:none;" class="right">{{ $total_contribution}}</td>
			<td style="padding:3px;border:none;" class="right">0</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;border-right:1px solid;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;border:none;" class="center"></td>
			<td style="padding:3px;border:none;" class="left">Withdrawal (-)</td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="center">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<th style="padding:4px;border:none;" class="right">-</th>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;border-right:1px solid;" class="right">-</td>
		</tr>
		<tr class="brdr">
			<td style="padding:3px;border:none;" class="center"></td>
			<td style="padding:3px;border:none;" class="left">Refund</td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="center">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<th style="padding:4px;border:none;" class="right">-</th>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;border-right:1px solid;" class="right">-</td>
		</tr>
		
		@endforeach
		
		
		<tr style="font-weight:600;BORDER-TOP:1PX SOLID;">
			<td style="padding:3px;border:none;" class="center" colspan="4">GRAND TOTAL ==></td>
			<td style="padding:3px;border:none;" class="right">1,14,55,262</td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right">17,80,952</td>
			<td style="padding:3px;border:none;" class="right">1,32,36,214.00</td>
			<td style="padding:3px;border:none;" class="right">25,07,469</td>
			<td style="padding:3px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">9,18,336</td>
			<td style="padding:3px;border:none;border-right:1px solid;" class="right">1,16,47,081</td>
		</tr>
		@endif
	</tbody>
</table>
<!----------------------------------------------------->
</div>
<!------------------------------------------------->

</body>

</html>