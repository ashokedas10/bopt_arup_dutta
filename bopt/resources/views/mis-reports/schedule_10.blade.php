<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Schedule 10 | Grants/Subsidies (Irrevocable Grants Received)</title>
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
                <h3 style="text-align:center;margin:0;text-transform:uppercase;">Establishment Account</h3>
                <h4 style="text-transform:uppercase;">Schedules Forming part of Income &amp; Expenditure for the Year ended 31st March 2019</h4>
				</div>

			</td>
            </tr>

                <tr><td colspan="2"><h4 style="text-decoration:underline;text-transform:uppercase;">Schedule 10 - Grants/Subsidies (Irrevocable Grants Received)</h4></td></tr>
		</table>
        <table>

            <tr><th style="text-align:right;"><b>Amount in Rupees</b></th></tr>
        </table>
<table border="1" style="width:100%;border-collapse:collapse;border:1px solid #000;">
	<thead style="background:#f5f4f4;">

		<tr>
			<th rowspan="3" style="padding:3px;width:550px;">Particulars</th>
			<th colspan="3" style="padding:3px;">Plan</th>
			<th rowspan="3" style="padding:3px;">Total Plan</th>
			<th rowspan="3" style="padding:3px;width:250px;">Non Plan<br> Govt. of India (UGC not pertain to this Board)</th>
			<th rowspan="3" style="padding:3px;">Current Year Total</th>
			<th rowspan="3" style="padding:3px;">Previous Year Total</th>
		</tr>

		<tr>
			<th rowspan="2" style="padding:3px;">Govt. of India</th>
			<th colspan="2" style="padding:3px;">UGC</th>
		</tr>
		<tr>
			<th style="padding:3px;">Plan</th>
			<th style="padding:3px;">Specific Schemes</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="padding:3px;">Balance B/F</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Add:Receipts during the year</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">@if(!empty($total_received_amount)){{$total_received_amount[0]->total_amt}} @endif</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Add:Interest Earned (Sch-12)</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Add:Other Income (Sch-13)</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
        </tr>
        @php
            $total=0;
            $total= $total_received_amount[0]->total_amt;
        @endphp
		<tr>
			<td style="padding:3px;" class="right"><b>Total</b></td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">{{ $total }}</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Less:Refund to UGC</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
        </tr>
        <tr>
			<td style="padding:3px;" class="right"><b>Balance</b></td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">{{ $total }}</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Less:Utilised for Cpital expenditure (A)</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="right"><b>Balance</b></td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">{{ $total }}</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;">Less:Utillized for Revenue Expenditure (B)</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>

		<tr>
			<td style="padding:3px;" class="right"><b>Balance C/F (C)</b></td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">{{ $total }}</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
	</tbody>
</table>

</div>
<!------------------------------------------------->


</body>

</html>
