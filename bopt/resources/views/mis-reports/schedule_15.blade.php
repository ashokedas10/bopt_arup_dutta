<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Schedule 15 </title>
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
.center{text-align:center;}.right{text-align:right;}.sub2 span{font-weight:600;}
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
  .payslip table.spcl{page-break-after: always;}
 @page {
	size:auto;
    margin-top:10px;
	margin-bottom: 10px;

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
				<h3 style="text-align:center;margin:0;">Establishment Account</h3>
				<h4>Schedule 15 - Staff Payments &amp; Benefits (Establishment Expenses)</h4>
				</div>

			</td>
			</tr>
		</table>

<table class="spcl" border="1" style="width:100%;border-collapse:collapse;">
	<thead>
		<thead style="background:#f5f4f4;">
		<tr>
		<th colspan="5" style="border-left:none;" class="right">Amount in Rs.</th></tr>
			<tr>
				<th rowspan="2" style="padding:4px;width:60%;">Particulars</th>
				<th style="padding:4px;width:10%;">Current Year</th>
				<th colspan="3" style="padding:4px;width:30%;">Previous Year</th>
			</tr>
			<tr>
				<th style="padding:4px;width:10%;">Total</th>
				<th style="padding:4px;width:10%;"></th>
				<th style="padding:4px;width:10%;"></th>
				<th style="padding:4px;width:10%;">Total</th>
			</tr>
		</thead>
		<tbody>
                @php $total_amt = 0; @endphp
                @foreach($currentyear_income_list as $schedule_expense)

			<tr>
				<td style="padding:3px;">{{ $schedule_expense['account_name'] }}</td>
				<td class="right" style="padding:3px;"></td>
                <td class="right" style="padding:3px;">-</td>
                <td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
            </tr>
            @if(!empty($schedule_expense['sub_accountlist']))
                @foreach($schedule_expense['sub_accountlist'] as $sub_act)
                @php $total_amt += $sub_act['total_amt']; @endphp
            <tr>
                <td style="padding:3px;">{{ $loop->iteration }}) {{ $sub_act['sub_account_name'] }}({{ $sub_act['coa_code'] }})</td>
                <td class="right" style="padding:3px;">{{$sub_act['total_amt']}}</td>
                <td class="right" style="padding:3px;">-</td>
                <td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
            </tr>
            @endforeach
            @else
            {{-- <tr>
                    <td style="padding:3px;">{{ $schedule_expense['account_name'] }}</td>
                    <td class="right" style="padding:3px;"></td>
                    <td class="right" style="padding:3px;">-</td>
                </tr> --}}
                <tr>
                    <td style="padding:3px;">{{ $loop->iteration }}) {{ $schedule_expense['account_name'] }}</td>
                    <td class="right" style="padding:3px;">{{$sub_act['total_amt']}}</td>
                    <td class="right" style="padding:3px;">-</td>
                    <td class="right" style="padding:3px;">-</td>
				    <td class="right" style="padding:3px;">-</td>
                </tr>
            @endif
            @endforeach


			<tr>
				<td class="center" style="padding:3px;"><b>Total</b></td>
            <td class="right" style="padding:3px;"><b>{{ $total_amt }}</b></td>
				<td class="right" style="padding:3px;"><b>-</b></td>
				<td class="right" style="padding:3px;"><b>-</b></td>
				<td class="right" style="padding:3px;"><b>-</b></td>
			</tr>

		</tbody>
	</thead>
</table>


{{-- <!--------------------schedule-15a------------------------->
<div class="payslip">
<table class="comp-det" style="width:100%;margin-top:2%">
		<tr>


			<td>
				<div class="text-center pay-head" style="margin-bottom:20px;">

				<h4>Schedule 15a - Employees Retirement and Terminal Benefits</h4>
				</div>

			</td>
			</tr>
		</table>

<table class="spcl" border="1" style="width:100%;border-collapse:collapse;">
	<thead>
		<thead style="background:#f5f4f4;">
		<tr>
		<th colspan="5" style="border-left:none;" class="right">Amount in Rs.</th></tr>

			<tr>
				<th style="padding:4px;width:60%">Particulars</th>
				<th style="padding:4px;width:10%;">Pension</th>
				<th style="padding:4px;width:10%;">Gratuity</th>
				<th style="padding:4px;width:10%;">Leave Encashment</th>
				<th style="padding:4px;width:10%;">Total</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="padding:3px;">Opening Balance as on 01.04.2018</td>
				<td style="padding:3px;" class="right">3,14,79,783.00</td>
				<td style="padding:3px;" class="right">-</td>
				<td style="padding:3px;" class="right">-</td>
				<td style="padding:3px;" class="right">3,19,14,438.00</td>
			</tr>
			<tr>
				<td style="padding:3px;">Addition: Capitalized value of contributions received from other Organizations</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;"><b>Total (a)</b></td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">Less:Actual Payment during the year (b)</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">Balance available on 31.03.2019 c(a-b)</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">Less:excess liability written back</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">Balance available on 31.03.2019 (d)</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">Provision required on 31.03.2019 as per Actuarial Valuation (e)</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">A. Provision to be made in the Current (e-d)</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">B. Contribution to New Pension Scheme</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">C. Medica Reimbursement to retired employees</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">D. Travel to hometown on retirement</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;">E. Deposit Linked insurance payment</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>

			<tr>
				<td class="center" style="padding:3px;"><b>Total (A+B+C+D+E)</b></td>
				<td class="right" style="padding:3px;"><b>-</b></td>
				<td class="right" style="padding:3px;"><b>-</b></td>
				<td class="right" style="padding:3px;"><b>-</b></td>
				<td class="right" style="padding:3px;"><b>-</b></td>
			</tr> --}}

		</tbody>
	</thead>
</table>
<!------------------------------------------>
</div>
<!------------------------------------------------->


</body>

</html>