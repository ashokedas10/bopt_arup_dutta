<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Provident Fund Balance Sheet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <style>
body {-webkit-print-color-adjust: exact;font-family:cambria;}
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
.sub{padding: 3px 3px 3px 4%;}
.sub2{padding: 3px 3px 3px 6%;}
/*tfoot{position:fixed;bottom:0;width:100%;}
.bank-state.header table{position:fixed;top:0;}*/
/*.footer{position:relative;}
.footer table{position:fixed;bottom:0;}*/
	@media print
{
 table {page-break-after: auto;}
  tr    {page-break-inside:avoid !important; page-break-after:auto !important; }
  td    { page-break-inside:avoid !important; page-break-after:auto !important; }
  thead { display:table-header-group !important; }
  
  
  tfoot { display:table-footer-group !important;}
 @page {
	size:auto;
    margin-top:15px; 
	margin-bottom: 15px;
    
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
					<h3 style="text-align:center;margin:0;">Provident Fund Account</h3>
					<h4>Balance Sheet as at March 31, {{$current_year}}</h4>
				</div>
			</td>
			</tr>
		
		</table>	


<!--------------------------fund-body------------------------>
<table>
<tr>
	<th style="border:none;" class="right">Amount in Rupees</th>
	</tr>
</table>
<table border="1" style="border-collapse:collapse;width:100%;margin-top:1%;">
	<thead style="background:#ddd;">
		<tr>
			<th style="padding:3px;">Amount <br>31.03.{{$previous_year}}</th>
			<th style="padding:3px;">Liabilities</th>
			<th style="padding:3px;">Amount <br>31.03.{{$current_year}}</th>
			<th style="padding:3px;">Amount <br>31.03.{{$previous_year}}</th>
			<th style="padding:3px;">Assets</th>
			<th style="padding:3px;">Amount <br>31.03.{{$current_year}}</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="padding:3px;border-bottom:none;"></td>
			<td style="padding:"><b>GPF</b></td>
			<td style="padding:3px;border-bottom:none;"></td>
			<td style="padding:3px;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;">Investment</td>
			<td style="padding:3px;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Opening Balance</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">@if(!empty($opening_balance->opening_balance)) {{$opening_balance->opening_balance}} @endif</td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;">Int. accrued as on 31/03/2019</td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add:Prior Period Adjustment</td>
			<td style="padding:3px;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;">Subscription Due for March 2016:</td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;">GPF</td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add: Subscription in the year</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;">CPF Receivable</td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add: Sub for March, 2016</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;">UC due to CPF</td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
		</tr>

<tr>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add: Interest Credited</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;">NPS-II</td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
		</tr>
		
	<tr>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Less: Advance/Withdrawal</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">{{$gpf_total_loan_amt[0]->gpf_loan_amt}}</td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
		</tr>
	<tr>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Closing Balance</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"><b>@if(!empty($closing_balance->balance_amt)){{$closing_balance->balance_amt}} @endif</b></td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
		</tr>	
		<tr>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-bottom:none;border-top:none;">Tax recovered from interest on Investments Pending refund from Income Tax Department</td>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
		</tr>	

		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;"></td>
			<td style="padding:3px;border-top:none;"><b>CPF</b></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Opening Balance</td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Less:Sub. for March 2016</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"><b>Cash at Bank</b></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add:Adjustment of closing balance (16-17)</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add:Subscription in the year</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">SB1, Brach -I</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add:Sub for March 2016</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add:Employers Contribution towards CPF</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add:Interest Credited</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Less:Advace Withdrawal/Closing</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 	
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;"><b>University Contribution (CAF)</b></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 	
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Opening Balance</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 	
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Less: Contribution for March 14</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 	
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add: Subscription in the Year</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 	
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add: sub for March 15</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add: Interest Credited</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 	
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Less: Advance/Withdrawal</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 		
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Closing Balance</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 	
		
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;"><b>NPS Tier-II Account</b></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Opening Balance</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Less: Sub. for March 14</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add: Subscription in the Year</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add: Sub for March 15</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add: Interest Credited</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Less: Advance/Withdrawal</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Closing Balance</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;"><b>Interest Reserve</b></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right">-</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 	
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Opening Balance</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Less:Prior period Adjustment</td>
			<td style="padding:3px;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr> 
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Add:Excess of Income over expenditure</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;border-top:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;">Closing Balance</td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"><b></b></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;"></td>
			<td style="padding:3px;border-top:none;border-bottom:none;" class="right"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom:none;" class="right"><b></b></td>
			<td style="padding:3px;border-bottom:none;">Total</td>
			<td style="padding:3px;border-bottom:none;" class="right"><b></b></td>
			<td style="padding:3px;border-bottom:none;" class="right"><b></b></td>
			<td style="padding:3px;border-bottom:none;"><b>Total</b></td>
			<td style="padding:3px;border-bottom:none;" class="right"><b></b></td>
		</tr>
	</tbody>
</table>

<!----------------------------------------------------->
</div>
<!------------------------------------------------->
<!---------------------endowment-funds----------------->

<!----------------------------------------------->

</body>

</html>