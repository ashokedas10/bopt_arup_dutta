<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Schedule 13 | Other Income</title>
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
            <tr><td colspan="2"><h4 style="text-decoration:underline;text-transform:uppercase;">Schedule 13 - Other Income</h4></td></tr>
		</table>
<table border="1" style="width:100%;border-collapse:collapse;font-size:12px;">
	<thead>
		<thead style="background:#f5f4f4;">
		<tr>
			<th colspan="2" style="border-right:none;"></th>
		<th style="border-left:none;font-size:15px;">Amount in Rupees</th></tr>
			<tr>
				<th style="padding:4px;width:50%;"></th>
				<th style="padding:4px;width:25%;font-size:15px">Current Year</th>
				<th style="padding:4px;width:25%;font-size:15px">Previous Year</th>
			</tr>

		</thead>
		<tbody>
            @php $total_amt = 0; @endphp
            @foreach($schedule_det as $schedule_13)
			<tr>
            <td  class="@if($schedule_13['is_sub_item']!=''){{'sub'}}@endif" style="padding:3px;"><span style="@if($schedule_13['is_sub_item']!=''){{ 'margin-left:30px;font-size:16px;' }}@endif @if($schedule_13['is_sub_item']==''){{ 'font-size:20px;font-weight:bold;'}}@endif">{{ $schedule_13['account_name'] }}</span></td>
			<td  class="@if($schedule_13['is_sub_item']!=''){{'right'}}@endif" style="padding:3px;">{{ $schedule_13['total_amount'] }}</td>
			<td  class="@if($schedule_13['is_sub_item']!=''){{'right'}}@endif" style="padding:3px;text-align:center">--</td>
            </tr>
            @php $total_amt += $schedule_13['total_amount']; @endphp
            @endforeach
			{{-- <tr>
				<td class="sub">1) Hostel Room Rent</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">2) License fee</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">3) Hire Charges of Auditorium/Play ground/Convention Centre, etc.</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">4) Electricity charges recovered</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">5) Water charges recovered</td>
				<td style="padding:3px;" class="right">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">6) Guest House Rent</td>
				<td style="padding:3px;" class="right">@if(!empty($guest_houae_rent)){{$guest_houae_rent[0]->guest_house_rent_amt}} @endif</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>

			<tr>
				<td class="right"><b>Total</b></td>
				<td class="right"><b>@if(!empty($guest_houae_rent)){{$guest_houae_rent[0]->guest_house_rent_amt}} @endif</b></td>
				<td class="right">-</td>
			</tr>
			<tr>
				<td style="padding:3px;"><b>B. Sale of Institute's publications</b></td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;"><b>C. Income from holding Events</b></td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="" class="sub">1. Gross receipts from annual function/sports carnival</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>


			<tr>
				<td class="sub2"><span>Less:</span> Direct expenditure incurred on the annual function/sports carnival</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub2">2. Gross Receipts from fetes</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub2"><span>Less:</span> Direct expenditure incurred on the fetes</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub2">3. Gross Receipts for educational tours</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub2"><span>Less:</span> Direct expenditure incurred on the tours</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub2">4. Others (to be specified and seperately disclosed)</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="right"><b>Total</b></td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td style="padding:3px;"><b>Others</td>
				<td class="right" style="padding:3px;"></td>
				<td class="right" style="padding:3px;"></td>
			</tr>
			<tr>
				<td class="sub">1. Income from consultancy</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">2. RTI fees</td>
				<td class="right" style="padding:3px;">@if(!empty($rti_fees)){{$rti_fees[0]->rti_amt}} @endif</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">3. Income from Royalty</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">4. Application fee (recruitment)</td>
				<td class="right" style="padding:3px;">@if(!empty($application_fees)){{$application_fees[0]->application_amt}} @endif</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">5. Misc. receipts (Pensioner ID card, Rebate from Post Master, etc.)</td>
				<td class="right" style="padding:3px;">@if(!empty($misc_receipt)){{$misc_receipt[0]->misc_amt}} @endif</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">6. Profit/Loss on Sale/disposal of Assets</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub2">a) Owned assets</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub2">b) Assets received free of cost</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">7. Grants/Donation from Institutions, Welfare Bodies and International Organizations</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>

			<tr>
				<td class="sub">8. Others</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			<tr>
				<td class="sub">9. GADP Fee</td>
				<td class="right" style="padding:3px;">-</td>
				<td class="right" style="padding:3px;">-</td>
			</tr>
			@php
			$total=0;
			$total= $guest_houae_rent[0]->guest_house_rent_amt+ $rti_fees[0]->rti_amt+$application_fees[0]->application_amt+ $misc_receipt[0]->misc_amt;
			@endphp
			<tr>
				<td class="right"><b>Total</b></td>
				<td class="right">{{$total}}</td>
				<td class="right">-</td>
			</tr> --}}

			<tr>
				<td style="padding:3px;text-align:center;font-size:16px;"><b>Grand Total (A+B+C+D)</b></td>
				<td class="right" style="padding:3px;">{{$total_amt}}</b></td>
				<td class="right" style="padding:3px;text-align:center">--</td>
			</tr>
		</tbody>
	</thead>
</table>

</div>
<!------------------------------------------------->


</body>

</html>
