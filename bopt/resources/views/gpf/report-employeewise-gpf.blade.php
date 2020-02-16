<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | GPF Members Account</title>
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

				<h4>GPF Members Account</h4>
				</div>

			</td>
			</tr>
		</table>


<!--------------------------fund-body------------------------>
<table style="width:100%;text-align:left;">
	@if(!empty($employee_gpf[0]))
	<thead>
	<tr>
		<th>NAME:  {{ $employee_gpf[0]->emp_fname.' '.$employee_gpf[0]->emp_mname.' '.$employee_gpf[0]->emp_lname}} </th>
	</tr>
	<tr>
		<th>DESG:  {{ $employee_gpf[0]->emp_designation }}</th>
	</tr>
	<tr>
		<th>PF. NO.:  {{ $employee_gpf[0]->emp_pf_no}}</th>
	</tr>
	<tr>
		<th>NOMINEE:  {{$employee_gpf[0]->nominee_name_one}}</th>
	</tr>
	<tr>
		<th>A/C YEAR:  {{$start_year.'-'.$end_year}}</th>
	</tr>
	</thead>
	@endif
</table>
<table border="1" style="border-collapse:collapse;width:100%;">

	<thead>

		<tr>
			<th style="width:50%;padding:4px;width:14.28%;">MONTH</th>
			<th style="width:10%;padding:4px;width:14.28%;">SUBSCRIPTION</th>
			<th style="width:20%;padding:4px;width:14.28%;">REFUND OF ADVANCE</th>
			<th style="width:20%;padding:4px;width:14.28%;">TOTAL</th>
			<th style="width:20%;padding:4px;width:14.28%;">WITHDRAWAL FROM FUND</th>
			<th style="width:20%;padding:4px;width:14.28%;">MONTHLY BALANCE FOR PAYMENT OF INTEREST</th>
			<th style="width:20%;padding:4px;width:14.28%;">REMARKS</th>
		</tr>

	</thead>
	<tbody style="border:none;">
		@if(!empty($employee_gpf))
		@php  
			$total_own_share=0;
	        $own_company_share=0;
	        $total_share=0;
	        $total_interest_amt=0;
	        $total_closing_balance = 0;
	        $total_withwral_balance = 0;

	      $total_own_share
		@endphp
 @foreach($employee_withdrawl as $employeewith)

@php 
        	 
             
              @endphp
 @endforeach
        @foreach($employee_gpf as $employeegpf)

        @php 
        	 
             $total_own_share +=$employeegpf->own_share;
             $own_company_share=($employeegpf->own_share+$employeegpf->company_share);
             $total_share += $own_company_share;
             $total_interest_amt += $employeegpf->interest_amount;
             $total_closing_balance += $employeegpf->closing_balance;
             $total_withwral_balance +=$employeegpf->loan_amount ;
            
        @endphp
		<tr>
			<td style="padding:3px;border:none;" class="center">{{ \Carbon\Carbon::parse($employeegpf->created_at)->format('M') }}</td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf->own_share}}</td>
			<td style="padding:3px;border:none;" class="right"></td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf->own_share }}</td>
			<td style="padding:3px;border:none;" class="right">{{ $employeegpf->loan_amount }}</td>
            <td style="padding:3px;border:none;" class="right">{{ $employeegpf->closing_balance }}</td>
			<td style="padding:3px;border:none;" class="right"></td>
		</tr>
		
		@endforeach
		<tr>
			<td style="padding:3px;border-right:1px solid #000;">TOTAL</td>
			<td style="padding:3px;border-right:1px solid #000;" class="right">{{$total_own_share}}</td>
			<td style="padding:3px;border-right:1px solid #000;" class="right"></td>
			<td style="padding:3px;border-right:1px solid #000;" class="right">{{$total_own_share}}</td>
			<td style="padding:3px;border-right:1px solid #000;" class="right">{{$total_withwral_balance}}</td>
			<td style="padding:3px;border-right:1px solid #000;" class="right">{{ $total_closing_balance }}</td>
			<td style="padding:3px;" class="right"></td>
		</tr>
		@endif
	</tbody>
</table>
<table style="width:50%;text-align:left;margin-top:20px;	">
	<thead>
		<tr>
			<th>Balance as on {{date('d-m-Y',strtotime($employee_gpf_last->crated_time))}}</th>
			<th class="right"><span>{{$employee_gpf_last->opening_balance}}</span></th>
		</tr>
		<tr>
			<th>Deposit &amp; Refund for {{$start_year}}-{{$end_year}}</th>
			<th class="right"><span><span>{{ $total_own_share}}</span></th>
		</tr>
		
		<tr><th>Interest during the year </th>
	   <th class="right"><span><span>{{ $total_interest_amt}}</span></th></tr>
	   <tr>
			<th>Less : Withdrawal</th>
			<th class="right"><span><span>{{ $employee_gpf_last->opening_balance+ $total_own_share+$total_interest_amt-$total_withwral_balance}}</span></th>
		</tr>
		<tr>
			<th>Balance as on {{date('d-m-Y')}}</th>
			<th class="right"><span><span class="pl20">-</span></th>
		</tr>
	</thead>
</table>

<!----------------------------------------------------->
</div>
<!------------------------------------------------->

</body>

</html>
