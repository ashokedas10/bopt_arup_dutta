<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Summary of GPF</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <style>
body {-webkit-print-color-adjust: exact;font-family:Arial;}
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
	.sub{padding-left:30px;}.sub2{padding-left:40px;}
	.pl20{padding-left:20px;}
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
	size:landscape;
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
			<h4>Summary of GPF for the Year ended 31st March, {{ $end_year }}</h4>
			</div>
		</td>
	</tr>
</table>


<!--------------------------fund-body------------------------>

<table border="1" style="border-collapse:collapse;width:100%;FONT-SIZE:13PX;">

	<thead>

		<tr>
			<th style="padding:4px;">SL. NO.</th>
			<th style="padding:4px;">NAME</th>
			<th style="padding:4px;">DESIGNATION</th>
			<th style="padding:4px;">PF NO.</th>
			<th style="padding:4px;">L/F NO.</th>
			<th style="padding:4px;">OPENING BALANCE AS ON 01-04-{{$start_year}}</th>
			<th style="padding:4px;">PF CATEGORY</th>
			<th style="padding:4px;">CONTRIBUTION DURING THE YEAR</th>
			<th style="padding:4px;">CONTRIBUTION DEPOSITED DURING THE YEAR {{$start_year}}-{{$end_year}}</th>
			<th style="padding:4px;">GPF RECOVERY FOR {{$start_year}}-{{$end_year}}</th>
			<th style="padding:4px;">WITHDRAWAL ADVANCE FOR {{$start_year}}-{{$end_year}}</th>
			<th style="padding:4px;">INTEREST FOR {{$start_year}}-{{$end_year}}</th>
			<th style="padding:4px;">BALANCE AS ON 31-03-{{$end_year}}</th>
		</tr>

	</thead>
	<tbody style="border:none;">

		@if(!empty($employee_gpf))
		@php  $total_own_share=0;
              $total_company_share=0;
              $total_with_drawal=0;
              $total_closing_balance=0;
              $opening_balance=0;
              $interest_amount=0;
		@endphp
		@foreach($employee_gpf as $employeegpf)
		<tr>
			<td style="padding:3px;border:none;" class="center">{{ $loop->iteration}}</td>
			<td style="padding:3px;border:none;" class="left">{{ $employeegpf['emp_name']}}</td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf['emp_designation']}}</td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf['pf_no']}}</td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf['opening_balance']}}</td>
			<td style="padding:3px;border:none;" class="center">GPF</td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf['single_contribution_year']}}</td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf['contribution_during_year']}}</td>
			<td style="padding:4px;border:none;" class="right">-</td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf['with_drawal']}}</td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf['interest_amount']}}</td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf['opening_balance']+$employeegpf['interest_amount']+$employeegpf['single_contribution_year']-$employeegpf['with_drawal']}}</td>
		</tr>

		@php  
			$total_own_share+=$employeegpf['single_contribution_year'];
            $total_company_share+=$employeegpf['contribution_during_year'];
            $total_with_drawal += $employeegpf['with_drawal'];
            
             $opening_balance+=$employeegpf['opening_balance'];
             $interest_amount+=$employeegpf['interest_amount'];
             $total_closing_balance+=($employeegpf['opening_balance']+$employeegpf['interest_amount']+$employeegpf['single_contribution_year']-$employeegpf['with_drawal']);
		@endphp

		@endforeach
		<tr style="font-weight:600;BORDER-TOP:1PX SOLID;">
			<td style="padding:3px;border:none;" class="center" colspan="2">TOTAL</td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right">{{$opening_balance}}</td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right">{{ $total_own_share }}</td>
			<td style="padding:3px;border:none;" class="right">{{ $total_company_share }}</td>
			<th style="padding:4px;border:none;" class="right">-</th>
			<td style="padding:3px;border:none;" class="right">{{ $total_with_drawal }}</td>
			<td style="padding:3px;border:none;" class="right">{{$interest_amount}}</td>
			<td style="padding:3px;border:none;" class="right">{{ $total_closing_balance }}</td>
		</tr>
		@endif
	</tbody>
</table>
<table style="font-size:13px;">

<tr>
			<td colspan="13" style="border:none;"><I>Note:As per GOI.,Ministry of Finance. F.No.5(1)-B(PD)/2018, dated 11-04-2018 the rate of interest @7.6% w.e.f. 1-4-2018 to 30.06.2018, F.No.5(1)-B(PD)/2018, dated 17-07-2019 the rate of interest @7.6% w.e.f. 01-07-2018 to 30.09.2018, F.No.5(1)-B(PD)/2018, dated 04-10-2018 the rate of interest @8% w.e.f. 01-10-2018 ro 31-12-2018 & F.No. 5(1)-b(PD)/2018, dated 01-01-2019 the rate of interest @8% w.e.f. 01-01-2019 to 01-07-2018 to 30-03-2019</I></td>
		</tr></table>

<!----------------------------------------------------->
</div>
<!------------------------------------------------->

</body>

</html>
