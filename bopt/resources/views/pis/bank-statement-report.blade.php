<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board of Practical Training | Bank Statement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <style type="text/css" media="print"> @page { size: auto; /* auto is the initial value */  
   	margin-top: 0;
    margin-bottom: 0; /* this affects the margin in the printer settings */ }  
   </style>
  <style>
body {-webkit-print-color-adjust: exact;font-family:Arial, Helvetica, sans-serif;}
.bank-state table td h2, .bank-state table td h1{text-align:center;}
.bank-state table tr td{vertical-align:top;}
table{width:100%;position:relative;}
.acnt thead tr th, .acnt tr td{padding:4px;font-size:12px;border:1px solid #000;}
.acnt .head td{background:#ddd;font-weight:600;text-align:center;}
.center{text-align:center;}.right{text-align:right;}
tfoot{position:fixed;bottom:0;width:100%;}
/*.bank-state.header table{position:fixed;top:0;}*/
/*.footer{position:relative;}
.footer table{position:fixed;bottom:0;}*/
	@media print
{
  table { page-break-after:auto !important; }
  tr    { page-break-inside:avoid !important; page-break-after:auto !important; }
  td    { page-break-inside:avoid !important; page-break-after:auto !important; }
  thead { display:table-header-group !important; }
  tfoot { display:table-footer-group !important; }
 /* @page {size: landscape}*/
}


  </style>
</head>
<body>
<!-------------------bank-statement-head------------------------->
<table class="acnt" style="border-collapse:collapse;">
	<thead>
		<tr style="border:none;">
			<th style="text-align:left;border:none;"><img src="{{ asset('images/img/logo.png')}}" alt="logo" width="100"></th>
			<th colspan="3" style="text-align:center;border:none;">व्यावहारिक प्रशिक्षण बोर्ड (पूर्वी क्षेत्र)</h2>
				<h1 style="text-align:center;margin:0;font-size:15px;">Board of Practical Training (Eastern Region)</br> (Under Ministry of HRD, Government of India)</h1>
				<p style="text-align:center;margin:0;font-size: 11px;">भारत सरकार के मानव संसाधन विकास मंत्रालय के उच्चतर शिक्षा विभाग के अधीन</p>
				<p style="text-align:center;margin:0;text-transform:uppercase;font-size: 7.5px;"></p>
			</th>
			<th style="text-align:center;border:none;"><img src="{{ asset('images/img/nats.png')}}" alt="NATS logo" width="80"><p style="margin:0;"><img style="width:120px;" src="{{ asset('images/img/caption.png')}}" alt=""></p><p style="font-size:14px;margin:0">www.mhrdnats.gov.in</p></th>
			
		</tr>
	</thead>

<br clear="all">
<!---------------------------------------------------->
<?php 
$dt=$month;
$dtar=explode('/',$dt);
$paymonth= $monthName = strftime('%B', mktime(0, 0, 0, $dtar[0]));
?>
<!------------bank-statement-body---------------------->

	<tr>
		<td colspan="3" style="border:none;">Ref: _____________________________</td>
		<td colspan="2" style="text-align:right;border:none;">Date: <?php echo date('d-m-Y'); ?></td>
	</tr>
	
	<tr>
		<td colspan="5" style="border:none;">
			<p style="margin:0;line-height:19px;">To,</p>
			<p style="margin:0;line-height:19px;">The Chief Manager,</p>
			<p style="margin:0;line-height:19px;">State Bank of India,</p>
			<p style="margin:0;line-height:19px;">Salt Lake City, DB-2, Sector- I</p>
			<p style="margin:0;line-height:19px;">Kolkata - 700 064</p>
		</td>
	</tr>
	
	<tr>
		<td colspan="5" style="border:none;">
			<p style="line-height:19px;margin:0;margin-top:5px;text-align: justify;">It is requested to credit following amount in respective bank account of the employees of this office on account of pay &amp; allowances for the month of <b><?php echo $paymonth; ?> - <?php echo $dtar[1]; ?></b> on  __________________ from account no 10836424084 of this office.</p>
		</td>
	</tr>

<!------------------------------------------>

<!-----------------bank-statement-table-------------------->
<tbody style="border:1px solid #000;">
	<tr class="head">
			<td>SL. NO.</td>
			<td>NAME OF THE EMPLOYEES</td>
			<td>EMPLOYEE'S ACCOUNT NO.</td>
			<td>IFSC CODE</td>
			<td>AMOUNT (<i class="fas fa-rupee-sign"></i>)</td>
		</tr>

	
		@if(isset($payroll_details_rs) && !empty($payroll_details_rs))
		@php $total=0; @endphp
		@foreach($payroll_details_rs as $key=>$statement)
		@php $total = $total + $statement->emp_net_salary; @endphp
		
		<tr>
			<td class="center" width="70">{{$loop->iteration}}</td>
			<td>{{$statement->emp_name}}</td>
			<td>{{$statement->emp_account_no}}</td>
			<td>{{$statement->emp_ifsc_code}}</td>
			<td style="text-align: right;">{{$statement->emp_net_salary}}</td>
		</tr>
		@endforeach
		@endif
	
<?php $number = $total;
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
		<td class="left" style="font-weight:600;border-right: none;">Total In Figures</td>
		<td colspan="4" class="center" style="font-weight:600;text-align:right;border-left:none;">{{$total}}</td>
	</tr>
	
	<tr>
		<td width="150" style="border-right:none;font-weight:600;"> Total in Words</td>
		<td colspan="4" class="right" style="font-weight:600;padding:5px 2px;border-left:none;font-size:10px;">(<u>RUPEES <?php echo strtoupper($result); ?></u>)</td>
	</tr>
	
	
	</tbody>






<!-----------------------footer------------------------->
<tfoot>

	<!--------------------signature-------------------->
	<tr>
		<td colspan="3" style="border:none;width:800px;"><p style="margin-bottom:50px;padding-left:45px;">Thanking You</p>
			<p style="padding-left:15px;margin:0;" class="">Admin-cum-Accounts Officer</p>
			<p style="padding-left:25px;margin:0;" class="">Contact No. 8583967888</p>
		</td>
		<td colspan="2" class="right" style="border:none;padding-right:20px;"><br><br><br><br><br> Director</td>
	</tr>
	<!--------------------------------------->
	<tr>
	<td style="border:none;width:150px;"><img src="{{ asset('images/img/swachh-bharat.png')}}" alt="" width="130"></td>
	<td style="border:none;" colspan="4">
		<p style="font-size:9px;margin:0;font-family: 'Hind', sans-serif;">ब्लॉक - ईए, सेक्टर - I (लाबोनी एस्टेट के विपरीत), साल्ट लेक सिटी, कोलकाता - 700064, फोन/Phone- (033) 2337-0750 / 51, फैक्स/Fax - (033) 2321-6814</p>
		<p style="font-size:8px;margin:0;font-family: 'Hind', sans-serif;">Block - EA, Sector - I (Opposite.Laboni Estate), Salt Lake City, Kolkata - 700 064, ई-मेल/E-mail - inf@bopter.gov.in, वेबसाइट/Website - www.bopter.gov.in</p>
	</td>
	</tr>
</tfoot>
</table>

<!------------------------------------------------->


</body>
</html>