<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Bill Register</title>
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
				<div class="text-center pay-head">
				<h2>Board of Practical Training (ER)</h2>
				<h4>Bill Register</h4>
				</div>
				
			</td>
			</tr>
		</table>	
	<!--------------------------->
<!---------------------------------------------------->

<!------------bank-statement-body---------------------->

	<table border="1" style="border-collapse:collapse;width:100%;">
	<thead style="background:#ddd;">
		<tr>
			<th colspan="2" style="width:20%;padding:2% 0;">Bill No. &amp; Date</th>
			<th colspan="2" style="width:50%;padding:2% 0;">Particulars of Bill</th>
			<th style="width:15%;padding:2% 0;">Net Amount of Bill</th>
			<th style="width:15%;padding:2% 0;">Payment Mode</th>
		</tr>
	</thead>
		<tbody>
			<tr style="text-align:center;background:#ddd;">
				<th style="padding:3px 0;">Bill No.</th>
				<th style="padding:3px 0;">Date</th>
				<th style="padding:3px 0;">Party/Bank/Employee</th>
				<th style="padding:3px 0;">Narration</th>
				<th style="padding:3px 0;"></th>
				<th style="padding:3px 0;"></th>
			</tr>
			<?php if(!empty($voucher_list)){
				foreach($voucher_list as $vlist) { ?>
			<tr>
				<td style="padding:3px;"><?php echo $vlist->billno; ?></td>
				<td style="padding:3px;"><?php echo date("d.m.Y", strtotime($vlist->bill_booking_date)); ?></td>
				<td style="padding:3px;"><?php echo $vlist->vendor_id; ?></td>
				<td style="padding:3px;"><?php echo $vlist->narration; ?></td>
				<td style="padding:3px;"><?php echo $vlist->payable_amt; ?></td>
				<td style="padding:3px;"><?php echo $vlist->payment_mode; ?></td>
			</tr>

			<?php } } ?>
			
		</tbody>
	</table>
<!---------------------------------------->

<!-----------------------footer------------------------->
<table style="width:100%;text-align:center;margin-top:10%;">
	<tr>
				<td style="width:33.33%;">___________________________<br>
				Assistant</td>
				<td style="width:33.33%;">___________________________<br>Jr. Accountant</td>
				<td style="width:33.33%;">______________________________________<br>Admin-cum-Accounts Officer</td>
			</tr>
</table>
</div>

<!------------------------------------------------->


</body>

</html>