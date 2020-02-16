<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Grants/Subsidies (Irrevocable Grants Received)</title>
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
@php $totalamout=0;
$totalamoutall=0;
$totalamoutinterest=0;
$totalamout6s=0;
$totalamout8s=0;
$totalamout9s=0;
$totalamout5s=0;
$totalamout7s=0;
$totalamoutdip=0;
$totalamoutgra=0;
$gradtotalamout=0;
$gradtotalamoutall=0;
@endphp
@foreach ($financial_year as $value)
 @if($value->transaction_code=='4S/000/001')
 @php $totalamout+= $value->net_amt; @endphp
@endif
@if($value->transaction_code=='4S/000/002')
@php $totalamoutinterest+= $value->net_amt; @endphp
@endif
@endforeach
@foreach ($balance6s_year as $value)
@php $totalamout6s+= $value->net_amt; @endphp

@endforeach
@foreach ($balance8s_year as $value)
@php $totalamout8s+= $value->net_amt; @endphp

@endforeach
@foreach ($balance9s_year as $value)

@php   $totalamoutgra+= $value->graduate @endphp
@php   $totalamoutdip+= $value->diploma @endphp
@endforeach
@foreach ($balance5s_year as $value)

@php $totalamout5s+= $value->net_amt; @endphp

@endforeach
@foreach ($balance7s_year as $value)

@php $totalamout7s+= $value->net_amt; @endphp

@endforeach


@php   $totalamout9s= $totalamoutgra+$totalamoutdip;
      $gradtotalamout=$totalamout9s+$totalamout8s+$totalamout7s-$totalamout6s-$totalamout5s;

 @endphp



 @php   $totalamoutall=$totalamout+0;
  $gradtotalamoutall=  $totalamoutall-$gradtotalamout; @endphp

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
				<h4 style="text-transform: uppercase;">Stipend Account</h4>
				<h4 style="text-transform: uppercase;">Schedule Forming Part of Balance Sheet as at 31st March, 2020</h4>

				</div>

			</td>
			</tr>
			<tr><td colspan="2"><h4 style="text-transform: uppercase;text-decoration:underline;">Schedule 4S - Grants/Subsidies (Irrevocable Grants Received)</h4></td></tr>
		</table>
		<table>
			<tr>
		<th style="padding:4px;" class="right">Amount in Rupees</th>
	</tr>
		</table>

<table border="1" style="width:100%;border-collapse:collapse;border:1px solid #000;margin-bttom:10px;">
	<thead>

		<tr>
			<th style="padding:4px;" rowspan="3" class="center">Particulars</th>

			<th style="padding:4px;" colspan="3">Plan</th>
			<th style="padding:4px;" rowspan="3">Total Plan</th>
			<th style="padding:4px;" rowspan="3">Non Plan <br>Govt. of India</th>
			<th style="padding:4px;" rowspan="3">Current <br>Year<br> Total</th>
			<th style="padding:4px;" rowspan="3">Previous <br>Year<br> Total</th>
		</tr>
		<tr>
			<th style="padding:4px;" rowspan="2">Govt. of<br>India</th>
			<th style="padding: 4px;" colspan="2">UGC</th>
		</tr>
		<tr>
			<td style="padding: 4px;" class="center"><b>Plan</b></td>
			<td style="padding: 4px;" class="center"><b>Specific<br>Schemes</b></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Balance B/F</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">0</td>
			<td class="right">-</td>
		</tr>


		<tr>
			<td>Add: Receipts during the year</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">{{$totalamout}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Add: Interest Earned</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">{{$totalamoutinterest}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="center"><b>Total</b></td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">{{$totalamout}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Less: Refund to UGC</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Balance</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">{{ $totalamoutall}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Less: Utilised for Capital Expenditure (A)</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Balance</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">{{ $totalamoutall}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>Less: utilized for Revenue Expenditure (B)</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">{{$gradtotalamout}}</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="center"><b>Balance C/F (C)</b></td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">-</td>
			<td class="right">{{$gradtotalamoutall}}</td>
			<td class="right">-</td>
		</tr>
</table>



</div>
<!------------------------------------------------->


</body>

</html>
