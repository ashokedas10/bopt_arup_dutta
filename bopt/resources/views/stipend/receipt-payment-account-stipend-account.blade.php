<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training |Receipts &amp; Payments Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <style>
body {-webkit-print-color-adjust: exact;font-family:cambria;}
payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 35px;color: #000;text-align:center;margin:0;}
	.payslip .pay-head h4 {font-size: 14px;text-align:center;margin:0;}
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
/*tfoot{position:fixed;bottom:0;width:100%;}
.bank-state.header table{position:fixed;top:0;}*/
/*.footer{position:relative;}
.footer table{position:fixed;bottom:0;}*/
.sub{padding:3px 3px 3px 4%;}
.sub2{padding:3px 3px 3px 6%;}
	@media print
{
 table {page-break-after: auto;}
  tr    {page-break-inside:avoid !important; page-break-after:auto !important; }
  td    { page-break-inside:avoid !important; page-break-after:auto !important; }
  thead { display:table-header-group !important; }


  tfoot { display:table-footer-group !important;}
 @page {
	size:auto;
    margin-top:0;
	margin-bottom: 0;

	}

}
  </style>
</head>
<body>
<!-------------------income-expenditure-account------------------------->
@php

$totalamout4s=0;
$totalamout5s=0;
$totalamout6s=0;
$totalamout7s=0;
$totalamout8s=0;
$totalamout9s=0;
$totalamout=0;
$totalamoutdip=0;
$totalamoutall=0;
$gradtotalamout=0;
$totalamouta=0;
$totalamoutb=0;
$opening_balance =0;
$gradtotalamoutall=0;
@endphp
@foreach ($financial_year as $value)
 @if($value->transaction_code=='5S/001')
 @php $totalamout5s+= $value->net_amt; @endphp
@endif
@if($value->transaction_code=='4S/000/001')
 @php $totalamout4s+= $value->net_amt; @endphp
@endif
@if($value->transaction_code=='6S/408/001')
@php $totalamout6s+= $value->net_amt; @endphp
@endif
@if($value->transaction_code=='7S/308/001')
 @php $totalamout7s+= $value->net_amt; @endphp
@endif
@if($value->transaction_code=='8S/001')
 @php $totalamout8s+= $value->net_amt; @endphp

@endif


                 @endforeach

                 @foreach ($expendsese_year as $value)

                    @php   $totalamout+= $value->graduate @endphp
                    @php   $totalamoutdip+= $value->diploma @endphp

                 @endforeach

                 @php   $totalamoutall+= $totalamoutdip+$totalamout;


                 $gradtotalamout=$totalamoutall+$totalamout8s+$totalamout7s-$totalamout6s-$totalamout5s;


                 @endphp
 @php
 $gradtotalamoutall=  $totalamout4s-$gradtotalamout;
 $opening_balance = $company_bank_dtl->balance_amt;
 $totalamoutb=$totalamout8s+$totalamoutall+$opening_balance;
                 $totalamouta=$gradtotalamoutall+$totalamout4s+$totalamout6s+$totalamout5s;
  @endphp


<div class="payslip">
<table class="comp-det" style="width:100%;margin-bottom: 20px;">
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
				<h4 style="text-transform: uppercase;">Stipend Account</h4>
				<h4 style="text-transform:uppercase;">Receipts and Payments Account For the Financial Year Ended 31st March, 2020</h4>
				</div>

			</td>
			</tr>

        </table>
        <table style="margin-bottom:10px;">
            <tr><td style="border: 1px solid #000;width:200px;">STATEMENT NO:II</td>
                <td></td>
            </tr>
        </table>

