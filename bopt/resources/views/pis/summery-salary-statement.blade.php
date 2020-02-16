<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Summery Sheet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css" media="print"> @page { size: auto; /* auto is the initial value */  
   	margin-top: 0;
    margin-bottom: 0; /* this affects the margin in the printer settings */ }  
   </style>
  <style>
body {-webkit-print-color-adjust: exact;}
  	.payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 35px;color: #292929;text-align:center;margin:0;}
	.payslip .pay-head h4 {font-size: 17px;text-align:right;margin:0;}
	.payslip .pay-month{text-align:center;}
	.payslip .pay-month h3{margin:0;color: #0099be;}
	.pay-logo img {max-width: 75px;}
	.emp-det{width:100%;}
	.emp-det thead tr th{text-align:center;}
	.emp-det thead tr th{border-bottom:none;}
	.emp-det thead tr th {border-bottom: none;background: #a7a8a9;color: #000;padding: 5px 10px;font-size: 16px;}
	.emp-det tbody tr td{padding:5px 10px;font-size:14px;}
	table.emp-det tr td span {font-weight: 600;}
	.sal-det tr th {background: #a7a8a9;padding: 5px 10px;border-bottom: none;color: #000;text-align:center;}
	.emp-det tr.part td{padding:5px 10px;text-align:left;font-weight:600;border-top:none;background:#efefef;}
	.sal-det tr td{padding:7px 10px;text-align:left;}
	.sal-det tr td p{text-align:right;margin:0;}.mon{text-align:center;}.mon h3{color:#0099be;margin:0;font-size:25px;}.mon h4{margin:0;font-size: 24px;}
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
				<h4></h4>
				</div>
				<div class="mon">
					<?php if(count($payroll_rs)>0){?>
					<?php 
	                    $dt=$payroll_rs[0]->month_yr;
	                    $dtar=explode('/',$dt);
						$paymonth= $monthName = strftime('%B', mktime(0, 0, 0, $dtar[0]));
                    ?>
					<h4>Salary Statement for the month of <?php echo $paymonth.' - '.$dtar[1] ; ?></h4>
				<?php } ?>
				</div>
			</td>
			</tr>
		</table>	
	<!--------------------------->
	<!--------------employee-details--------------->

		<?php if(!empty($payroll_rs)){?>

		<?php 
			$total_earnings	=0;
			$total_deduction=0;

			$total_gross_salary=0;
			$total_net_salary=0;
			$total_deduction_salary=0;

			$total_basicpay=0;	
			$total_da=0;	
			$total_hra=0;	
			$total_transport_allowance=0;	
			$total_da_on_ta=0;	
			$total_ltc=0;	
			$total_cea=0;	
			$total_travel_allowance=0;	
			$total_daily_allowance=0;
			$total_advance=0;	
			$total_adjustment_advance=0;	
			$total_medical_reimbursement=0;	
			$total_special_allowance=0;	
			$total_cash_handling_allowance=0;	
			$total_other_earnings=0;

			$total_gpf=0;	
			$total_nps=0;	
			$total_cpf=0;	
			$total_glsi=0;	
			$total_professional_tax=0;	
			$total_incometax=0;	
			$total_cess=0;
			$total_adsent_deduction=0;		
			$total_other_deduction=0;

		
			foreach($payroll_rs as $payroll){
				$total_basicpay+=$payroll->emp_basic_pay;
				$total_da+=$payroll->emp_da;
				$total_hra+=$payroll->emp_hra;
				$total_transport_allowance+=$payroll->emp_transport_allowance;
				$total_da_on_ta+=$payroll->emp_da_on_ta;
				$total_ltc+=$payroll->emp_ltc;
				$total_cea+=$payroll->emp_cea;
				$total_travel_allowance+=$payroll->emp_travelling_allowance;
				$total_daily_allowance+=$payroll->emp_daily_allowance;
				$total_advance+=$payroll->emp_advance;
				$total_adjustment_advance+=$payroll->emp_adjustment;
				$total_special_allowance+=$payroll->emp_spcl;
				$total_medical_reimbursement+=$payroll->emp_medical;
				$total_cash_handling_allowance+=$payroll->emp_cash_handle;
				$total_other_earnings+=$payroll->other_addition;

				$total_gpf+=$payroll->emp_gpf;
				$total_nps+=$payroll->emp_nps;
				$total_cpf+=$payroll->emp_cpf;
				$total_glsi+=$payroll->emp_gslt;
				$total_professional_tax+=$payroll->emp_pro_tax;
				$total_incometax+=$payroll->emp_income_tax;
				$total_cess+=$payroll->emp_cess;
				$total_other_deduction+=$payroll->other_deduction;

				$total_net_salary+=$payroll->emp_net_salary;
				$total_gross_salary+=$payroll->emp_gross_salary;
				$total_adsent_deduction+=$payroll->emp_absent_deduction;
				$total_deduction_salary+=$payroll->emp_total_deduction;

			}

			$total_earnings=$total_basicpay+ $total_da + $total_hra + $total_transport_allowance + $total_da_on_ta + $total_ltc + $total_cea + $total_travel_allowance + $total_daily_allowance + $total_advance + $total_adjustment_advance + $total_special_allowance + $total_medical_reimbursement + $total_cash_handling_allowance + $total_other_earnings;

			$total_deduction= $total_gpf+ $total_nps + $total_cpf + $total_glsi + $total_professional_tax + $total_incometax + $total_cess + $total_other_deduction + $total_adsent_deduction;


		?>
		
		<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#cacaca;">
			
	<!------------------------------------------>
	
	<!------------Salary-details----------------->	
				<thead>
					<tr>
						<th colspan="2" width="50%">Earnings</th>
						<th colspan="2" width="50%">Deduction</th>
					</tr>
				</thead>
				<tbody>
					<tr class="part">
						<td>Particulars</td>
						<td style="text-align:right;">Amount (<img src="{{ asset('theme/images/rupee.png') }}" alt="" style="width: 8px;vertical-align: middle;">)</td>
						<td>Particulars</td>
						<td style="text-align:right;">Amount (<img src="{{ asset('theme/images/rupee.png') }}" alt="" style="width: 8px;vertical-align: middle;">)</td>
					</tr>
					<tr>
						<td>Basic Pay</td>
						<td style="text-align:right;"><?php echo $total_basicpay;  ?></td>
						<td>GPF</td>
						<td style="text-align:right;"><?php echo $total_gpf;  ?></td>
					</tr>
					<tr>
						<td>Dearness Allowance</td>
						<td style="text-align:right;"><?php echo $total_da;  ?></td>
						<td>NPS</td>
						<td style="text-align:right;"><?php echo $total_nps;  ?></td>
					</tr>
					<tr>
						<td>HRA</td>
						<td style="text-align:right;"><?php echo $total_hra;  ?></td>
						<td>CPF</td>
						<td style="text-align:right;"><?php echo $total_cpf;  ?></td>
					</tr>
					<tr>
						<td>Transport Allowance</td>
						<td style="text-align:right;"><?php echo $total_transport_allowance;  ?></td>
						<td>GSLI</td>
						<td style="text-align:right;"><?php echo $total_glsi;  ?></td>
					</tr>
					<tr>
						<td>D.A. on T.A.</td>
						<td style="text-align:right;"><?php echo $total_da_on_ta;  ?></td>
						<td>Professional Tax</td>
						<td style="text-align:right;"><?php echo $total_professional_tax;  ?></td>
					</tr>
					<tr>
						<!--<td>LTC</td>
						<td style="text-align:right;"><?php echo $total_ltc;  ?></td>-->
						<td>Special Allowance</td>
						<td style="text-align:right;"><?php echo $total_special_allowance;  ?></td>
						<td>Income Tax</td>
						<td style="text-align:right;"><?php echo $total_incometax;  ?></td>
					</tr>
					<tr>
						<!--<td>CEA</td>
						<td style="text-align:right;"><?php echo $total_cea;  ?></td>-->
						<td>Cash Handling Allowance</td>
						<td style="text-align:right;"><?php echo $total_cash_handling_allowance;  ?></td>
						<td>CESS</td>
						<td style="text-align:right;"><?php echo $total_cess;  ?></td>
					<tr>
						<!--<td>Travelling Allowance</td>
						<td style="text-align:right;"><?php echo $total_travel_allowance;  ?></td>-->
						<td>Others</td>
						<td style="text-align:right;"><?php echo $total_other_earnings;  ?></td>
						<td style="vertical-align:top;">Others</td>
						<td style="text-align:right;vertical-align:top;"><?php echo $total_other_deduction;?></td>
					</tr>
 	
				
					
					<!--<tr>
						<td>Adjustment of Advance</td>
						<td style="text-align:right;"><?php echo $total_adjustment_advance;  ?></td>
						
					</tr>
					<tr>
						<td>Medical Reimbursement</td>
						<td style="text-align:right;"><?php echo $total_medical_reimbursement;  ?></td>
						
					</tr>-->
					
					
					
					<tr class="total">
						<td>Total</td>
						<td style="text-align:right;"><?php echo $total_earnings;  ?></td>
						<td>Total</td>
						<td style="text-align:right;"><?php echo $total_deduction;  ?></td>
					</tr>
					
					<tr>
						<td style="font-weight:600;border-right:none;" colspan="2"></td>
						<td style="font-weight:600;text-align:left;border-left:none;">Total Earnings</td>
						<td style="font-weight:600;text-align:right;border-left: none;"><?php echo $total_gross_salary;  ?></td>
						
					</tr>
					
					<tr>
						<td style="font-weight:600;border-right:none;" colspan="2">
						<td style="font-weight:600;text-align:left;border-left: none;">Total Deduction</td>
						<td style="font-weight:600;text-align:right;border-left: none;"><?php echo $total_deduction_salary;  ?></td>
						
					</tr>
					<tr>

   <?php $number = $total_net_salary;
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
						
						<td colspan="2" style="border-right:none;font-weight:600;text-align:left;font-size:16px;"></td>
						<td style="font-weight:600;text-align:left;border-left: none;font-size:16px;">Net Pay</td>
						<td style="font-weight:600;text-align:right;border-left: none;"> <?php echo $total_net_salary;  ?></td>
						
					</tr>
					
					<tr>
						
						<td style="font-weight:600;text-align:right;font-size:14px;" colspan="4">Net Pay in Words (RUPEES <?php echo strtoupper($result); ?>)</td>

					</tr>

					<tr>
						<td style="padding-top:5%;text-align:center;font-weight:600;">Dealing Assistant</td>
						<td style="padding-top:5%;text-align:center;font-weight:600;">Junior Accountant</td>
						<td style="padding-top:5%;text-align:center;font-weight:600;">Admin cum Accounts Officer</td>
						<td style="padding-top:5%;text-align:center;font-weight:600;">Director</td>
					</tr>
				</tbody>
			</table>
			<?php } ?>
	<!------------------------------------->
	

</div>

<!---------------------------------------------------->


<!---------------------js------------------------------------->
<!-------------------------------------------------------->
</body>
</html>