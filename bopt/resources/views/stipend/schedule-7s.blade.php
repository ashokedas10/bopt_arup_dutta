<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training |Administrative and General Expenses</title>
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
@php $totalamout=0;
@endphp
@foreach ($financial_year as $value)
                    @php   $totalamout+= $value->net_amt @endphp
                 @endforeach
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
				<h4 style="text-transform: uppercase;">Schedule Forming Part of Balance Sheet as at 31st March, 2019</h4>

				</div>

			</td>
			</tr>
			<tr><td colspan="2"><h4 style="text-transform: uppercase;text-decoration:underline;">Schedule - 7S - Administrative and General Expenses</h4></td></tr>
		</table>
		<table>
			<tr>
		<th style="padding:4px;" class="right">Amount in Rupees</th>
	</tr>
		</table>

<table border="1" style="width:100%;border-collapse:collapse;border:1px solid #000;margin-bttom:10px;">
	<thead>

		<tr>
			<th style="padding:4px;"></th>

			<th style="padding:4px;" rowspan="2">Current Year</th>
			<th style="padding:4px;">Previous Year</th>
		</tr>
		<tr>
			<th style="padding:4px;"></th>


			<th style="padding:4px;">Total</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>A Infrastructure</b></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">a) Electricity and power</td>

			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">b) Water Charges</td>

			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">c) Insurance</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">d) Rent, Rates and Taxes (Including property tax)</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td><b>B Communication</b></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">e) Postage and Stationery</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">f) Telephone, Fax and Internet Charges</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td><b>C Others</b></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">g) Printing and Stationery (consumption)</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">h) Travelling and Conveyance Expenses</td>

			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">i) Hospitality</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">j) Auditors Remuneration</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">k) Professional Charges</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">l) Advertisement and Publicity</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">m) Magazines & Journals</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">n) Others (specify)</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub2">-Other Administrative Exp. and bank Commission</td>
			<td class="right">{{$totalamout}}</td>
			<td class="right">-</td>
		</tr>

		<tr>
			<td class="right"><b>TOTAL</b></td>
			<td class="right"><b>{{$totalamout}}</b></td>
			<td class="right"><b>-</b></td>
		</tr>
</table>



</div>
<!------------------------------------------------->


</body>

</html>
