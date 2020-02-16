<?php

$montharr = explode('/',$month);
$m = $montharr[0];
$y = $montharr[1];
$m = ltrim($m, '0');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Provident Fund Statement For the Month of {{ $month }}</title>
</head>
<body>
<style>
.tableBody{ margin:0px auto; padding:20px 20px; display:block; background:#fff; width:95%; font-family:Arial, Helvetica, sans-serif; font-size:14px;}
.deductionButm{ margin:50px 0px 0px 0px; padding:0px;}
.tableLeft{ margin: -37px 0px 0px 0px; padding:0px; }
.tableRight{ border-left:1px dotted; padding:0px 0px 0px 20px !important; margin:0px;}
</style>
<div class="tableBody">
  <table width="100%" border="0">
    <tr>
      <td width="10%"><img src="{{ url('/') }}/storage/app/{{ $company_logo_rs->company_logo }}" alt="" width="100" /></td>
      <td width="90%">
<h2 style="text-align:center; font-size:20px; margin:0px; padding:0px 0px 6px 0px; font-weight:normal;
">Roy's Institute of Competitive Examination Pvt Ltd</h2>
<p style="font-family:Arial, Helvetica, sans-serif; font-size:14pz; padding:0px 0px 6px 0px; margin:0px; text-align:center;">11D/1, Barrackpore Trunk Rd, Government Quarters, Santhi Nagra Colony, Belghoria, Kolkata, West Bengal 700056</p>
<p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:0px 0px 6px 0px; margin:0px; text-align:center;">Phone: 033 2564 4340</p>
<h3 style="text-align:center; font-size:18px; margin:0px; padding:0px 0px 6px 0px; font-weight:normal;">Provident Fund Statement For the Month of {{ date("F", mktime(0, 0, 0, $m, 1)) }} {{ $y }}</h3>
</td>
</tr>
</table>
<table width="100%" border="1" style="border-collapse:collapse; margin:10px 0px 0px 0px;">
<tr style="background:#cccccc7a;">
<td><p style="font-size:14px; font-family:Arial, Helvetica, sans-serif; padding:2px 4px; margin:0px; text-align:center; font-weight:bold;">SL No.</p></td>
<td><p style="font-size:14px; font-family:Arial, Helvetica, sans-serif; padding:2px 4px; margin:0px; text-align:center; font-weight:bold;">Employer Code</p></td>
<td><p style="font-size:14px; font-family:Arial, Helvetica, sans-serif; padding:2px 4px; margin:0px; text-align:center; font-weight:bold;">Employer Name</p></td>
<td><p style="font-size:14px; font-family:Arial, Helvetica, sans-serif; padding:4px 4px; margin:0px; text-align:center; font-weight:bold;">PF No.</p></td>
<td><p style="font-size:14px; font-family:Arial, Helvetica, sans-serif; padding:4px 4px; margin:0px; text-align:center; font-weight:bold;">PF Deduction</p></td>



</tr>
@foreach($pf_rs as $pf)
    <tr>
      <td><p style="font-size:12px; font-family:Arial, Helvetica, sans-serif; padding:8px 2px; text-align:center; margin:0px;">{{ $loop->iteration }}</p></td>
	  <td><p style="font-size:12px; font-family:Arial, Helvetica, sans-serif; padding:8px 2px; text-align:center; margin:0px;">{{ $pf->employee_id }}</p></td>
      <td><p style="font-size:12px; font-family:Arial, Helvetica, sans-serif; padding:8px 2px; text-align:center; margin:0px;">{{ $pf->emp_name }}</p></td>
	  <td><p style="font-size:14px; font-family:Arial, Helvetica, sans-serif; padding:4px 4px; margin:0px; text-align:center;">{{ $pf->pf_no }}</p></td>
      <td><p style="font-size:12px; font-family:Arial, Helvetica, sans-serif; padding:8px 2px; text-align:center; margin:0px;">{{ $pf->pf }}</p></td>
    </tr>
@endforeach    
  </table>
</div>
</body>
</html>
