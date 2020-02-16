<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Income Expenditure Account</title>
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
				<h4>Income Expenditure Account for the Year Ended 31/03/{{$current_year}}</h4>
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
			<th style="padding:3px;">Expenditure</th>
			<th style="padding:3px;">Amount <br>31.03.{{$current_year}}</th>
			<th style="padding:3px;">Amount <br>31.03.{{$previous_year}}</th>
			<th style="padding:3px;">Income</th>
			<th style="padding:3px;">Amount <br>31.03.{{$current_year}}</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"><b>Interest Credited to:</b></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Interest earned on Investment</td>
			<td style="padding:3px;">	@php $result=0;
				$result=$Interest_earned_on_investment[0]->received_amount;@endphp
				@if(!empty($result)){{$result}} @endif</td>
		</tr>
		<tr>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">GPF Account</td>
			<td style="padding:3px;">{{$current_gpf_total}}</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Add:Interest accrued on 03/09</td>
			<td style="padding:3px;">	@php $resultacc=0;
				$resultacc=$Interest_accrued[0]->received_amount;@endphp
				@if(!empty($resultacc)){{$resultacc}} @endif</td>
		</tr>
		<tr>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">CPF Account</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Add:Tax recovered on interest</td>
			<td style="padding:3px;">@php $resulttax=0;
				$resulttax=$Tax_recovered_on_interest[0]->received_amount;@endphp
				@if(!empty($resulttax)){{$resulttax}} @endif</td>
		</tr>
		<tr>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Bank Charges</td>
			<td style="padding:3px;">@php $resultbank=0;
				$resultbank=$Bank_charges[0]->bill_amt;@endphp
				@if(!empty($resultbank)){{$resultbank}} @endif</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Refund to be obtained</td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Employers Contribution (CPF)</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Employers Contribution to CPF</td>
			<td style="padding:3px;"></td>
		</tr>
		<tr>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">NPS Tier-II Account</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Less: Interest accrued for March '18</td>
			<td style="padding:3px;"></td>
		</tr>

		<tr>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Excess of Income over Expenditure</td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Excess of Expenditure over Income</td>
			<td style="padding:3px;"></td>
		</tr>


		<tr>
		<td style="padding:3px;"><b></b></td>
			<td style="padding:3px;" class="center"><b>TOTAL</b></td>
			<td style="padding:3px;"><b>{{$current_gpf_total+$resultbank}}</b></td>
			<td style="padding:3px;"><b></b></td>
			<td class="center"><b>TOTAL</b></td>
			<td style="padding:3px;"><b>{{$resultacc+$result+$resulttax}}</b></td>
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
