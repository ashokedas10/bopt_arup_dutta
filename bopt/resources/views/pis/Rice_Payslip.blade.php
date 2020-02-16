<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RICE PaySlip</title>
</head>
<body>
<style>
.tableBody{ margin:0px auto; padding:20px 20px; display:block; background:#fff; width:80%; font-family:Arial, Helvetica, sans-serif; font-size:14px;}
.deductionButm{ margin:50px 0px 0px 0px; padding:0px;}
.tableLeft{ margin: -37px 0px 0px 0px; padding:0px; }
.tableRight{ border-left:1px dotted; padding:0px 0px 0px 20px !important; margin:0px;}
</style>
<div class="tableBody">
  <table width="100%" border="0">
    <tr>
	
	   <td width="10%"><a href="#"><img src="rice-logo.jpg" alt="" /></a></td>
<td width="90%"><h2 style="text-align:center; font-size:20px; padding:0px 0px 10px 0px; margin:0px; font-weight:normal;">Roy's Institute of Competitive Examination Pvt Ltd</h2>
        <h3 style="text-align:center; font-size:18px; padding:0px 0px 20px 0px; margin:0px; font-weight:normal;">11/1 B.T.Road Kol-700056</h3></td>
    </tr>
  </table>
  <table width="100%" border="0" style="border-bottom:1px solid #000; border-top:1px solid #000; padding:6px 0px;">
    <tr>
      <td><p style="font-size:15px; text-align:left; padding:0px; margin:0px;">Grade : <span>{{ $payroll_details_rs->grade_name }}</span></p></td>
      <td><p style="font-size:15px; text-align: center; padding:0px; margin:0px;">All Figures in Rupees</p></td>
    </tr>
  </table>
  <table width="100%" border="0">
    <tr>
      <td><table width="100%" border="0" style="font-size:14px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">Name :</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">{{ $payroll_details_rs->emp_name }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">Bank A/C :</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">{{ $payroll_details_rs->account_number }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">Location :</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">Adamas World School</td>
          </tr>
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">UAN:</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">0</td>
          </tr>
        </table></td>
      <td><table width="100%" border="0" style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">PF A/C No.</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">{{ $payroll_details_rs->pf_no }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">Month/Year</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">{{ $payroll_details_rs->month }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">Aadhar No:</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">{{ $payroll_details_rs->adhar_no }}</td>
          </tr>
        </table></td>
      <td><table width="100%" border="0">
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">EmpId :</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">{{ $payroll_details_rs->employee_id }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">ESI Reg No.</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">{{ $payroll_details_rs->esic_no }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">Pan :</td>
            <td style="font-size:13px; padding:0px; margin:0px; font-family:Arial, Helvetica, sans-serif;">{{ $payroll_details_rs->pan_no }}</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <table width="100%" border="0" style="border-bottom:1px solid #000; border-top:1px solid #000; padding:6px 0px;">
    <tr>
      <td><p style="font-size:15px; text-align:left; padding:0px; margin:0px;">Basic Pay : <span>{{ $payroll_details_rs->basic }}</span></p></td>
      <td><p style="font-size:15px; text-align:center; padding:0px; margin:0px;">Days Worked : <span> 30.00 </span> </p></td>
    </tr>
  </table>
  <table width="100%" border="0">
    <tr>
      <td style="width:50%;"><table width="100%" border="0" class="tableLeft">
          <tr>
            <td style="font-size:17px; font-family:Arial, Helvetica, sans-serif; padding:6px 0px; margin:0px; text-decoration:underline;">Salary Details :</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Basic Salary</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->basic }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Dearness Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->da }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">House Rent Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->hra }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Conveyance Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->conv }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Wash Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->wash }}</td>
          </tr>
		  <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Residential Special Class</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->splclass }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Doubt Clear Class</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->doubtclear }}</td>
          </tr>
		   <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Evening Class Sealdah</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->evengseal }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Evening Class Belghoria</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->evengbel }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Off-day Class Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->offdayclass }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Medical Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->medical }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Special Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->spa }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Telephone Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->telephone }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Performance Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->perform }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Food Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->food }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Over Time</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->ot }}</td>
          </tr>
		  <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Extra Duty Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->xtraduty }}</td>
          </tr>
		  <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Other Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->othallow }}</td>
          </tr>
		  <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Fixed Allowance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->fixallow }}</td>
          </tr>
		  <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Gradepay</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->gradepay }}</td>
          </tr>
          <tr>
            <td style="border-top: 1px solid #000; padding: 12px 0px 0px 0px; width: 70%; margin: 11px 0px 0px 0px; ">GROSS PAYMENT</td>
            <td style="border-top: 1px solid #000; padding: 12px 0px 0px 0px; width: 70%; margin: 11px 0px 0px 0px; ">{{ $payroll_details_rs->gross_salary }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">TOTAL DEDUCTION</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->total_deduction }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">NET PAYMENT</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->net_salary }}</td>
          </tr>
        </table></td>
      <td style="width:50%; margin:0px; padding:0px; float:left; width:100%;" class="tableRight"><table width="100%" border="0">
          <tr>
            <td style="font-size:17px; font-family:Arial, Helvetica, sans-serif; padding:6px 0px; margin:0px; text-decoration:underline;">Deduction</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Providend Fund</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->pf }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">E. S. I</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->esi }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Professional Tax</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->ptax }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Income Tax</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->itax }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Other Deduction</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->othded }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Cess</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->cess }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Late Deduction</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->late_amt }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Loan Principal</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->advance }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Loan Interest</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->int_advance }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">CD Bank</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->cd_bank }}</td>
          </tr>
          <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Flood Relief</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->cd_emp }}</td>
          </tr>
		  <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Salary Advance</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->saladv }}</td>
          </tr>
		  <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Fooding Charges</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->foodchg }}</td>
          </tr>
		   <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Transport Charges</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->tranchg }}</td>
          </tr>
		   <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Maintenance Charges</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->mantchg }}</td>
          </tr>
		  <tr>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Other Adjustment</td>
            <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">{{ $payroll_details_rs->othadj }}</td>
          </tr>
        </table>
        <div class="deductionButm">
          <table width="100%" border="0" style="margin:40px 0px 0px 0px 0px; padding:0px;">
            <tr>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px; text-decoration:underline; font-weight:bold;">Loan / Advances</td>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px; text-decoration:underline; font-weight:bold;">Deduction</td>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px; text-decoration:underline; font-weight:bold;">Outstanding</td>
            </tr>
            <tr>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Loan Principal</td>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">0.00</td>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">0.00</td>
            </tr>
            <tr>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Loan Interest</td>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">0.00</td>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">0.00</td>
            </tr>
            <tr>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">Salary Advance</td>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">1,500.00</td>
              <td style="font-size:13px; font-family:Arial, Helvetica, sans-serif; padding:4px 0px; margin:0px;">0.00</td>
            </tr>
            <tr>
              <td style="font-size:13px; padding:20px 0px 0px 0px; margin:0px; font-weight:bold;">TOT DEDUCTION</td>
              <td style="font-size:13px; padding:0px; margin:0px; font-weight:bold;">{{ $payroll_details_rs->total_deduction }}</td>
              <td style="font-size:13\	px; padding:0px; margin:0px; font-weight:bold;">&nbsp;</td>
            </tr>
          </table>
        </div></td>
    </tr>
  </table>
  
  <table width="100%" border="0" style="border-bottom:1px solid #000; border-top:1px solid #000; padding:6px 0px; margin:40px 0px 0px 0px;">
    <tr>
      <td><p style="font-size:15px; text-align:left; padding:0px; margin:0px; font-weight:bold;">RUPEES: <span style="padding:0px 0px 0px 40px;"><?php echo $net_payment; ?></span></p></td>
    </tr>
  </table>
</div>
</body>
</html>
\	