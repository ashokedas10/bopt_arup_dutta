<!DOCTYPE html>
<html lang="en">
<head>
    <title>Board of Practical Training | Arrear Statement</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {-webkit-print-color-adjust: exact;}
        .payslip{font-family:cambria;}
        .payslip .pay-head h2 {font-size: 22px;color: #292929;text-align:center;margin:0;}
        .payslip .pay-head h3{text-align:right;margin:0;}
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
        .emp-det tr.part td{padding:5px;text-align:left;font-weight:600;border-top:none;background:#efefef;}
        .sal-det tr td{padding:7px 10px;text-align:left;}
        .sal-det tr td p{text-align:right;margin:0;}.mon{text-align:center;font-size:16px;}.mon h3{color:#0099be;margin:0;font-size:25px;}.mon h4{margin:0;}
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
                    <h2>Board	of	Practical	Training	Eastern	Region	</h2>
                    <!--<h3>(Under	Ministry	Of HRD,	Government	Of	India)</h3>-->
                    <!--<h4>Block	EA,	Sector-I,	Opposite	Labony	Estate,	Salt	Lake	City,	Kolkata-700064</h4>-->
                </div>
                <div class="mon">
                    <h4>Arrear Statement from {{date('d-M-Y', strtotime($from_date))}} to {{date('d-M-Y', strtotime($to_date))}}</h4>
                </div>
            </td>
        </tr>
    </table>
    <!--------------------------->
    <!--------------employee-details--------------->

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
            @if($arrear_name == 'basic')
                <td style="text-align:right;"></td>
            @else
            <td style="text-align:right;">0</td>
            @endif
            <td>GPF</td>
            <td style="text-align:right;">0</td>
        </tr>
        <tr>
            @if($arrear_name == '2')
                <td>Dearness Allowance</td>
                <td style="text-align:right;">{{$arears[0]->total_da}}</td>
                <td>NPS</td>
                <td style="text-align:right;">{{$arears[0]->total_nps}}</td>
            @else
                <td>Dearness Allowance</td>
                <td style="text-align:right;">0</td>
                <td>NPS</td>
                <td style="text-align:right;">0</td>
            @endif

        </tr>
        <tr>
            <td>HRA</td>
            <td style="text-align:right;">0</td>
            <td>CPF</td>
            <td style="text-align:right;">0</td>
        </tr>
        <tr>
            <td>Transport Allowance</td>
            <td style="text-align:right;">0</td>
            <td>GSLI</td>
            <td style="text-align:right;">0</td>
        </tr>
        <tr>
            @if($arrear_name == '2')
                <td>D.A. on T.A.</td>
                <td style="text-align:right;">{{$arears[0]->total_ta}}</td>
                <td>Professional Tax</td>
                <td style="text-align:right;">{{$arears[0]->total_ptax}}</td>
            @else
                <td>D.A. on T.A.</td>
                <td style="text-align:right;">0</td>
                <td>Professional Tax</td>
                <td style="text-align:right;">0</td>
            @endif
        </tr>
        </tr>
        <tr>
            <td>Special Allowance</td>
            <td style="text-align:right;">0</td>
            <td>Income Tax</td>
            <td style="text-align:right;">0</td>
        <tr>
            <td>Cash Handling Allowance</td>
            <td style="text-align:right;">0</td>
            <td>CESS</td>
            <td style="text-align:right;">0</td>
        </tr>
        <tr>
            <td>Others</td>
            <td style="text-align:right;">0</td>
            <td>Others</td>
            <td style="text-align:right;">0</td>
        </tr>

        <tr class="total">
            <td>Total</td>
            <td style="text-align:right;">{{$total_earnings}}</td>
            <td>Total</td>
            <td style="text-align:right;">{{$total_deductions}}</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:right;"></td>
            <td style="font-weight:600;">Total Earnings</td>
            <td style="font-weight:600;text-align:right;"	>{{$total_earnings}}</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:right;"></td>
            <td style="font-weight:600;">Total Deduction</td>
            <td style="font-weight:600;text-align:right;"	>{{$total_deductions}}</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align:right;"></td>
            <td style="font-weight:600;">Net Pay</td>
            <td style="font-weight:600;text-align:right;"	>{{$net_earnings}}</td>
        </tr>
        <tr>
            <?php $number = $net_earnings;
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
            ?>
            <td colspan="4" style="text-align:center;font-weight:600;"> Net Pay in Words: RUPEES {{strtoupper($result)}}</td>

        </tr>
        <tr>
            <td style="text-align:center;font-weight:600;padding-top:50px;">Dealing Assistant</td>
            <td style="text-align:center;font-weight:600;padding-top:50px;">Junior Accountant</td>
            <td style="text-align:center;font-weight:600;padding-top:50px;">Admin cum Accounts Officer</td>
            <td style="text-align:center;font-weight:600;padding-top:50px;">Director</td>
        </tr>
        </tbody>
    </table>

    <!------------------------------------->

</div>

<!---------------------------------------------------->


<!---------------------js------------------------------------->
<!-------------------------------------------------------->
</body>
</html>
