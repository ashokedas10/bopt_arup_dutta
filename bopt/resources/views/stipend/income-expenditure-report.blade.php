<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training |Income Expenditure Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <style>
body {-webkit-print-color-adjust: exact;font-family:cambria;}
payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 35px;color: #000;text-align:center;margin:0;}
	.payslip .pay-head h4 {font-size: 17px;text-align:center;margin:0;}
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
@endphp
@foreach ($financial_year as $value)
 @if($value->transaction_code=='5S/001')
 @php $totalamout5s+= $value->net_amt; @endphp
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
                 $totalamoutb=$totalamout8s+$totalamoutall+$totalamout7s;
                 $totalamouta=$gradtotalamout+$totalamout5s+$totalamout6s;
                 @endphp


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
				<h4 style="text-transform:uppercase;">Stipend Account</h4>
				<h4 style="text-transform:uppercase;">Income Expenditure Account for the Year Ended 31st March 2019</h4>
				</div>

			</td>
			</tr>
		</table>
		<table><tr>
		<th colspan="4" style="padding:4px;" class="right">Amount in Rupees</th>
	</tr></table>

<table border="1" style="width:100%;border-collapse:collapse;border:1px solid #000;margin-bttom:10px;">
	<thead>

		<tr>
			<th style="padding:4px;">Particulars</th>
			<th style="padding:4px;">Schedule</th>
			<th style="padding:4px;">Current Year</th>
			<th style="padding:4px;">Previous Year</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>INCOME</b></td>
			<td></td>
			<td class="right"></td>
			<td class="right"></td>
		</tr>
		<tr>
			<td>Academic Receipts</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Grants / Subsidies</td>
			<td class="center">4S</td>
            <td class="right">{{$gradtotalamout}}</td>
			<td class="right"></td>
		</tr>
		<tr>
			<td>Income from Investments</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>

		<tr>
			<td>Interest earned</td>
			<td class="center">5S</td>
			<td class="right">{{$totalamout5s}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Other Income</td>
			<td class="center">6S</td>
			<td class="right">{{$totalamout6s}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Prior Period Income</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="center"><b>TOTAL(A)</b></td>
			<td></td>
			<td class="right">{{$totalamouta}}</td>
			<td class="right">-</td>
		</tr>

		<tr>
			<td><b>EXPENDITURE</b></td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Staff Payments & Benefits (Establishment expenses)</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Academic Expenses</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Adminstrative and General Expenses</td>
			<td class="center">7S</td>
			<td class="right">{{$totalamout7s}}</td>
			<td class="right">-</td>
		</tr>

		<tr>
			<td>Transportation Expenses</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Repairs & Maintenance</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Finance costs</td>
			<td class="center">8S</td>
			<td class="right">{{$totalamout8s}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Depreciation</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Other Expenses (Expenditure on Grants to disbursed as stipend to training establishment.)</td>
			<td class="center">9S</td>
			<td class="right">{{$totalamoutall}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Prior Period Expenses</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="center"><b>TOTAL(B)</b></td>
			<td></td>
			<td class="right">{{$totalamoutb}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Balance being excess of Income over Expenditure/Expenditure over Income (A-B)</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Transfer to/from Designated Fund</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Building fund</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Others (specify)</td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td><b>Balance Being Surplus/(Deficit) Carried to Capital Fund/Corplus Fund</b></td>
			<td></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
</table>

<table style="margin-top:25px;">


<tr>
			<td style="border:none;"><b>Significant Accounting Policies</b></td>
			<td style="width:170px;border:none;">23</td>
			<td class="right" style="border:none;">&nbsp;</td>
			<td class="right" style="border:none;">&nbsp;</td>
		</tr>

		<tr>
			<td style="border:none;"><b>Contingent Liabilities and Notes to Accounts</b></td>
			<td style="width:170px;border:none;">24</td>
			<td class="right" style="border:none;">&nbsp;</td>
			<td class="right" style="border:none;">&nbsp;</td>
		</tr>

</table>

</div>
<!------------------------------------------------->


</body>

</html>
