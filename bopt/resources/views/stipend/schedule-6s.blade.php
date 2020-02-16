<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Other Income</title>
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
				<h4 style="text-transform: uppercase;">Schedule Forming Part of Balance Sheet as at 31st March, 2020</h4>

				</div>

			</td>
			</tr>
			<tr><td colspan="2"><h4 style="text-transform: uppercase;text-decoration:underline;">Schedule 6S - Other Income</h4></td></tr>
		</table>
		<table>
			<tr>
		<th style="padding:4px;" class="right">Amount in Rupees</th>
	</tr>
		</table>

<table border="1" style="width:100%;border-collapse:collapse;border:1px solid #000;margin-bttom:10px;font-size:14px;">
	<thead>

		<tr>
			<th style="padding:4px;" class="left">A. Income from Land & Buildings</th>

			<th style="padding:4px;">Current Year</th>
			<th style="padding:4px;">Previous Year</th>
		</tr>

	</thead>
	<tbody>
		<tr>
			<td class="sub">1. Hostel Room Rent</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>

		<tr>
			<td class="sub">2. License fee</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">3. Hire Charges of Auditorium/Play ground/Convention Centre, etc.</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">4. Electricity charges recovered</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">5. Water charges recovered</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="right"><b>Total</b></td>
			<td class="right"><b>-</b></td>
			<td class="right"><b>-</b></td>
		</tr>
		<tr>
			<td><b>B. Sale of Institute's publications</b></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td class="right">&nbsp;</td>
			<td class="right">&nbsp;</td>
		</tr>
		<tr>
			<td><b>C. Income from holding events</b></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td>1. Gross Receipts from annual function/sports carnival</td>
			<td class="right">&nbsp;</td>
			<td class="right">&nbsp;</td>
		</tr>
		<tr>
			<td class="sub"><b>Less:</b> Direct expenditure incurred on the annual function/sports carnival</td>
			<td class="right">-;</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">2. Gross Receipts from fetes</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub"><b>Less:</b> Direct expenditure incurred on the fetes</td>
			<td class="right">-;</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">3. Gross Receipts for educational tours</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub"><b>Less:</b> Direct expenditure incurred on the tours</td>
			<td class="right">-;</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">4. Others (to be specified and seperately disclosed)</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="right"><b>Total</b></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td><b>D. Others</b></td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">1. Income from consutancy</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">2. RTI fees</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">3. Income from Royalty</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">4. Sale of application from (recruitment)</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">5. Misc. receipts (Sale of tender form, waste paper, etc.)</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">6. Profit on Sale/disposal of Assets</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub2">a) Owned assets</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub2">b) Assets received free of cost</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">7. Grants/Donations from Institutions, Welfare Bodies and International Organizations</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub">8. Others (specify)</td>
			<td class="right">-</td>
			<td class="right">-</td>
		</tr>
		<tr>
			<td class="sub2">a) Time barred cheques</td>
			<td class="right"></td>
			<td class="right">-</td>
        </tr>
        <tr>
			<td><b>Total</b></td>
			<td class="right"><b>{{$totalamout}}</b></td>
			<td class="right"><b>-</b></td>
		</tr>
        <tr>
			<td><b> Grand Total (A+B+C+D)</b></td>
			<td class="right"><b>{{$totalamout}}</b></td>
			<td class="right"><b>-</b></td>
		</tr>

</table>



</div>
<!------------------------------------------------->


</body>

</html>
