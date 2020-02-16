<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Schedule 3 | Current Liabilities &amp; Provisions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <style>
body {-webkit-print-color-adjust: exact;font-family:cambria;}
payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 35px;color: #000;text-align:center;margin:0;}
	.payslip .pay-head h4 {font-size: 18px;text-align:center;margin:0;}
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
.sub2{padding:3px 3px 3px 9%;}
.lia{font-size:11px;}
	@media print
{
 table {page-break-after: auto;}
  tr    {page-break-inside:avoid !important; page-break-after:auto !important; }
  td    { page-break-inside:avoid !important; page-break-after:auto !important; }
  thead {display: table-header-group !important;}

  tfoot { display:table-footer-group !important;}
 @page {
	size:auto;
    margin-top:25px;
	margin-bottom: 25px;

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
                <h4 style="text-transform:uppercase;">Schedules Forming Part of Balance sheet as on 31st march 2019</h4>

				</div>

			</td>
            </tr>
            <tr><td colspan="2"><h4 style="text-decoration:underline;text-transform:uppercase;font-size:13px;">Schedule 3 - Current Liabilities &amp; Provisions</h4></td></tr>
		</table>
        <table>

            <tr><th style="text-align:right;font-size:12px;"><b>Amount in Rupees</b></th></tr>
        </table>
<table class="lia" border="1" style="width:100%;border-collapse:collapse;">
	<thead>
		<thead style="background:#f5f4f4;">

			<tr>
				<th style="padding:2px;"></th>
				<th style="padding:2px;">Current Year</th>
				<th style="padding:2px;">Previous Year</th>
			</tr>
			<tr>
			<th class="left">A. CURRENT LIABILITIES</th>
			<th></th>
			<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="padding:2px;">1. Deposits from staff</td>
				<td style="padding:2px;"></td>
				<td style="padding:2px;"></td>
			</tr>
			<tr>
				<td style="padding:2px;">2. Deposits from students</td>
				<td style="padding:2px;"></td>
				<td style="padding:2px;"></td>
			</tr>
			<tr>
				<td style="padding:2px;">3. Sundry Creditors</td>
				<td style="padding:2px;"></td>
				<td style="padding:2px;"></td>
			</tr>
			<tr>
				<td class="sub">a) For Goods &amp; Services</td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">b) Others</td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:2px;">4. Deposit-Others (including EMD, Security Deposit)</td>
				<td class="right" style="padding:2px;"></td>
				<td class="right" style="padding:2px;"></td>
			</tr>
			<tr>
				<td style="padding:2px;">5. Statutory Liabilities (GPF, TDS, WC, TAX, CPF, GIS, NPS):</td>
				<td style="padding:2px;"></td>
				<td style="padding:2px;"></td>
			</tr>
			<tr>
				<td class="sub">a) Overdue</td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub">b) Others</td>
				<td style="padding:2px;" class="right">@if(!empty($overdue_other)){{$overdue_other[0]->overdue_other_amt}} @endif</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td style="padding:2px;">6. Other Current Liabilities</td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub">a) Salaries</td>
				<td style="padding:2px;" class="right"></td>
				<td class="right" style="padding:2px;"></td>
			</tr>
			<tr>
				<td class="sub">b) Receipts against sponsored projects</td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub">c) Receipts against sponsored fellowships &amp; scholerships</td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub">d) Unutilised Grants</td>
				<td style="padding:2px;" class="right"></td>
				<td class="right" style="padding:2px;"></td>
			</tr>
			<tr>
				<td class="sub">e) Grants in advance</td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub">f) Other funds</td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub">g) <b>Other Liabilities</b></td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub2">i) Print GSLI, Fire, Pension, Gratuity</td>
				<td style="padding:2px;" class="right">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub2">ii) Liabilities for CEA</td>
				<td style="padding:2px;" class="right">@if(!empty($cea_liabilities)){{$cea_liabilities[0]->cea_liabilities_amt}} @endif</td>
				<td class="right" style="padding:2px;"></td>
			</tr>
			<tr>
				<td class="sub2">iii) Liabilities for Pay &amp; Allowances</td>
				<td style="padding:2px;" class="right">@if(!empty($pay_allowances)){{$pay_allowances[0]->pay_allowances_amt}} @endif</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub2">iv) Liabilities for ERP</td>
				<td style="padding:2px;" class="right">@if(!empty($libalities_erp)){{$libalities_erp[0]->libalities_erp_amt}} @endif</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub2">v) Liabilities for leased line charges</td>
				<td style="padding:2px;" class="right">@if(!empty($leaseline_charges)){{$leaseline_charges[0]->leaseline_charges_amt}} @endif</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub2">vi) Liabilities for GADP Exp.</td>
				<td style="padding:2px;" class="right"></td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub2">vii) Liabilities for Telephone Charge</td>
				<td style="padding:2px;" class="right">@if(!empty($liabilities_telephone_chages)){{$liabilities_telephone_chages[0]->liabilities_telephone_chages_amt}} @endif</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub2">viii) Liabilities for Administrative Charges</td>
				<td style="padding:2px;" class="right"></td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			@php
			$total=0;
			$total= $overdue_other[0]->overdue_other_amt+$cea_liabilities[0]->cea_liabilities_amt+$pay_allowances[0]->pay_allowances_amt+$libalities_erp[0]->libalities_erp_amt+$leaseline_charges[0]->leaseline_charges_amt+$liabilities_telephone_chages[0]->liabilities_telephone_chages_amt;
			@endphp
			<tr>
				<td class="center"><b>Total(A)</b></td>
				<td class="right"><b>{{$total}}</b></td>
				<td class="right"><b></b></td>
			</tr>
			<tr>
				<td style="padding:2px;"><b>B. PROVISIONS</b></td>
				<td class="right" style="padding:2px;"></td>
				<td class="right" style="padding:2px;"></td>
			</tr>


			<tr>
				<td style="padding:2px;">1. For Taxation</td>
				<td class="right" style="padding:2px;">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">2. Gratuity</td>
				<td class="right" style="padding:2px;">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td style="padding:2px;">3. Superannuation Pension</td>
				<td class="right" style="padding:2px;">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">4. Accumulated Leave Encashment</td>
				<td class="right" style="padding:2px;"></td>
				<td class="right" style="padding:2px;"></td>
			</tr>
			<tr>
				<td style="padding:2px;">5. Trade Warranties/Claims</td>
				<td class="right" style="padding:2px;">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td style="padding:2px;">6. Others (Provision for Audit fee, Security Deposit)</td>
				<td class="right" style="padding:2;">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub">a) Provision for Audit Fee</td>
				<td class="right" style="padding:2px;"></td>
				<td class="right" style="padding:2px;"></td>
			</tr>
			<tr>
				<td class="sub">b) Provision for Security Deposit</td>
				<td class="right" style="padding:2px;"></td>
				<td class="right" style="padding:2px;"></td>
			</tr>
			<tr>
				<td class="sub">c) Provision for Mediclaim Employee</td>
				<td class="right" style="padding:2px;">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="sub">d) Provision for Misc. Recovery</td>
				<td class="right" style="padding:2x;">-</td>
				<td class="right" style="padding:2px;">-</td>
			</tr>
			<tr>
				<td class="center"><b>Total(B)</b></td>
				<td class="right" style="padding:2px;"><b></b></td>
				<td class="right" style="padding:2px;"><b></b></td>
			</tr>
			<tr>
				<td class="center"><b>Total(A+B)</b></td>
				<td class="right" style="padding:2px;"><b>{{$total}}</b></td>
				<td class="right" style="padding:2px;"><b></b></td>
			</tr>

		</tbody>
	</thead>
</table>

</div>
<!------------------------------------------------->


</body>

</html>
