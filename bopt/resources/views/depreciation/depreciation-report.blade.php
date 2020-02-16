<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training Schedule 4 | Fixed Assets</title>
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
/*tfoot{position:fixed;bottom:0;width:100%;}
.bank-state.header table{position:fixed;top:0;}*/
/*.footer{position:relative;}
.footer table{position:fixed;bottom:0;}*/
.sub{padding: 0 0 0 15px;}
	@media print
}
{
 table {page-break-after: auto;}
  tr    {page-break-inside:avoid !important; page-break-after:auto !important; }
  td    { page-break-inside:avoid !important; page-break-after:auto !important; }
  thead { display:table-header-group !important; }
  
  
  tfoot { display:table-footer-group !important;}
 @page {
	size:landscape;
   margin:5px 10px;
    
	}

}
  </style>
</head>
<body>
<!-------------------Designated-fund-head------------------------>
<div class="payslip">

<!---------------------------schedule-4D-Others----------------------------->
<table class="comp-det" style="width:100%;font-size:12px;">
		<tr>
			<td>
				<div class="pay-logo">
					<img src="{{asset('images/logo2.png')}}" alt="logo">
				</div>
			</td>
			<td>
				<div class="text-center pay-head" style="margin-bottom:20px;">
					<h2>Board of Practical Training (ER)</h2>
					<!-- <h3 style="text-align:center;margin:0;">Establishment Account</h3> -->
					<h4>Fundwise Fixed Asset Report 31st March {{$end_year}} (Establishment Account)</h4>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2"><h4 style="padding: 0;margin: 0;">Schedule 4 Fixed Assets</h4></td>
		</tr>
</table>	


