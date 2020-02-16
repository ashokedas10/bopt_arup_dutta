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
	.emp-det thead tr th {border-bottom: none;background: #a7a8a9;color: #000;padding: 6px;font-size: 16px;}
	.emp-det tbody tr td{padding:5px 10px;font-size:14px;text-align:center;}
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
<!--	--><?php //echo $arrear_name[0]; ?>
	<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#000;margin-bottom:15px;">

		<tr>
			<td style="width:20%;"><span>Head Name:</span><br> {{$head_name->head_name}}</td>
			<td style="width:20%;"><span>Previous Rate:</span><br> {{$arears[0]->old_rate}}</td>
			<td style="width:20%;"><span>Current Rate:</span><br> {{$arears[0]->new_rate}}</td>
			<td style="width:20%;"><span>Effective From:</span><br> {{date('d-m-Y', strtotime($arears[0]->from_date))}}</td>
			<td style="width:20%;"><span>Effective To:</span><br> {{date('d-m-Y', strtotime($arears[0]->to_date))}}</td>
		</tr>

	</table>

		<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#000;">
			<thead>
				<tr>
                    <th style="width:16.67%;">Sl. No.</th>
					<th style="width:16.67%;">Employee Code</th>
					<th style="width:16.67%;">Employee Name</th>
					<th style="width:16.67%;">Employee Designation</th>
					<th style="width:16.67%;">Basic Salary</th>
					<th style="width:16.67%;">Received Amount</th>
					<th style="width:16.67%;">Enhanced Amount</th>
                    <th style="width:16.67%;">DA Arrear</th>
                    <th style="width:16.67%;">Received DA on TA Amount </th>
                    <th style="width:16.67%;">Enhanced DA on TA Amount</th>
                    <th style="width:16.67%;">DA on TA Arrear</th>
					<?php if($arrear_name[0]=='2'){ ?>
					<th style="width:16.67%;">Recieved NPS Amount</th>
					<th style="width:16.67%;">Enhanced NPS Amount</th>
					<th style="width:16.67%;">Net NPS Amt</th>
                    <th style="width:16.67%;">Recieved PTax Amount</th>
                    <th style="width:16.67%;">Enhanced PTax Amount</th>
                    <th style="width:16.67%;">Net PTax Amt</th>
					<?php } ?>
					<th style="width:16.67%;">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $total_arrear = 0; ?>
				@foreach($arears as $arear)
				<tr>
                    <td style="width:16.67%;">{{$loop->iteration}}</td>
					<td style="width:16.67%;">{{$arear->emp_code}}</td>
					<td style="width:16.67%;">{{$arear->emp_name}}</td>
					<td style="width:16.67%;">{{$arear->emp_desig}}</td>
					<td style="width:16.67%;">{{$arear->basic_pay}}</td>
					<td style="width:16.67%;">{{$arear->recv_amt}}</td>
					<td style="width:16.67%;">{{$arear->enhanced_amt}}</td>
                    <td style="width:16.67%;">{{$arear->da_arrerar}}</td>
                    <td style="width:16.67%;">{{round($arear->rcv_ta_on_da_amount)}}</td>
                    <td style="width:16.67%;">{{round($arear->enhnc_ta_on_da_amount)}}</td>
                    <td style="width:16.67%;">{{$arear->ta_on_da_arrear}}</td>
					<?php if($arear->head_id=='2'){ ?>
					<td style="width:16.67%;">{{round($arear->rcv_nps_amount)}}</td>
					<td style="width:16.67%;">{{round($arear->enhnc_nps_amount)}}</td>
					<td style="width:16.67%;">{{$arear->nps_amount}}</td>
                    <td style="width:16.67%;">{{$arear->recv_p_tax}}</td>
                    <td style="width:16.67%;">{{$arear->enhnc_p_tax}}</td>
                    <td style="width:16.67%;">{{$arear->p_tax_amt}}</td>
					<?php } ?>
					<td style="width:16.67%;">{{$arear->total_arrear}}</td>
				</tr>

				<?php $total_arrear += $arear->total_arrear; ?>

				<!--<tr>
					<td colspan="2" style="border-right:none;"></td>
					<td style="text-align:left;border-left:none;font-weight:600;">Total DA</td>
					<td style="text-align:right;border-left:none;font-weight:600;">{{$arear->total_arrear}}</td>
					<td style="text-align:left;border-left:none;font-weight:600;">Total Earnings</td>
					<td style="text-align:right;border-left:none;font-weight:600;">{{$arear->total_arrear}}</td>
				</tr>

				<tr>
				<td colspan="4" style="border-right:none;"></td>
					<td style="border-right:none;text-align:left;font-weight:600;">Net Pay</td>
					<td style="border-left:none;text-align:right;font-weight:600;">{{$arear->total_arrear}}</td>
				</tr>-->
				@endforeach

				<?php $number = $total_arrear;
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? '' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " .
          $words[$point = $point % 10] : '';
          ?>
			</tbody>
			<tfoot>
				<tr>
					@if($arear->head_id=='2')
					<th colspan="16" rowspan="2" style="text-align: left;">TOTAL : RUPEES {{strtoupper($result)}}</th>
					<th colspan="2" rowspan="2">{{$total_arrear}}</th>
					@else
					<th colspan="14" rowspan="2" style="text-align: left;">TOTAL : RUPEES {{strtoupper($result)}}</th>
					<th colspan="1" rowspan="2">{{$total_arrear}}</th>
					@endif
				</tr>
			</tfoot>
	<!------------------------------------------>



			</table>

</div>

<!---------------------------------------------------->


<!---------------------js------------------------------------->
<!-------------------------------------------------------->
</body>
</html>
