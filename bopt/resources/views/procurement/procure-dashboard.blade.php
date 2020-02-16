<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BOPT BRP</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="{{ asset('css/ars_coolection.css') }}" rel="stylesheet" type="text/css" media="screen">
	<script src="{{ asset('js/jquery.gridly.js') }}" type='text/javascript'></script>
      <script src="{{ asset('js/sample.js') }}" type='text/javascript'></script>
      <script src="{{ asset('js/rainbow.js') }}" type='text/javascript'></script>
<style>
	body{background:#e0e0e0;font-family: 'Lato', sans-serif;}p{font-family: 'Lato', sans-serif;}
	.main-body {padding: 8% 0;}
	.pis-hd h2 span {font-size: 12px;}

	.pis-hd {
   background: #034f88;
    width: 268px;
    padding: 15px 12px;
    color: #fff;
    border: 2px solid #fff;
    margin-right: 1px;
}
.rice-logo{text-align:center;}
.rice-logo img {
    max-width: 150px;

}
.pay-icon {
    background: #CE4C58;
    padding: 15% 0;
    border: 2px solid #fff;
}
.pay-icon img {
       width: 75px;
    height: auto;
}
.pay-cont {
    background: #fff;
    padding: 16.2px 10px;;
}
.pay-cont h3 {
    font-size: 19px;
    font-weight: 600;
    margin-bottom: 10%;
}
.pay-cont a {
    background: #ce4c58;
    color: #fff;
    padding: 9px 36px;
    border-radius: 50px;
	text-decoration: none;
}
.pay-icon.red {
    padding: 21px 0;
}
.pay-icon.pink{background: #b928a6;padding: 21px 0;}
.boxOuter{ float:left !important; margin:0px 2px 0 0; padding:0px; width:30% !important;margin-bottom:3px;}
.boxOuter .col-lg-3{ width:100%; max-width: 100%; padding:0px; margin:0px;}




.boxOuter2{ float:left !important; margin:0px 2px 0px 0px; padding:0px; width:44% !important;}
.boxOuter2 .col-lg-6{ width:100%; max-width: 100%; padding:0px; margin:0px;}

.boxOuter2 .pay-icon{ width:50%; float:left; background:#7E3C94; text-align:center; min-height:223px; }
.boxOuter2 .pay-icon img{ width:75px; height:auto; text-align:center; display:block; margin:0px auto; }
.boxOuter2 .pay-cont{ width:50%; float:left; background:#ffffff; text-align:center; min-height:223px; }
.boxOuter2 .pay-cont h3 { font-size: 19px; font-weight: 600; margin-bottom: 20%; padding: 40px 10px 0px; }
.boxOuter2 .pay-cont a { background: #7e3c94;color: #fff; padding: 9px 36px;  border-radius: 50px;}
.boxOuter2 .pay-cont.green a {background: #648304;}


.boxOuter3{ float:left !important; margin:0px 0px 0px 0px; padding:0px; width:24% !important;}
.boxOuter3 .col-lg-3{ width:100%; max-width: 100%; padding:0px; margin:0px; }

 .boxOuter2 .pay-icon.green {background: #648304;    min-height: 216px;}
.boxOuter3 .pay-icon{ width:100%; float:left; background:#0FA5C8; text-align:center; min-height:100px; }
.boxOuter3 .pay-icon img{ width:auto; height:50px; text-align:center; display:block; margin:0px auto; }

.boxOuter3 .pay-cont{ width:100%; float:left; background:#ffffff; text-align:center; min-height:108px; padding:0px; margin:0px; }
.boxOuter3 .pay-cont h3 { font-size: 19px; font-weight: 600; margin-bottom: 10%; padding: 15px 10px 0px; }
.boxOuter3 .pay-cont a { background: #0FA5C8;color: #fff; padding: 9px 36px;  border-radius: 50px;}
.pay-cont.pink a {background: #b928a6;}

</style>

</head>

<body>

<div class="main-body">
<div class="container">
<div class="row">
	<div class="col-lg-3">
		<div class="pis-hd">
			<h2>Procurement</h2>
		</div>

	<div class="rice-logo">
		<a href="index.php"><img src="{{ asset('images/logo2.png') }}" alt=""></a>
	</div>
	</div>

	<div class="text-center col-lg-9" style="padding:0;">
		<div class="payroll-main">



		<div class="boxOuter">
			<div class="col-lg-3">
				<div class="pay-icon red">
				<img src="{{ asset('images/indenting.png') }}" alt="payroll">
				</div>
				<div class="pay-cont">
					<h3>Indenting</h3>
					<div class="clearfix"></div>
					<a href="{{ url('procurement/indent/dashboard') }}" >Start</a>
				</div>
			</div>
			</div>

			<div class="boxOuter2">
			<div class="col-lg-6">
				<div class="pay-icon">
				<img src="{{ asset('images/inventory.png') }}" alt="payroll">
				</div>
				<div class="pay-cont">
					<h3>Inventory</h3>
					<div class="clearfix"></div>
					<a href="{{ url('procurement/inventory/dashboard') }}" >Start</a>
				</div>
			</div>
			</div>


			<div class="boxOuter3">
			<div class="col-lg-3">
				<div class="pay-icon">
				<img src="{{ asset('images/purchase.png') }}" alt="payroll">
				</div>
				<div class="pay-cont">
					<h3>Purchase</h3>
					<div class="clearfix"></div>
					<a href="{{ url('procurement/purchase/dashboard') }}" >Start</a>
				</div>
			</div>
			</div>
<div class="clearfix"></div>
            <div class="boxOuter">
                <div class="col-lg-3">
                    <div class="pay-icon red" style="background: #e29e06;">
                        <img src="{{ asset('images/box.png') }}" alt="payroll">
                    </div>
                    <div class="pay-cont">
                        <h3>Stock</h3>
                        <div class="clearfix"></div>
                        <a href="{{ url('procurement/stock/dashboard') }}" style="background: #e29e06;">Start</a>
                    </div>
                </div>
            </div>

			<div class="clearfix"></div>

			<!-- <div class="boxOuter2" style="padding:10px;">
			<div class="col-lg-6">
				<div class="pay-icon green">
				<img src="{{ asset('images/hr.png') }}" alt="payroll">
				</div>
				<div class="pay-cont green" style="min-height: 216px;">
					<h3>Production</h3>
					<div class="clearfix"></div>
					<a href="#">Start</a>
				</div>
			</div>
			</div>

			<div class="boxOuter" style="padding: 7px 10px 10px 0;">
			<div class="col-lg-3">
				<div class="pay-icon pink">
				<img src="{{ asset('images/intervw.png') }}" alt="intervw">
				</div>
				<div class="pay-cont pink">
					<h3>Sales</h3>
					<div class="clearfix"></div>
					<a href="{{ url('procurement/sales/dashboard') }}" target="_blank">Start</a>
				</div>
			</div>
			</div> -->

			<!--<div class="boxOuter">
			<div class="col-lg-3">
				<div class="pay-icon pink">
				<img src="images/intervw.png" alt="intervw">
				</div>
				<div class="pay-cont pink">
					<h3>Result Management</h3>
					<div class="clearfix"></div>
					<a href="interview-details/index.php" target="_blank">Start</a>
				</div>
			</div>
			</div>

			<div class="boxOuter3">
			<div class="col-lg-3">
				<div class="pay-icon">
				<img src="images/leave-application-icon.png" alt="payroll">
				</div>
				<div class="pay-cont">
					<h3>Room Management</h3>
					<div class="clearfix"></div>
					<a href="SMS/room-management/index.php" target="_blank">Start</a>
				</div>
			</div>
			</div>
			<div class="clearfix"></div>
			<div class="boxOuter3">
			<div class="col-lg-3">
				<div class="pay-icon">
				<img src="images/leave-application-icon.png" alt="payroll">
				</div>
				<div class="pay-cont">
					<h3>Hostel Management</h3>
					<div class="clearfix"></div>
					<a href="#">Start</a>
				</div>
			</div>
			</div>

			<div class="boxOuter">
			<div class="col-lg-3">
				<div class="pay-icon pink">
				<img src="images/intervw.png" alt="intervw">
				</div>
				<div class="pay-cont pink">
					<h3>Cantein Management</h3>
					<div class="clearfix"></div>
					<a href="interview-details/index.php" target="_blank">Start</a>
				</div>
			</div>
			</div>

			<div class="boxOuter2">
			<div class="col-lg-6">
				<div class="pay-icon green">
				<img src="images/hr.png" alt="payroll">
				</div>
				<div class="pay-cont green" style="min-height: 216px;">
					<h3>Transport Management</h3>
					<div class="clearfix"></div>
					<a href="#">Start</a>
				</div>
			</div>
			</div>-->
		</div>
	</div>
</div>
</div>
</div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

<!--<script src="dragonfly.js"></script>-->
<script src="{{ asset('js/jquery.js') }}" type='text/javascript'></script>
<script src="{{ asset('js/jquery.gridly.js') }}" type='text/javascript'></script>
      <script src="{{ asset('js/sample.js') }}" type='text/javascript'></script>
      <script src="{{ asset('js/rainbow.js') }}" type='text/javascript'></script>
</body>
</html>