<table border="2" style="width:100%;border-collapse:collapse;border:1px solid #000;font-size:12px;">
	<thead>
		<tr>
			<th style="padding:4px;">RECEIPTS</th>
			<th style="padding:4px;">Current Year</th>
			<th style="padding:4px;">Previous Year</th>
			<th style="padding:4px;">PAYMENTS</th>
			<th style="padding:4px;">Current Year</th>
			<th style="padding:4px;">Previous Year</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>I. Opening Balances</b></td>
			<td></td>
			<td></td>
			<td><b>1. Expenses:</b></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>a) Cash Balances</td>
			<td>-</td>
			<td>-</td>
			<td class="sub">a) Establishment Expenses</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>a) Bank Balances</td>
			<td>-</td>
			<td>-</td>
			<td class="sub">b) Academic Expenses</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="sub">i) In current accounts (SBI)</td>
			<td class="right">{{$gradtotalamoutall}}</td>
			<td class="right">-</td>
			<td class="sub">c) Administrative Expenses</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="sub">i) In Deposit accounts</td>
			<td></td>
			<td></td>
			<td class="sub">d) Transportation Expenses</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="sub">iii) Savings accounts (CANARA)</td>
			<td></td>
			<td></td>
			<td class="sub">e) Repairs &amp; Maintenance</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="sub"></td>
			<td></td>
			<td></td>
			<td class="sub">f) Finance Cost</td>
			<td>{{ $totalamout8s}}</td>
			<td></td>
		</tr>
		<tr>
			<td><b>II. Grants Received</b></td>
			<td></td>
			<td></td>
			<td><b>II. Payments against Earmarked / Endowment Funds</b></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>a) From Govt. of India</td>
			<td>{{ $totalamout4s}}</td>
			<td></td>
			<td><b></b></td>
			<td></td>
			<td></td>
		</tr>

		<tr>
			<td>c) From State Government</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>d) From other sources (details)<br>(Grants for Capital &amp; revenue exp/to be shown seperately<br> if available)</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>III. Academic Receipts</td>
			<td></td>
			<td></td>
			<td>III. Payments against Sponsored Projects/scheme</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>IV. Receipts against Earmarked/Endowment funds</td>
			<td></td>
			<td></td>
			<td>IV. Payments against Sponsored Fellowship/Scholarships</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>V. Receipts against Sponsored Projects/Schemes</td>
			<td></td>
			<td></td>
			<td>V. Investments and Deposits made <br>
				<span class="sub">a) Out of Earmarked/Endowment funds</span><br>
				<span class="sub">b) Out of own funds (Investments-Others)</span>
			</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>VI. Receipts against Sponsored Fellowship and Scholerships</td>
			<td></td>
			<td></td>
			<td>VI. Term Deposits with Scheduled Banks</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>VII. Income on Investments from</td>
			<td></td>
			<td></td>
			<td>VII. Expenditure on Fixed Assets and Capital Works-in- Progress</td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="sub">a) Earmarked / Endowment funds</td>
			<td></td>
			<td></td>
			<td class="sub">a) Fixed Assets</td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="sub"></td>
			<td></td>
			<td></td>
			<td class="sub">b) Capital Work-in-Progress</td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><b>VIII. Interest Received on</b></td>
			<td></td>
			<td></td>
			<td>viii. Other Payments including statutory payments</td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="sub">a) Bank Deposits</td>
			<td></td>
			<td></td>
			<td></td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="sub">b) Loans &amp; Advances</td>
			<td></td>
			<td></td>
			<td></td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="sub">c) Savings Bank Accounts</td>
			<td>{{ $totalamout5s}}</td>
			<td>-</td>
			<td>-</td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>IX. Investments encashed</td>
			<td></td>
			<td></td>
			<td>IX) Refunds of Grants</td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>X. Term Deposits with Scheduled Banks encashed</td>
			<td></td>
			<td></td>
			<td>X. Deposits and Advances</td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>XI. Other Income (including Prior Period Income)</td>
			<td></td>
			<td></td>
			<td>XI. Other Payment (Payment made to different establishment as reimbursement claim of stipend)</td>

			<td>{{$totalamoutall}}</td>
			<td></td>
		</tr>
		<tr>
			<td>XII. Deposits and Advances</td>
			<td></td>
			<td></td>
			<td><b>XII. Closing balances</b></td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>XIII. Miscellaneous Receipts including Statutory Receipts</td>
			<td></td>
			<td></td>
			<td class="sub">a) Cash in Hand</td>

			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td class="sub">b) Bank balances</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>XIV. Any Other Receipts (Barred cheque/draft written back)</td>
			<td>{{ $totalamout6s}}</td>
			<td></td>
			<td class="sub2">In Current Accounts (SBI)</td>

			<td>{{$opening_balance}}</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td class="sub2">In Savings Accounts (CANARA)</td>

			<td></td>
			<td></td>
		</tr>
		<tr style="font-weight:bold;">
			<td class="center">TOTAL</td>
			<td>{{$totalamouta}}</td>
			<td></td>
			<td class="center">TOTAL</td>
			<td>{{$totalamoutb}}</td>
			<td></td>
		</tr>
</table>

</div>
<!------------------------------------------------->


</body>

</html>
