<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training Schedule 1 | Corpus / Capital Fund</title>
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
                <h4>As on 31st March 2019 in respect of Establishment Account</h4>

				</div>

			</td>
            </tr>
            <tr><td colspan="2"><h4 style="text-decoration:underline; text-transform:uppercase;">Schedule 1 - Corpus / Capital Fund</h4></td></tr>
		</table>

<table>

    <tr><th style="text-align:right;"><b>Amount in Rupees</b></th></tr>
</table>
<!--------------------------fund-body------------------------>
<table border="1" style="border-collapse:collapse;width:100%;">
	<thead style="background:#ddd;">
		<tr>
			<th colspan="2" style="padding:3px;">Particulars</th>
			<th style="padding:3px;">Current Year</th>
			<th style="padding:3px;">Previous Year</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td style="padding:3px;"></td>
			<td style="padding:3px;">Balance at the beginning of the year</td>
			<td style="padding:3px;">-</td>
			<td style="padding:3px;">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Add:</td>
			<td style="padding:3px;">Contributions towards Corpus/Capital Fund</td>
			<td style="padding:3px;">-</td>
			<td style="padding:3px;">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Add:</td>
			<td style="padding:3px;">Grants from UGC, Government of India and State Government to the extent utilized for capital expenditure</td>
			<td style="padding:3px;">@if(!empty($grant_sum)){{$grant_sum[0]->grant_sum_amt}} @endif</td>
			<td style="padding:3px;">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Add:</td>
			<td style="padding:3px;">Assets Purchased out of Earmarked Funds</td>
			<td style="padding:3px;">-</td>
			<td style="padding:3px;">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Add:</td>
			<td style="padding:3px;">Assets Purchased out of Sponsored projects, where ownership vests in the institution</td>
			<td style="padding:3px;">-</td>
			<td style="padding:3px;">-</td>
		</tr>
<tr>
			<td style="padding:3px;">Add:</td>
			<td style="padding:3px;">Assets Donated/Gifts Received</td>
			<td style="padding:3px;">-</td>
			<td style="padding:3px;">-</td>
		</tr>

<tr>
			<td style="padding:3px;">Add:</td>
			<td style="padding:3px;">Othet Additions</td>
			<td style="padding:3px;">-</td>
			<td style="padding:3px;">-</td>
		</tr>

<tr>
	<td style="padding:3px;">Add:</td>
	<td style="padding:3px;">Excess of Income over expenditure transferred from the Income &amp; Expenditure Account</td>
	<td style="padding:3px;">-</td>
	<td style="padding:3px;">-</td>
</tr>
@php
$total=0;
$total= $grant_sum[0]->grant_sum_amt;
@endphp
<tr>
<td style="padding:3px;"></td>
	<td style="padding:3px;"><b>Total</b></td>
	<td style="padding:3px;">{{ $total }}</td>
	<td style="padding:3px;">-</td>
</tr>
<tr>
	<td style="padding:3px;"><b>(Deduct)</b></td>
	<td style="padding:3px;">Deficit transferred from the Income &amp; expenditure Account</td>
	<td style="padding:3px;">-</td>
	<td style="padding:3px;">-</td>
</tr>
<tr>
<td style="padding:3px;"></td>

	<td style="padding:3px;" class="center"><b>Balance at the year end</b></td>
    <td style="padding:3px;">{{ $total }}</td>
	<td style="padding:3px;">-</td>
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
