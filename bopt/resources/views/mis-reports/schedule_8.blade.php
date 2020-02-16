<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Schedule 8 | Loan | Advances | Deposits</title>
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
                <h4 style="text-transform:uppercase;font-size:16px;">Schedules Forming Part of Balance sheet as on 31st march 2019</h4>

				</div>

			</td>
            </tr>
            <tr><td colspan="2"><h4 style="text-decoration:underline;text-transform:uppercase;font-size:13px;">Schedule 8 - Loans, Advances &amp; Deposits</h4></td></tr>
		</table>
        <table>

            <tr><th style="text-align:right;font-size:13px;"><b>Amount in Rupees</b></th></tr>
        </table>
<table border="1" style="width:100%;border-collapse:collapse;font-size:12px;">
	<thead>
		<thead style="background:#f5f4f4;">

			<tr>
				<th style="padding:4px;"></th>
				<th style="padding:4px;">Current Year</th>
				<th style="padding:4px;">Previous Year</th>
			</tr>

		</thead>
		<tbody>
			<tr>
				<td style="padding:3px;">1. Advances to employees (Non-interest bearing)</td>
				<td style="padding:3px;">-</td>
				<td style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">a) Salary</td>
				<td style="padding:3px;"></td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td class="sub">b) Festival</td>
				<td style="padding:3px;">@if(!empty($festival_other)){{$festival_other[0]->festival_other_amt}} @endif</td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td class="sub">c) Medical advance</td>
				<td style="padding:3px;">@if(!empty($medical_advance)){{$medical_advance[0]->medical_advance_amt}} @endif</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">d) Other (LTC ADVANCE)</td>
				<td style="padding:3px;">@if(!empty($other_ltc_advance)){{$other_ltc_advance[0]->other_ltc_advance_amt}} @endif</td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td style="padding:3px;">2. Long Term Advances to employees: (Interest bearing)</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">a) Vehicle Loan</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>

			<tr>
				<td class="sub">b) Home Loan</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">c) Others (Computer Loan)</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td style="padding:3px;">3. Advances and other amounts recoverable in cash or in kind or for value to be received:</td>
				<td class="right" style="padding:3px;"></td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td class="sub">a) On Capital Account</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">b) To Suppliers</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">c) Others (Specify)</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub2">i) Advance to NTMIS</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub2">ii) Security Deposit to WBSEB</td>
				<td class="right" style="padding:3px;">@if(!empty($security_deposit)){{$security_deposit[0]->security_deposit_amt}} @endif</td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td class="sub2">iii) Advance to CPWD</td>
				<td class="right" style="padding:3px;"></td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td style="padding:3px;">4. Prepaid Expenses</td>
				<td class="right" style="padding:3px;"></td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td class="sub">a) Insurance</td>
				<td class="right" style="padding:3px;">@if(!empty($insurance)){{$insurance[0]->insurance_amt}} @endif</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">b) Other expenses</td>
				<td class="right" style="padding:3px;">@if(!empty($other_expenses)){{$other_expenses[0]->other_expenses_amt}} @endif</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">5. Deposits</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">a) Telephone</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">b) Lease Rent</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">c) Electricity</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">d) AICTE, if applicable</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">d) Others (to be specified)</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
				<tr>
				<td style="padding:3px;">6. Income Accrued</td>
				<td class="right" style="padding:3px;"></td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td class="sub">a) On Investments from Earmarked/Endowment Funds</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">b) On Investments-Others</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">c) On Loans and Advances</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">d) Others (includes income due unrealized)</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">7. Other-Current assets receivable from UGC/sponsored projects</td>
				<td class="right" style="padding:3px;"></td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td class="sub">a) Debit balances in Sponsored Projects</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">b) Debit balances in Sponsored Fellowships &amp; Scholarships</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">c) Grants Receivable</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">d) Other receivables from UGC</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">8. Claims Receivable</td>
				<td class="right" style="padding:3px;"></td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td style="padding:3px;">9. Advance to NILERED</td>
				<td class="right" style="padding:3px;"></td>
				<td class="right" style="padding:3px;">-</td>
			</tr>

			@php
			$total=0;
			$total= $medical_advance[0]->medical_advance_amt+$medical_advance[0]->medical_advance_amt+$other_ltc_advance[0]->other_ltc_advance_amt + $security_deposit[0]->security_deposit_amt + $insurance[0]->insurance_amt + $other_expenses[0]->other_expenses_amt;
			@endphp
			<tr>
				<td style="padding:3px;text-align:center;"><b>TOTAL</b></td>
				<td class="right" style="padding:3px;"><b>{{$total}}</b></td>
				<td class="right" style="padding:3px;"><b></b></td>
			</tr>
		</tbody>
	</thead>
</table>

</div>
<!------------------------------------------------->


</body>

</html>
