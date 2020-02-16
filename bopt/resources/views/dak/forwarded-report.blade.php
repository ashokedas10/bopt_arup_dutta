<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Receipt History</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
body {-webkit-print-color-adjust: exact;}
  	.payslip{font-family:cambria;}
	.payslip .pay-head h2 {font-size: 32px;color: #292929;text-align:center;margin:0;}
	.payslip .pay-head h4 {font-size: 17px;text-align:right;margin:0;}
	.payslip .pay-month{text-align:center;}
	.payslip .pay-month h3{margin:0;color: #0099be;}
	.pay-logo img {max-width: 75px;}
	.emp-det{width:100%;}
	.emp-det thead tr th{text-align:center;}
	.emp-det thead tr th{border-bottom:none;}
	.emp-det thead tr th {border-bottom: none;background: #a7a8a9;color: #000;padding: 5px 10px;font-size: 16px;}
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
  @page{size:landscape;}
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
			<td>
				<div class="pay-head">
				<h2>Board of Practical Training (ER)</h2>
				</div>
				<div class="mon">
					<h4>Forwarding Details from <?php echo $to_date; ?> to <?php echo $from_date; ?></h4>
				</div>
			</td>
			</tr>
		</table>	
	<!--------------------------->
	<!--------------employee-details--------------->
		
		<table border="1" class="emp-det" style="width:100%;border-collapse:collapse;border-color:#cacaca;">
			<thead>
				<tr>
					<th>Sl. No.</th>
					<th>Diary No.</th>
					<th>Forwarding No.</th>
					<th>Reciept Type</th>
					<th>Sender's Name</th>
					<th>DAK Recieved Date</th>
					<th>Forwarded to</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0; foreach($forward_details as $forward){ $i++;?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $forward->dairy_no; ?></td>
					<td><?php echo $forward->dak_forward_no; ?></td>
					<td><?php echo $forward->receipt_type; ?></td>
					<td><?php echo $forward->sender_name; ?></td>
					<td><?php echo date_format(date_create($forward->diary_date),"d.m.y"); ?></td>
					<td><?php echo $forward->emp_fname. " " .$forward->emp_mname. " " .$forward->emp_lname; ?></td>
				</tr>
				<?php  } ?>
				
			</tbody>
	<!------------------------------------------>
	
				
				
			</table>

</div>

<!---------------------------------------------------->


<!---------------------js------------------------------------->
<!-------------------------------------------------------->
</body>
</html>