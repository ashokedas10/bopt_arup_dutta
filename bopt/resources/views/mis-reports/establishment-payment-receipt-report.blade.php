<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Receipt and Payment Account</title>
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
	margin-bottom: 6px;
    
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
				<h4>Establishment Account</h4>
				<h4>Receipt and Payment Account for the Year Ended 31st March, {{$end_year}}</h4>
				</div>
				
			</td>
			</tr>
		<tr>
			<td colspan="6"><span style="border: 1px solid #000;border: 1px solid #000;padding: 2px 5px;">STATEMENT NO. :1</span></td>
		</tr>
		</table>	


<!--------------------------fund-body------------------------>
<table border="1" style="border-collapse:collapse;width:100%;margin-top:1%;">
	<thead style="background:#ddd;">
		<tr>
			<th style="padding:3px;">RECEIPTS</th>
			<th style="padding:3px;">Current Year</th>
			<th style="padding:3px;">Previous Year</th>
			<th style="padding:3px;">PAYMENTS</th>
			<th style="padding:3px;">Current Year</th>
			<th style="padding:3px;">Previous Year</th>

		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td style="padding:3px;"><b>I. Opening Balances</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>I. Expenses:</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;">a)Cash Balances</td>
			<td style="padding:3px;">{{$receive_cash_in_hand[0]->closing_amt}}</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">a) Establishment Expenses</td>
			<td style="padding:3px;">{{$establishment_expenses[0]->establishment_expenses_amt}}</td>
			<td style="padding:3px;"></td>
			
		</tr>
		<tr>
			<td style="padding:3px;">b) Bank Balances</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">b) Academic Expenses</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td class="sub">i) In Current Accounts(SBI)</td>
			<td style="padding:3px;">{{$receive_saving_balance[0]->receive_saving_amt}}</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">c) Adminstartive Expenses</td>
			<td style="padding:3px;">{{$administrative_expenses[0]->administrative_expenses_amt}}</td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td class="sub">ii) In Deposit Accounts</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">d) Transportation Expenses</td>
			<td style="padding:3px;">{{$transport_expenses[0]->transport_expenses_amt}}</td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td class="sub">iii) Savings accounts (CANARA)</td>
			<td style="padding:3px;">{{$receive_current_balance[0]->receive_current_amt}}</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">e) Repairs & Maintenance</td>
			<td style="padding:3px;">{{$repairs_expenses[0]->repairs_expenses_amt}}</td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td class="sub"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">f) Prior period Expenses</td>
			<td style="padding:3px;">{{$period_expenses[0]->period_expenses_amt}}</td>
			<td style="padding:3px;"></td>
		</tr>

		<tr>
			<td style="padding:3px;"><b>II) Grants Received</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>II) Payment Against Earmarked<br>/Endowment Funds</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		
		<tr>
			<td style="padding:3px;">a) From Government of India</td>
			<td style="padding:3px;">{{$grant_in_aid[0]->grant_in_aid_amt}}</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>

		<tr>
			<td style="padding:3px;">b) From State Government</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;">c) From other sources (details)<br>(Grants for capital &amp; revenue/exp. to be shown<br> seperately if available)</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>III) Academic Receipts</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>III) Payment Against Sponsored Project / Schemes</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>IV) Receipts against Earmarked/Endowment Funds</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>IV) Payment Against Earmarked<br>/Endowment Funds</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;vertical-align:top;"><b>V) Receipts against sponsored projects/schemes</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>V) Investment and Deposit made</b>
				<ul class="sub" style="list-style:none;">
					<li>a) Out of Earmarked /Endowment funds</li>
					<li>b) Out of own funds (Investment-others)</li>
				</ul>
			</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>VI) Receipts against Sponsored Fellowships / Scholerships</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>VI) Term Deposit with Scheduled Banks</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>VII) Income on Investment from</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>VII) Expenditure on Fixed Assets and Capital Work-in-Progress</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td class="sub">a) Earmarked/Endowment funds</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td class="sub">a)Fixed Assets</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td class="sub"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td class="sub">b)Capital Work-in-Progress</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>VIII) Interest Received on</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>VIII) Other Payment including statutory payments</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td class="sub">a) Bank Deposit</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td class="sub"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td class="sub">b) Loan &amp; Advances</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td class="sub"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td class="sub">c) Savings Bank Accounts</td>
			<td style="padding:3px;">{{$saving_bank_account[0]->saving_account_amt}}</td>
			<td style="padding:3px;"></td>
			<td class="sub"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>IX) Investments Encashed</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>IX) Refunds of Grants</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>X) Term Deposits with Scheduled Banks Encashed</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>X) Deposits and Advances</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
	<tr>
			<td style="padding:3px;"><b>XI) Other Income (Including Prior Period Income)</b></td>
			<td style="padding:3px;">{{$other_income[0]->other_income_amt}}</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>XI) Other Payments</b></td>
			<td style="padding:3px;">{{$other_payment[0]->other_payment_amt}}</td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>XII) Deposits and Advances</b></td>
			<td style="padding:3px;">{{$deposit_advance[0]->deposit_advance_amt}}</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>XII) Closing balances</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>XIII) Miscellaneous Receipts including Satutory Receipts</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td class="sub">a) Cash in Hand</td>
			<td style="padding:3px;">{{$payment_cash_in_hand[0]->closing_amt}}</td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td class="sub">b) Bank Balances</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b>XIV) Any Other Receipts</b></td>
			<td style="padding:3px;">{{$other_receipt[0]->other_receipt_amt}}</td>
			<td style="padding:3px;"></td>
			<td class="sub2">i) In Current Accounts (SBI)</td>
			<td style="padding:3px;">{{$payment_saving_balance[0]->closing_amt}}</td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"><b></b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td class="sub2">ii) In Savings Accounts (CANARA)</td>
			<td style="padding:3px;">{{$payment_current_balance[0]->closing_amt}}</td>
			<td style="padding:3px;"></td>
		</tr>
		@php 
			$total_receipt=0;
			$total_receipt= $receive_cash_in_hand[0]->closing_amt + $receive_saving_balance[0]->receive_saving_amt + $receive_current_balance[0]->receive_current_amt + $grant_in_aid[0]->grant_in_aid_amt + $saving_bank_account[0]->saving_account_amt + $other_income[0]->other_income_amt + $deposit_advance[0]->deposit_advance_amt + $other_receipt[0]->other_receipt_amt; 
		@endphp

		@php 
			$total_payment=0;
			$total_payment=$establishment_expenses[0]->establishment_expenses_amt + $administrative_expenses[0]->administrative_expenses_amt +  $transport_expenses[0]->transport_expenses_amt + $period_expenses[0]->period_expenses_amt + $other_payment[0]->other_payment_amt + $repairs_expenses[0]->repairs_expenses_amt + $payment_cash_in_hand[0]->closing_amt + $payment_saving_balance[0]->closing_amt + $payment_current_balance[0]->closing_amt; 
		@endphp
		<tr>
			<td style="padding:3px;" class="center"><b>TOTAL</b></td>
			<td style="padding:3px;"><b>{{$total_receipt}}</b></td>
			<td style="padding:3px;"><b></b></td>
			<td class="center"><b>TOTAL</b></td>
			<td style="padding:3px;"><b>{{$total_payment}}</b></td>
			<td style="padding:3px;"><b></b></td>
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