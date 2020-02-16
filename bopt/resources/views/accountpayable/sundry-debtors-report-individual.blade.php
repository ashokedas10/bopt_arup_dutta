<!DOCTYPE html>
<html lang="en">
<head>
    <title>Board of Practical Training | Account Payable Report</title>
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
        .ledger tr td{padding:3px;}
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
                    <img src="{{asset('images/logo2.png')}}" alt="logo">
                </div>
            </td>
            <td>
                <div class="text-center pay-head">
                    <h2>Board of Practical Training (ER)</h2>
                    <h4>Details of {{ $due_parties[0]->party_name }}</h4>
                </div>

            </td>
        </tr>
    </table>
    <!--------------------------->
    <!---------------------------------------------------->

    <!------------journal-voucher-body---------------------->


    <table border="1" class="ledger" style="border-collapse:collapse;width:100%;border: 1px solid #000;">
        <thead style="padding: 5px;
    background:#ddd;">
        <tr>
            <th class="left" style="padding: 5px; width:30%;">Sl.No.</th>
            <th class="right" style="padding: 5px; width:30%;">Due Amount</th>
        </tr>
        </thead>
        @php $amount = 0; @endphp
        @foreach($due_parties as $due_party)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="right">{{ $due_party->amt }}</td>
        </tr>

            @php $amount += $due_party->amt; @endphp
        @endforeach

        <?php $number = $amount;
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

        <tr>
            <td colspan="" class="right" style="border-right:none;">Total</td>
            <td class="right" style="border-left:none;">{{ $amount }}</td>
        </tr>
        <tr>
            <td colspan="3">In words : RUPEES {{strtoupper($result)}}</td>
        </tr>
    </table>

    <!---------------------------------------->

    <!-----------------------footer------<tr>
            <td>1</td>
            <td></td>

    <td class="right">10,000</td>
        </tr>------------------>
    <!--<table style="width:100%;text-align:center;margin-top:10%;">
        <tr>
                    <td style="width:33.33%;">___________________________<br>
                    Assistant</td>
                    <td style="width:33.33%;">___________________________<br>Jr. Accountant</td>
                    <td style="width:33.33%;">______________________________________<br>Admin-cum-Accounts Officer</td>
                </tr>
    </table>-->
    </div>

    <!------------------------------------------------->


</body>

</html>
