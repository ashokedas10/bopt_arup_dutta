<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Balance Sheet</title>
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
	.sub{padding-left:30px;}.sub2{padding-left:40px;}
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
<!-------------------Designated-fund-head------------------------>
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
				<!--<h3 style="text-align:center;margin:0;">Establishment Account</h3>-->
				<h4>Establishment Account</h4>
				<h4>Trial Opening Balance-{{$fromdate}} to {{$todate}}</h4>
				</div>

			</td>
			</tr>
		</table>


<!--------------------------fund-body------------------------>
<!--<table style="width:100%">
	<thead><tr>
			<th colspan="4" style="padding:4px;border:none;" class="right">Amount in Rs.</th>
		</tr>
	</thead>
</table>-->
<table border="0" style="width:100%;border-collapse: collapse;">
    @if(!empty($gldtl))
<tr style="    border: 1px solid #000;
    border-right: none;
    border-left: none;">

	<th style="text-align: left; ">SL NO</th>
	<th style="text-align: left;padding: 2px;">ACCOUNT HEADS</th>
	<th style="text-align: right;">DEBIT</th>
	<th style="text-align: right;">CREDIT</th>


</tr>

@foreach($gldtl as $paylist)
@php  $debittotal=0;
 $credittotal=0;@endphp
<tr>
	<td></td>
 	<td style="text-decoration:underline;">{{$paylist['gl_account_head']}}</td>
  <td></td>
   <td></td>

 </tr>

<?php
$range = [$fromdate, $todate];


$dtlacc  = DB::table('gl_entry')

->whereBetween('gl_date', $range)
->where('gl_account_head','=',$paylist['account_head'])
->groupBy('transaction_head')
 ->get();

$num=1;
 foreach($dtlacc as $value){
    $subaccount_head='';
    $account2='';
    $subaccount_debit=DB::table('gl_entry')
    ->select( DB::raw('SUM(amount) AS amount'))
->whereBetween('gl_date', $range)
    ->where('transaction_head','=',$value->transaction_head)
    ->where('transaction_type','=','debit')

     ->first();
     $subaccount_credit=DB::table('gl_entry')
    ->select( DB::raw('SUM(amount) AS amount'))
->whereBetween('gl_date', $range)
    ->where('transaction_head','=',$value->transaction_head)
    ->where('transaction_type','=','credit')

     ->first();
     $account2=DB::table('account_master')

    ->join('coa_master', 'coa_master.account_name', '=', 'account_master.account_name')
    ->where('coa_master.coa_code','=',$value->transaction_head)
     ->first();

if($subaccount_debit->amount!=0){
    $debit=$subaccount_debit->amount;
}else{
    $debit=0;
}


if($subaccount_credit->amount!=0){
    $credit=$subaccount_credit->amount;
}else{
    $credit=0;
}
     $debittotal+=$subaccount_debit->amount;
     $credittotal+=$subaccount_credit->amount;





?>
 <tr>

	<td>{{$num}}</td>
<td>{{$account2->head_name}}</td>
  <td style="text-align:right;border-left: none;border-right: none;">{{$debit}}</td>
   <td style="text-align: right;border-left: none;border-right: none;">{{$credit}}</td>

 </tr>

 <?php
$num++;
  }


  ?>
  <tr style="text-align: center; padding-top: 4px;">
    <td></td>
    <td style="font-size: 23px;">TOTAL</td>
        <td style="text-align: right;border: 1px solid black;border-left: none;border-right: none;">{{$debittotal}}</td>
    <td style="text-align: right;border: 1px solid black;border-left: none;border-right: none;">{{$credittotal}}</td>
</tr>
    @endforeach
@endif






























</table>
<!----------------------------------------------------->
</div>
<!------------------------------------------------->

</body>

</html>
