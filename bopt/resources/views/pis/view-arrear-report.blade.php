<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Arrear Salary Statement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
body {-webkit-print-color-adjust: exact;}
  	.payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 32px;color: #000;text-align:center;margin:0;}
	.payslip .pay-head h4 {font-size: 17px;text-align:right;margin:0;}
	.payslip .pay-month{text-align:center;}
	.payslip .pay-month h3{margin:0;color: #0099be;}
	.pay-logo img {max-width: 75px;}
	.emp-det{width:100%;}
	.emp-det thead tr th{text-align:center;}
	.emp-det thead tr th{border-bottom:none;}
	.emp-det thead tr th {border-bottom: none;background: #a7a8a9;color: #000;padding: 5px 10px;font-size: 16px;}
	.emp-det tbody tr td{padding:5px 10px;font-size:14px;text-align:center;}
    .emp-det tbody tr th{background: #a7a8a9;padding: 5px 10px;}
	table.emp-det tr td span {font-weight: 600;}
	.sal-det tr th {background: #a7a8a9;padding: 5px 10px;border-bottom: none;color: #000;text-align:center;}
	.emp-det tr.part td{padding:5px 10px;text-align:left;font-weight:600;border-top:none;background:#efefef;}
	.sal-det tr td{padding:7px 10px;text-align:left;}
	.sal-det tr td p{text-align:right;margin:0;}.mon{text-align:right;}.mon h3{color:#0099be;margin:0;font-size:25px;}.mon h4{margin:0;font-size:24px;text-align:center;}
	.sal-det tr:nth-child(odd) {background-color: #f2f2f2;}
	.emp-det{border-bottom:none;}.total td{font-weight:600;}.leave{border-top:none;}
	.leave tr th{padding:5px 10px;text-align:left;}.leave{}.leave table tr td{text-align:center;}.part td i {font-size: 12px;}
	@media print
{
  table { page-break-after:auto !important; }
  tr    { page-break-inside:avoid !important; page-break-after:auto !important; }
  td    { page-break-inside:avoid !important; page-break-after:auto !important; }
  thead { display:table-header-group !important; }
  tfoot { display:table-footer-group !important; }
}
  </style>
</head>
<body>
<!-------------------payslip-body------------------------->
<div class="payslip">
	<!-----------company-details----------->
		<table class="comp-det" style="width:100%;">
		<tr>

			<td>
			<div class="pay-logo">
					<img src="{{ asset('theme/images/bopt-logo.png') }}" alt="logo">
				</div>
			</td>
			<td>
				<div class="pay-head">
				<h2>Board of Practical Training (ER)</h2>
				</div>
				<div class="mon">
					<h4>Arrear Pay Slip</h4>
				</div>
			</td>
			</tr>
		</table>
	<!--------------------------->
	<!--------------employee-details--------------->

	<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#000;margin-bottom:15px;">
		<tr>
			<td style="width:20%;"><span>Head Name:</span><br> {{$head_name->head_name}}</td>
			<td style="width:20%;"><span>Previous Rate:</span><br> {{$arear->old_rate}}</td>
			<td style="width:20%;"><span>Current Rate:</span><br> {{$arear->new_rate}}</td>
			<td style="width:20%;"><span>Employee Name:</span><br> {{$arear->emp_name}}</td>
			<td style="width:20%;"><span>Basic Pay:</span><br> {{$arear->basic_pay}}</td>

		</tr>

	</table>

		<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#000;">
			<thead>
				<tr><th colspan="10">EARNINGS(Amount in RUPEES)</th></tr>
				<tr>
					<th style="width:16.67%;">Effective From Date</th>
					<th style="width:16.67%;">Effective To Date</th>
					<th style="width:16.67%;">Received Amount</th>
					<th style="width:16.67%;">Enhanced Amount</th>
					<th style="width:16.67%;">DA Arrear</th>
                    <th style="width:16.67%;">Received DA on TA Amount</th>
                    <th style="width:16.67%;">Enhanced DA on TA Amount</th>
                    <th style="width:16.67%;">DA on TA Arrear</th>
					<th style="width:16.67%;">Total</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width:16.67%;">{{date('d-m-Y', strtotime($arear->from_date))}}</td>
					<td style="width:16.67%;">{{date('d-m-Y', strtotime($arear->to_date))}}</td>
					<td style="width:16.67%;">{{$arear->recv_amt}}</td>
					<td style="width:16.67%;">{{$arear->enhanced_amt}}</td>
                    <td style="width:16.67%;">{{$arear->da_arrerar}}</td>
                    <td style="width:16.67%;">{{$arear->rcv_ta_on_da_amount}}</td>
                    <td style="width:16.67%;">{{$arear->enhnc_ta_on_da_amount}}</td>
                    <td style="width:16.67%;">{{$arear->ta_on_da_arrear}}</td>

					<td style="width:16.67%;">{{$arear->da_arrerar + $arear->ta_on_da_arrear}}</td>
				</tr>


				<tr>
					<td colspan="4" style="border-right:none;"></td>
                    <td colspan="" style="border-right:none;"></td>
					<td style="text-align:left;border-left:none;font-weight:600;">Total Earnings</td>
					<td colspan="5" style="text-align:right;border-left:none;font-weight:600;">{{$arear->da_arrerar + $arear->ta_on_da_arrear}}</td>
				</tr>

{{--				<tr>--}}
{{--				<td colspan="6" style="border-right:none;"></td>--}}
{{--					<td colspan="2" style="border-right:none;text-align:left;font-weight:600;">Net Pay</td>--}}
{{--					<td colspan="2" style="border-left:none;text-align:right;font-weight:600;">{{$arear->total_arrear}}</td>--}}
{{--				</tr>--}}

			</tbody>
	<!------------------------------------------>



			</table>



			@if($arrear_name[0]=='2')

			<h2 style="text-align: center;">Deduction Statement</h2>

			<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#000;">
			<thead>
				<tr><th colspan="5">DEDUCTIONS (Amount in RUPEES)</th></tr>
                <tr><th colspan="5">NPS</th></tr>
				<tr>
					<th style="width:16.67%;">Effective From Date</th>
					<th style="width:16.67%;">Effective To Date</th>
					<th style="width:16.67%;">Received NPS Amount</th>
					<th style="width:16.67%;">Enhanced NPS Amount</th>
					<th style="width:16.67%;">Net NPS Amt</th>
					<!-- <th style="width:16.67%;">DA Arrear</th> -->
					<!-- <th style="width:16.67%;">Total</th> -->
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width:16.67%;">{{date('d-m-Y', strtotime($arear->from_date))}}</td>
					<td style="width:16.67%;">{{date('d-m-Y', strtotime($arear->to_date))}}</td>
					<td style="width:16.67%;">{{$arear->rcv_nps_amount}}</td>
					<td style="width:16.67%;">{{$arear->enhnc_nps_amount}}</td>
					<td style="width:16.67%;">{{$arear->nps_amount}}</td>
				</tr>


				<tr>
					<td colspan="3" style="border-right:none;"></td>
					<td colspan="" style="text-align:left;border-left:none;font-weight:600;">NPS Deduction</td>
					<td style="text-align:right;border-left:none;font-weight:600;">{{$arear->nps_amount}}</td>
				</tr>
                <tr><th colspan="5">P Tax</th></tr>
                <tr>
                    <th style="width:16.67%;">Effective From Date</th>
                    <th style="width:16.67%;">Effective To Date</th>
                    <th style="width:16.67%;">Received PTax Amount</th>
                    <th style="width:16.67%;">Enhanced PTax Amount</th>
                    <th style="width:16.67%;">Net PTax Amt</th>
                    <!-- <th style="width:16.67%;">DA Arrear</th> -->
                    <!-- <th style="width:16.67%;">Total</th> -->
                </tr>
                <tr>
                    <td style="width:16.67%;">{{date('d-m-Y', strtotime($arear->from_date))}}</td>
                    <td style="width:16.67%;">{{date('d-m-Y', strtotime($arear->to_date))}}</td>
                    <td style="width:16.67%;">{{$arear->recv_p_tax}}</td>
                    <td style="width:16.67%;">{{$arear->enhnc_p_tax}}</td>
                    <td style="width:16.67%;">{{$arear->p_tax_amt}}</td>
                </tr>
                <tr>
                    <td colspan="3" style="border-right:none;"></td>
                    <td colspan="" style="text-align:left;border-left:none;font-weight:600;">P Tax Deduction</td>
                    <td style="text-align:right;border-left:none;font-weight:600;">{{$arear->p_tax_amt}}</td>
                </tr>
				<tr>
				<td colspan="3" style="border-right:none;"></td>
					<td style="border-right:none;text-align:left;font-weight:600;">Net Deduction</td>
					<td style="border-left:none;text-align:right;font-weight:600;">{{($arear->p_tax_amt + $arear->nps_amount)}}</td>
				</tr>

			</tbody>
	<!------------------------------------------>



			</table>

                    <h2 style="text-align: center;">Arrear Total</h2>

                    <table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#000;">
                        <thead>
                        <tr><th colspan="5">TOTAL ARREAR (Amount in RUPEES)</th></tr>
                        <tr>
                            <th colspan="3" style="text-align: left; background: #FFFFFF">Total Earnings</th>
                            <th colspan="2" style="background: #FFFFFF">{{$arear->da_arrerar + $arear->ta_on_da_arrear}}</th>
                        </tr>
                        <tr>
                            <th colspan="3" style="text-align: left; background: #FFFFFF">Total Deductions</th>
                            <th colspan="2" style="background: #FFFFFF">{{($arear->p_tax_amt + $arear->nps_amount)}}</th>
                        </tr>
                        <tr style="border: 1px solid #000;">
                            <th colspan="3" style="text-align: left; background: #FFFFFF">Net Payable Amount</th>
                            <th colspan="2" style="background: #FFFFFF">{{($arear->total_arrear)}}</th>
                        </tr>
                        <tr>
                </table>
			@endif

</div>

<!---------------------------------------------------->


<!---------------------js------------------------------------->
<!-------------------------------------------------------->
</body>
</html>
