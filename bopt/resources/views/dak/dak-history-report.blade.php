<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | DAK History</title>
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
                    <h4>DAK Details for {{ $dak_details->dairy_no }}</h4>
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
                    <th>Final No.</th>
					<th>Reciept Type</th>
					<th>Sender's Name</th>
					<th>DAK Recieved Date</th>
					<th>DAK Status</th>
					<th>Forwarded to</th>
                    <th>Forwarded Date</th>
                    <th>Closing Date</th>
                    <th>Closing Remarks(if any)</th>
				</tr>
			</thead>
			<tbody>
                @php $i = 1; @endphp
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $dak_details->dairy_no }}</td>
					<td>{{ $dak_details->dak_forward_no }}</td>
					<td>{{ $dak_details->finaldakno }}</td>
					<td>{{ $dak_details->receipt_type }}</td>
                    <td>{{ $dak_details->sender_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($dak_details->diary_date)->format('d/m/Y') }}</td>
					<td>{{ ucFirst($dak_details->doc_status) }}</td>
                    <td>{{ $dak_details->emp_fname }} {{ $dak_details->emp_mname }} {{ $dak_details->emp_lname }}</td>
					 @if($dak_details->forwarddate)
                    <td>{{ \Carbon\Carbon::parse($dak_details->forwarddate)->format('d/m/Y') }}</td>
                    @else
                    <td>-</td>
                    @endif
                    @if($dak_details->closing_date)
                    <td>{{ \Carbon\Carbon::parse($dak_details->closing_date)->format('d/m/Y') }}</td>
                    @else
                    <td>-</td>
                    @endif
                    <td>{{ $dak_details->closing_remarks }}</td>

				</tr>


			</tbody>
	<!------------------------------------------>



			</table>

</div>

<!---------------------------------------------------->


<!---------------------js------------------------------------->
<!-------------------------------------------------------->
</body>
</html>
