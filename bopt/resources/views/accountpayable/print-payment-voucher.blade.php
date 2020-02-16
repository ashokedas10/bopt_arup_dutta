<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Voucher</title>
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
.acnt .head td{background:#ddd;font-weight:600;text-align:center;}
.center{text-align:center;}.right{text-align:right;}
tbody{height:100%;}
li{padding-bottom:5px;}
.voucher thead th{padding:7px 0;}.voucher tbody tr td{padding:4px;}
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
<!-------------------bank-statement-head------------------------->
<div class="payslip" style="padding:0 20px;">
	<!-----------company-details----------->
		<table class="comp-det" style="width:100%;">
		<tr>
		
			<td>
			<div class="pay-logo">
					<img src="{{ asset('theme/images/bopt-logo.png') }}" alt="logo">
				</div>
			</td>
			<td>
				<div class="text-center pay-head">
				<h2>Board of Practical Training (ER)</h2>
				<h4>Voucher</h4>
				</div>
				
			</td>
			</tr>
		</table>	
	<!--------------------------->
<!---------------------------------------------------->

<!------------voucher-head---------------------->
<?php if(!empty($payabledtl)){ $total=0; ?>
<table>
	<thead style="text-align:left;">
		<tr>
			<th>Payment Id: <?php echo $payabledtl->payment_code; ?></th>
			<th></th>
			<th style="text-align: right;">Voucher Type: <?php if($payabledtl->voucher_type=='payment_vendor'){echo 'Payment Vendor';} elseif ($payabledtl->voucher_type=='payment_employee') { echo 'Payment Employee'; } else { echo 'Contra'; } ?></th>
		</tr>
		<tr>
			<td><b>A/c Head:</b> <?php echo $account_master_dtl->account_name; ?></td>
			<td></td>
			<td style="text-align: right;"><b>Voucher No.:</b> <?php echo $payabledtl->voucher_id; ?></td>
		</tr>

		<tr>
			<td><b>A/c Subhead:</b> <?php echo $account_master_dtl->account_name; ?></td>
			<td></td>
			<td style="text-align: right;"><b>Date:</b> <?php echo date("d.m.Y",strtotime($payabledtl->bill_booking_date)); ?></td>
		</tr>

		<tr>
			<td><b>Paid to:</b> <?php if(!empty($payabledtl->employee_id)){echo $payabledtl->employee_id;}
			 if(!empty($payabledtl->vendor_id)){echo $payabledtl->vendor_id;}  if(!empty($payabledtl->bank_name)){echo $payabledtl->bank_name;} ?></td>
			<td></td>
			<td style="text-align: right;"><b>By:</b> <?php echo $payabledtl->payment_mode; ?> </td>
		</tr>
		<tr>
			<td colspan="3"><b>Being the amount:</b> <?php echo $payabledtl->narration; ?></td>
		</tr>
		
		<tr>
			<td><b>Net payable amount:<?php echo $payabledtl->payment_amount; ?></b></td>
			<td colspan="2" style="text-align: right;"></td>
		</tr>
	</thead>
	
</table>
	
<!---------------------------------------->

<!-----------------voucher-body---------------------->
<table>
	<tr>
		<td style="vertical-align: top;">
<table class="voucher" border="1" style="width:330px;border-collapse:collapse;margin-top:2%;">
	
	<tbody>
		<tr>
			<td style="background:#ddd;width: 150px;"><b>Bill No.</b></td>
			<td style="text-align: right;">1</td>
		</tr>
		<tr>
			<td style="background:#ddd;"><b>Amount</b></td>
			<td style="text-align: right;"><?php echo $payabledtl->bill_amt; ?></td>
		</tr>
		<tr>
			<td style="background:#ddd;"><b>GST</b></td>
			<td style="text-align: right;"><?php echo $payabledtl->bill_gst_amt; ?></td>
		</tr>
		<tr>
			<td style="background:#ddd;" style="background:#ddd;"><b>Total</b></td>
			<td style="text-align: right;"><?php echo $total= $payabledtl->bill_amt + $payabledtl->bill_gst_amt;?></td>
		</tr>
		<tr>
			<td style="background:#ddd;"><b>Less TDS @ <?php echo $payabledtl->tds_percentage; ?>%</b></td>
			<td style="text-align: right;"><?php echo $payabledtl->deduction_amt; ?></td>
		</tr>
		<tr>
			
			<td style="background:#ddd;"><b>Net Payable Amount</b></td>
			<td style="text-align: right;"><?php echo $payabledtl->payment_amount; ?></td>
		</tr>


	<?php $number = $payabledtl->payment_amount;
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
			<td colspan="6" style="border:none;">Rupees (in words)  (<?php echo strtoupper($result); ?>)</td>
		</tr>
	</tbody>
</table>
</td>
<td style="vertical-align: top;float: right;">
<table class="voucher" border="1" style="border-collapse:collapse;width:200px;margin-top:2%;">
	
	<thead style="background: #ddd;">
		<th>Rs.</th>
		<th>P.</th>
	</thead>
	<tbody>
		<tr>
			<td style="padding:20px 0;text-align: right;"><?php echo $payabledtl->payment_amount; ?></td>
			<td style="padding:20px 0;text-align: right;">00</td>
		</tr>
		<tr>
			<td style="text-align: right;"><?php echo $payabledtl->payment_amount; ?></td>
			<td style="text-align: right;">00</td>
		</tr>
	</tbody>
</table>
</td>
</tr>
</table>
<!------------------------------------------------->

<!-----------------------footer------------------------->
<table style="width:100%;text-align:center;margin-top:10%;">
	<tr>
		<td style="width:33.33%;">______________________________________<br>Jr. Accountant</td>
		<td style="width:33.33%;">___________________________<br>AAO</td>
		<td style="width:33.33%;">___________________________<br>Directot</td>
	</tr>
</table>
</div>

<?php } ?>

<?php if(!empty($payabledtl->tds_percentage)){ ?>
<!------------------------------------------------->
<table style="widows:100%;">
	<tr><td><img src="{{ asset('theme/images/cut.png') }}" style="width:100%;"></td></tr>
</table>

<!-----------------------voucher-2nd-part------------------------->

<div class="payslip" style="padding:0 20px;">
	
		<table class="comp-det" style="width:100%;">
		<tr>
		
			<td>
			<div class="pay-logo">
					<img src="{{ asset('theme/images/bopt-logo.png') }}" alt="logo">
				</div>
			</td>
			<td>
				<div class="text-center pay-head">
				<h2>Board of Practical Training (ER)</h2>
				<h4>Voucher</h4>
				</div>
				
			</td>
			</tr>
		</table>	

<table>
	<thead style="text-align:left;">
		<tr>
			<td><b>A/c Head:</b> TDS</td>
			<td></td>
			<td style="text-align: right;"><b>Voucher No.:</b> <?php echo $payabledtl->voucher_id; ?></td>
		</tr>
		<tr>
			<td><b>Paid to:</b><?php if(!empty($payabledtl->employee_id)){echo $payabledtl->employee_id;}
			 if(!empty($payabledtl->vendor_id)){echo $payabledtl->vendor_id;}  if(!empty($payabledtl->bank_name)){echo $payabledtl->bank_name;} ?></td>
			<td></td>
			<td style="text-align: right;"><b>Date:</b> <?php echo date("d-m-Y"); ?></td>
		</tr>
		<tr>
			<td colspan="3"><b>Being the amount:</b> <u>Deposited into bank as TDS collected from <?php if(!empty($payabledtl->employee_id)){echo $payabledtl->employee_id;}
			 if(!empty($payabledtl->vendor_id)){echo $payabledtl->vendor_id;}  if(!empty($payabledtl->bank_name)){echo $payabledtl->bank_name;} ?></u></td>
		</tr>
		
		<tr>
			<td colspan="3"><b>By:</b> <?php echo $payabledtl->payment_mode; ?></td>
		</tr>
	</thead>
	
</table>





<table border="1" style="border-collapse:collapse;width:50%;margin:0 auto;text-align:center;">
	<thead>
		<tr>
			<th>Rs.</th>
			<th>P.</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="padding:2% 0;text-align:right;"><?php echo $payabledtl->deduction_amt; ?></td>
			<td style="padding:2% 0;text-align:right;">00</td>
		</tr>
		<td style="text-align: right;"><?php echo $payabledtl->deduction_amt; ?></td>
		<td style="text-align: right;">00</td>
	</tbody>
</table>
<?php $number = $payabledtl->deduction_amt;
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
  $tdsdeduction = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  //echo $result . "Rupees  " . $points . " Paise"; ?>


<table>
	<tr><td>Rupees (in words)  (<?php echo strtoupper($tdsdeduction); ?>)</td></tr>
</table>

<!-----------------------footer------------------------->
<table style="width:100%;text-align:center;margin-top:10%;">
	<tr>
		<td style="width:33.33%;">______________________________________<br>Jr. Accountant</td>
		<td style="width:33.33%;">___________________________<br>AAO</td>
		<td style="width:33.33%;">___________________________<br>Directot</td>
	</tr>
</table>
<?php } ?>
</div>

<!------------------------------------------------->
</div>
<!----------------------------------------------------->


</body>

</html>