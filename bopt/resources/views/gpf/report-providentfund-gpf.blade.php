<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Provident Fund Account</title>
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
.sub{padding: 3px 3px 3px 4%;}
.sub2{padding: 3px 3px 3px 6%;}
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
    margin-top:15px; 
	margin-bottom: 6px;
    
	}

}
  </style>
</head>
<body>
<!-------------------Designated-fund-head------------------------>
@php  

$res='0';
$val0='';
@endphp

@foreach ($gpf_subcription as $gpf)
@for ($i = 1; $i <= 12; $i++)
	@if($i<=9)
                           @php  $val0='0';@endphp
						

						@endif
						@if($i>9)
                           @php  $val0='';@endphp
						
						
						@endif

						@if($gpf->month_year==$val0.$i.'/'.$start_year)

@php $res +=$gpf->own_share @endphp  @endif
  @if($gpf->month_year==$val0.$i.'/'.$end_year)
  @php $res +=$gpf->own_share @endphp  

@endif

@endfor


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
				<h4>Provident Fund Account</h4>
				<h4>Receipt and Payment Accounts for the Financial Year {{$start_year}}-{{$end_year}}</h4>
				</div>
				
			</td>
			</tr>
		
		</table>	


<!--------------------------fund-body------------------------>
<table>
<tr>
	<th style="border:none;" class="right">Amount in Rupees</th>
</tr>
</table>
<table border="1" style="border-collapse:collapse;width:100%;margin-top:1%;">
	<thead style="background:#ddd;">
	
		<tr>
			<th style="padding:3px;">Receipts</th>
			<th style="padding:3px;">Amount</th>
			<th style="padding:3px;">Payments</th>
			<th style="padding:3px;">Amount</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td style="padding:3px;border-bottom: none;">Opening Balance as on 01-04-{{$start_year}} 
				@if(!empty($opening_balance->bank_name))
				{{$opening_balance->bank_name}}
				@endif
			</td>
			<td style="padding:3px;border-bottom: none;">@if(!empty($opening_balance[0]->opening_amt)) {{$opening_balance[0]->opening_amt}} @endif</td>
			<td style="padding:3px;border-bottom: none;">GPF Adv./Withdrawal</td>
			<td style="padding:3px;border-bottom: none;">{{$withdrawal_amt[0]->withdrawl_amt}}</td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
			<td style="padding:3px;border-bottom: none;border-top: none;">TDS on Interest</td>
			<td style="padding:3px;border-bottom: none;border-top: none;"> @if(!empty($provident_tds_list->tds_amt) ||!empty($provident_tds_listmain->tds_amt) ) {{$provident_tds_list->tds_amt +$provident_tds_listmain->tds_amt}} @endif</td>
			
		</tr>
		<tr>
			<td style="padding:3px;border-bottom: none;border-top: none;">GPF Subscription</td>
			<td style="padding:3px;border-bottom: none;border-top: none;">{{$res}}</td>
			<td style="padding:3px;border-bottom: none;border-top: none;">NPS Tier-II</td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom: none;border-top: none;">CPF Subscription</td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
			<td style="padding:3px;border-bottom: none;border-top: none;">Employer's Contribution Withdrawal</td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom: none;border-top: none;">Interest received from TDR</td>
			<td style="padding:3px;border-bottom: none;border-top: none;">
                
			 @if(!empty($provident_fund_list->inest_rcv_tdr)) {{$provident_fund_list->inest_rcv_tdr}} @endif </td>
			<td style="padding:3px;border-bottom: none;border-top: none;">Bank Charges</td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom: none;border-top: none;">Employer's Cont. to CPF Receivable</td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
		</tr>

<tr>
			<td style="padding:3px;border-bottom: none;border-top: none;">NPS Tier-II Account</td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
			<td style="padding:3px;border-bottom: none;border-top: none;">Investment during the year</td>
			<td style="padding:3px;border-bottom: none;border-top: none;">@if(!empty($provident_investment_list->invested_amt)) {{$provident_investment_list->invested_amt}} @endif</td>
		</tr>

		
<tr>

			<td style="padding:3px;border-bottom: none;border-top: none;">Investment Encashed</td>
			<td style="padding:3px;border-bottom: none;border-top: none;"> @if(!empty($provident_fund_list->invested_amt)){{$provident_fund_list->invested_amt}} @endif </td>
			<td style="padding:3px;border-bottom: none;border-top: none;"><b>Closing Balance:  @if(!empty($opening_balance->bank_name)) {{$opening_balance->bank_name}} @endif</b></td>
			<td style="padding:3px;border-bottom: none;border-top: none;"> @if(!empty($closing_balance[0]->closing_amt)) {{$closing_balance[0]->closing_amt}} @endif</td>
		</tr>
		<tr>
			<td style="padding:3px;border-bottom: none;border-top: none;">Interest Received</td>
			<td style="padding:3px;border-bottom: none;border-top: none;">
				@php $result=0;
				$result=$provident_fund_list->invested_amt-$provident_investment_list->invested_amt;@endphp
				@if(!empty($result)){{$result}} @endif</td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
			<td style="padding:3px;border-bottom: none;border-top: none;"></td>
		</tr>

		<tr>
			<td style="padding:3px;" class="center"><b>TOTAL</b></td>
			<td style="padding:3px;"><b>{{$result+$provident_fund_list->invested_amt+$opening_balance[0]->opening_amt+$res}}</b></td>
			<td class="center"><b>TOTAL</b></td>
			<td style="padding:3px;"><b>{{$withdrawal_amt[0]->withdrawl_amt+$provident_tds_list->tds_amt +$provident_tds_listmain->tds_amt+$provident_investment_list->invested_amt}}</b></td>
		</tr>
	</tbody>
</table>


</div>
</body>

</html>