<!--------------------------fund-body------------------------>
<table><tr><th style="text-align: right;">Amount in Rupees</th></tr></table>
<table border="1" style="width:100%;border-collapse:collapse;font-size:12px;">
	<thead>
	<tr>
		<th rowspan="2"> Sl. No.</th>
		<th rowspan="2" style="width:350px;">Assets Heads</th>
		<th colspan="4">Gross Block</th>
		<th colspan="4">Depreciation for the year {{$start_year}}-{{$end_year}}</th>
		<th colspan="2">Net Block</th>
	</tr>
	<tr>
		<th>Op Balance 01.04.{{$start_year}}</th>
		<th>Additions</th>
		<th>Deductions</th>
		<th>Cl Balance</th>
		<th>Op Balance 01.04.{{$end_year}}</th>
		<th>Depreciation for the Year</th>
		<th>Deductions/<br>Adjustment</th>
		<th>Total Depreciation</th>
		<th>31.03.{{$start_year}}</th>
		<th>31.03.{{$end_year}}</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td style="padding:3px;" class="center">1</td>
			<td style="padding:3px;">Land</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$land->gross_addition}}</td>
			<td style="padding:3px;" class="right">{{$land->gross_deduction}}</td>
			<td style="padding:3px;" class="right">{{$land->gross_closingbalance}}</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$land->depreciation}}</td>
			<td style="padding:3px;" class="right">{{$land->depreciation_deduction}}</td>
			<td style="padding:3px;" class="right">{{$land->netclosing_balance}}</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">{{$land->netclosing_balance}}</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">2</td>
			<td style="padding:3px;">Site Development</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">3</td>
			<td style="padding:3px;">Buildings</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$buildings->gross_addition}}</td>
			<td style="padding:3px;" class="right">{{$buildings->gross_deduction}}</td>
			<td style="padding:3px;" class="right">{{$buildings->gross_closingbalance}}</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$buildings->depreciation}}</td>
			<td style="padding:3px;" class="right">{{$buildings->depreciation_deduction}}</td>
			<td style="padding:3px;" class="right">{{$buildings->netclosing_balance}}</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">{{$buildings->netclosing_balance}}</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">4</td>
			<td style="padding:3px;">Roads &amp; Bridges</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$roads->gross_addition}}</td>
			<td style="padding:3px;" class="right">{{$roads->gross_deduction}}</td>
			<td style="padding:3px;" class="right">{{$roads->gross_closingbalance}}</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$roads->depreciation}}</td>
			<td style="padding:3px;" class="right">{{$roads->depreciation_deduction}}</td>
			<td style="padding:3px;" class="right">{{$roads->netclosing_balance}}</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">{{$roads->netclosing_balance}}</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">5</td>
			<td style="padding:3px;">Tubewells &amp; Water Supply</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$tubewells->gross_addition}}</td>
			<td style="padding:3px;" class="right">{{$tubewells->gross_deduction}}</td>
			<td style="padding:3px;" class="right">{{$tubewells->gross_closingbalance}}</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$tubewells->depreciation}}</td>
			<td style="padding:3px;" class="right">{{$tubewells->depreciation_deduction}}</td>
			<td style="padding:3px;" class="right">{{$tubewells->netclosing_balance}}</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">{{$tubewells->netclosing_balance}}</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">6</td>
			<td style="padding:3px;">Sewerage &amp; Drainage</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$sewerage->gross_addition}}</td>
			<td style="padding:3px;" class="right">{{$sewerage->gross_deduction}}</td>
			<td style="padding:3px;" class="right">{{$sewerage->gross_closingbalance}}</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$sewerage->depreciation}}</td>
			<td style="padding:3px;" class="right">{{$sewerage->depreciation_deduction}}</td>
			<td style="padding:3px;" class="right">{{$sewerage->netclosing_balance}}</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">{{$sewerage->netclosing_balance}}</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">7</td>
			<td style="padding:3px;">Electrical Installation &amp; Equipment</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$electrical->gross_addition}}</td>
			<td style="padding:3px;" class="right">{{$electrical->gross_deduction}}</td>
			<td style="padding:3px;" class="right">{{$electrical->gross_closingbalance}}</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$electrical->depreciation}}</td>
			<td style="padding:3px;" class="right">{{$electrical->depreciation_deduction}}</td>
			<td style="padding:3px;" class="right">{{$electrical->netclosing_balance}}</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">{{$electrical->netclosing_balance}}</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">8</td>
			<td style="padding:3px;">Plant &amp; Machinery</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$plant->gross_addition}}</td>
			<td style="padding:3px;" class="right">{{$plant->gross_deduction}}</td>
			<td style="padding:3px;" class="right">{{$plant->gross_closingbalance}}</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$plant->depreciation}}</td>
			<td style="padding:3px;" class="right">{{$plant->depreciation_deduction}}</td>
			<td style="padding:3px;" class="right">{{$plant->netclosing_balance}}</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">{{$plant->netclosing_balance}}</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">9</td>
			<td style="padding:3px;">Scientific &amp; Laboratory Equipment</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">10</td>
			<td style="padding:3px;">Office Equiment</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$office_equipment->gross_addition}}</td>
			<td style="padding:3px;" class="right">{{$office_equipment->gross_deduction}}</td>
			<td style="padding:3px;" class="right">{{$office_equipment->gross_closingbalance}}</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">{{$office_equipment->depreciation}}</td>
			<td style="padding:3px;" class="right">{{$office_equipment->depreciation_deduction}}</td>
			<td style="padding:3px;" class="right">{{$office_equipment->netclosing_balance}}</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">{{$office_equipment->netclosing_balance}}</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">11</td>
			<td style="padding:3px;">Audio Visual Equiment</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($audio->gross_addition)){{$audio->gross_addition}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($audio->gross_deduction)){{$audio->gross_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($audio->gross_closingbalance)){{$audio->gross_closingbalance}}@endif</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($audio->depreciation)){{$audio->depreciation}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($audio->depreciation_deduction)){{$audio->depreciation_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($audio->netclosing_balance)){{$audio->netclosing_balance}}@endif</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">@if(!empty($audio->netclosing_balance)){{$audio->netclosing_balance}}@endif</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">12</td>
			<td style="padding:3px;">Computers &amp; Peripherals</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($computer->gross_addition)){{$computer->gross_addition}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($computer->gross_deduction)){{$computer->gross_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($computer->gross_closingbalance)){{$computer->gross_closingbalance}}@endif</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($computer->depreciation)){{$computer->depreciation}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($computer->depreciation_deduction)){{$computer->depreciation_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($computer->netclosing_balance)){{$computer->netclosing_balance}}@endif</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">@if(!empty($computer->netclosing_balance)){{$computer->netclosing_balance}}@endif</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">13</td>
			<td style="padding:3px;">Furniture, Fixtures &amp; Fittings</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($furniture->gross_addition)){{$furniture->gross_addition}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($furniture->gross_deduction)){{$furniture->gross_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($furniture->gross_closingbalance)){{$furniture->gross_closingbalance}}@endif</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($furniture->depreciation)){{$furniture->depreciation}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($furniture->depreciation_deduction)){{$furniture->depreciation_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($furniture->netclosing_balance)){{$furniture->netclosing_balance}}@endif</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">@if(!empty($furniture->netclosing_balance)){{$furniture->netclosing_balance}}@endif</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">14</td>
			<td style="padding:3px;">Vehicles</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($vehicles->gross_addition)){{$vehicles->gross_addition}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($vehicles->gross_deduction)){{$vehicles->gross_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($vehicles->gross_closingbalance)){{$vehicles->gross_closingbalance}}@endif</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($vehicles->depreciation)){{$vehicles->depreciation}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($vehicles->depreciation_deduction)){{$vehicles->depreciation_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($vehicles->netclosing_balance)){{$vehicles->netclosing_balance}}@endif</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">@if(!empty($vehicles->netclosing_balance)){{$vehicles->netclosing_balance}}@endif</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">15</td>
			<td style="padding:3px;">Lib. Book &amp; Scientific Journals</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($lib_books->gross_addition)){{$lib_books->gross_addition}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($lib_books->gross_deduction)){{$lib_books->gross_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($lib_books->gross_closingbalance)){{$lib_books->gross_closingbalance}}@endif</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($lib_books->depreciation)){{$lib_books->depreciation}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($lib_books->depreciation_deduction)){{$lib_books->depreciation_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($lib_books->netclosing_balance)){{$lib_books->netclosing_balance}}@endif</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">@if(!empty($lib_books->netclosing_balance)){{$lib_books->netclosing_balance}}@endif</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">16</td>
			<td style="padding:3px;">Small Value Assets</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($small_value_assets->gross_addition)){{$small_value_assets->gross_addition}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($small_value_assets->gross_deduction)){{$small_value_assets->gross_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($small_value_assets->gross_closingbalance)){{$small_value_assets->gross_closingbalance}}@endif</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($small_value_assets->depreciation)){{$small_value_assets->depreciation}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($small_value_assets->depreciation_deduction)){{$small_value_assets->depreciation_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($small_value_assets->netclosing_balance)){{$small_value_assets->netclosing_balance}}@endif</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">@if(!empty($small_value_assets->netclosing_balance)){{$small_value_assets->netclosing_balance}}@endif</td>
		</tr>
		<tr>
			<td style="padding:3px;" colspan="2" class="center"><b>Total:</b></td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
		<tr>
			<td style="padding:3px;" class="center">17</td>
			<td style="padding:3px;">Capital Work in Progress</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($capital_work->gross_addition)){{$capital_work->gross_addition}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($capital_work->gross_deduction)){{$capital_work->gross_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($capital_work->gross_closingbalance)){{$capital_work->gross_closingbalance}}@endif</td>
			<td style="padding:3px;" class="right">0</td>
			<td style="padding:3px;" class="right">@if(!empty($capital_work->depreciation)){{$capital_work->depreciation}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($capital_work->depreciation_deduction)){{$capital_work->depreciation_deduction}}@endif</td>
			<td style="padding:3px;" class="right">@if(!empty($capital_work->netclosing_balance)){{$capital_work->netclosing_balance}}@endif</td>
			<td style="padding:3px;" class="right"></td>
			<td style="padding:3px;" class="right">@if(!empty($capital_work->netclosing_balance)){{$capital_work->netclosing_balance}}@endif</td>
		</tr>
		<tr>
			
			<td colspan="2" style="padding:3px;" class="center">Grand Total</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
			<td style="padding:3px;" class="right">-</td>
		</tr>
	</tbody>
</table>

<!----------------------------------------------------------->
</div>
<!------------------------------------------------->


</body>

</html>