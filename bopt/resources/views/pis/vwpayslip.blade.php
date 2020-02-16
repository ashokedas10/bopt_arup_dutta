<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css" media="print"> @page { size: auto; /* auto is the initial value */  
   	margin-top: 0;
    margin-bottom: 0; /* this affects the margin in the printer settings */ }  
   </style>
   <style>
body {-webkit-print-color-adjust: exact;}
  	.payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 22px;color: #000;text-align:center;margin:0;}
	.payslip .pay-head h3{text-align:center;margin:0;}
	.payslip .pay-head h4 {font-size: 17px;text-align:center;margin:0;}
	.payslip .pay-month{text-align:center;}
	.payslip .pay-month h3{margin:0;color: #0099be;}
	.pay-logo img {max-width: 75px;}
	.emp-det{width:100%;}
	.emp-det thead tr th{text-align:center;}
	.emp-det thead tr th{border-bottom:none;}
	.emp-det thead tr th {border-bottom: none;background: #a7a8a9;color: #000;padding: 5px 10px;font-size: 16px;}
	.emp-det tbody tr td{padding:5px 10px;font-size:12px;}
	table.emp-det tr td span {font-weight: 600;}
	.sal-det tr th {background: #a7a8a9;padding: 5px 10px;border-bottom: none;color: #000;text-align:center;}
	.emp-det tr.part td{padding:5px;text-align:left;font-weight:600;border-top:none;background:#efefef;}
	.sal-det tr td{padding:7px 10px;text-align:left;}
	.sal-det tr td p{text-align:right;margin:0;}.mon{text-align: center;}.mon h3{color:#0099be;margin:0;font-size:25px;}.mon h4{margin:0;}
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
					<img src="{{ asset('theme/payslip-img/logo.png') }}" alt="logo">
				</div>
			</td>
			<td style="text-align:center;">
				@foreach($company_rs as $com)
				<div class="pay-head">
					<h2>Board of Practical Training (Eastern Region)</h2>
					<h3>Under Ministry of HRD, Government of India</h3>
				<!-- <h2>{{$com->company_name}}</h2> -->
				<h4 style="font-size: 15px;">{{$com->company_address}}</h4>
				</div>
               @endforeach
				<div class="mon">
					<?php 
                    $dt=$payroll_rs[0]->month_yr;
                    $dtar=explode('/',$dt);
                    $paymonth= $monthName = strftime('%B', mktime(0, 0, 0, $dtar[0]));
                    ?>
					<h4>Payslip for the month of <?php echo $paymonth.' - '.$dtar[1] ; ?></h4>
				</div>
			</td>
			</tr>
		</table>	
		
		<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#cacaca;">
			<thead>
				<tr>
					<th colspan="6">Employee Details</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td colspan="2" width="33.33%"><span>Employee Code :</span><br> {{$payroll_rs[0]->employee_id}}</td>
					<td colspan="2" width="33.33%"><span>Employee Name :</span><br> {{$payroll_rs[0]->emp_name}}</td>
					<td colspan="2" width="33.33%"><span>Department :</span><br> {{$payroll_rs[0]->emp_department}}</td>
				</tr>
				
				<tr>
				<td colspan="2"><span>Designation :</span><br> {{$payroll_rs[0]->emp_designation}}</td>
					<td colspan="2"><span>Pay Level :</span><br> {{$payroll_rs[0]->emp_pay_scale}}</td>
					<td colspan="2"><span>PAN	No.	:</span><br> {{$payroll_rs[0]->emp_pan_no}} </td>
				<tr>
					
					<td colspan="2"><span>Bank	Name :</span><br> {{$payroll_rs[0]->master_bank_name}}</td>
					<td colspan="2"><span>Account No :</span><br> {{$payroll_rs[0]->emp_account_no}}</td>
					<td colspan="2"><span>IFSC Code :</span><br> {{$payroll_rs[0]->emp_ifsc_code}}</td>
				</tr>
			</tbody>
	<!------------------------------------------>
	
	<!------------Salary-details----------------->	
				<thead>
					<tr>
						<th colspan="2" width="33.33%">Standard Earnings</th>
						<th colspan="2" width="33.33%">Actual Earnings</th>
						<th colspan="2" width="33.33%">Deductions for this month</th>
					</tr>
				</thead>
				<tbody>
					<tr class="part">
						<td>Particulars</td>
						<td style="text-align:right;">Amount (<img src="{{ asset('theme/payslip-img/rupee.png') }}" alt="" style="width: 8px;vertical-align: middle;">)</td>
						<td>Particulars</td>
						<td style="text-align:right;">Amount (<img src="{{ asset('theme/payslip-img/rupee.png') }}" alt="" style="width: 8px;vertical-align: middle;">)</td>
						<td>Particulars</td>
						<td style="text-align:right;">Amount (<img src="{{ asset('theme/payslip-img/rupee.png') }}" alt="" style="width: 8px;vertical-align: middle;">)</td>
					</tr>
					<tr>
						<td>Basic Pay</td>
						<td style="text-align:right;">{{$actual_payroll->emp_actual_basic_pay}}</td>
						<td>Basic Pay</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_basic_pay}}</td>
						<td>GPF</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_gpf}}</td>
					</tr>
					<tr>
						<td>Dearness Allowance</td>
						<td style="text-align:right;">{{$actual_payroll->emp_actual_da}}</td>
						<td>Dearness Allowance</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_da}}</td>
						<td>NPS</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_nps}}</td>
					</tr>
					<tr>
						<td>House Rent Allowance</td>
						<td style="text-align:right;">{{$actual_payroll->emp_actual_hra}}</td>
						<td>House Rent Allowance</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_hra}}</td>
						<td>GSLI</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_gslt}}</td>
					</tr>
					<tr>
						<td>Transport Allowance</td>
						<td style="text-align:right;">{{$actual_payroll->emp_actual_transport_allowance}}</td>
						<td>Transport Allowance</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_transport_allowance}}</td>
						<td>Professional Tax</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_pro_tax}}</td>
					</tr>
					<tr>
						<td>D.A. on T.A.</td>
						<td style="text-align:right;">{{$actual_payroll->emp_actual_da_on_ta}}</td>
						<td>D.A. on T.A.</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_da_on_ta}}</td>
						<td>Income Tax</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_income_tax}}</td>
					</tr>
					<tr>
						<td>Special Allowance</td>
						<td style="text-align:right;">{{$actual_payroll->emp_actual_spcl_allowance}}</td>
						<td>Special Allowance</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_spcl}}</td>
						<td>CESS</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_cess}}</td>
					</tr>

					<tr>
						<td>Cash Handling Allowance</td>
						<td style="text-align:right;">{{$actual_payroll->emp_actual_cash_handling_allowance}}</td>
						<td>Cash Handling Allowance</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_cash_handle}}</td>
						<td rowspan="2">Others Deduction</td>
						<td rowspan="2" style="text-align:right;">{{$payroll_rs[0]->other_deduction}}</td>
					</tr>
					
							
					<tr>
						<td>Other Earnings</td>
						<td style="text-align:right;">{{$actual_payroll->emp_actual_others_addition}}</td>
						<td>Other Earnings</td>
						<td style="text-align:right;">{{$payroll_rs[0]->other_addition}}</td>
						
					</tr>
					
					<tr class="total">
						<td>Standard Gross Salary</td>
						<td style="text-align:right;">{{$actual_payroll->emp_actual_gross_salary}}</td>
						<td>Actual Gross Salary</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_gross_salary}}</td>
						<td>Total Deductions</td>
						<td style="text-align:right;">{{$payroll_rs[0]->emp_total_deduction}}</td>
					</tr>

<?php $number = $payroll_rs[0]->emp_net_salary;
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
  //echo $result . "Rupees  " . $points . " Paise"; ?>


					<tr>
						<td style="font-weight:600;" colspan="2">Net Salary : </td>
						<td style="font-weight:600;text-align:right;" colspan="4"><span style="float:left;">RUPEES <?php echo strtoupper($result) ; ?></span>{{$payroll_rs[0]->emp_net_salary}}</td>
					</tr>
				</tbody>
			</table>
	

		<div class="leave">
			<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#cacaca;">
				<tbody>
					<tr>
						<td colspan="8" style="text-align:left;border-bottom:none;"><b>No. of pay in days: <?php echo $no_of_pay_days= $current_month_days-$payroll_rs[0]->emp_absent_days;?> </b></td>
					</tr>
				<tr>
					<td colspan="8" style="text-align:left;border-top:none;">E. &amp; O.E. This is a computer generated payslip and does not need a signature</td>
		            
					</tr>
					</tbody>
			</table>
	    </div>     		
</div>

</body>
</html>