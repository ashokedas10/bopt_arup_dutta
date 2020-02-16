<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Board of Practical Training Eastern Region (Under Ministry Of HRD, Government Of India)</title>
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
    <link rel="stylesheet" href="{{ asset('theme/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/assets/css/style.css') }}">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="{{ asset('theme/assets/css/ars_coolection.css') }}" rel="stylesheet" type="text/css" media="screen">
	<script src="{{ asset('theme/assets/js/jquery.gridly.js') }}" type='text/javascript'></script>
      <script src="{{ asset('theme/assets/js/sample.js') }}" type='text/javascript'></script>
      <script src="{{ asset('theme/assets/js/rainbow.js') }}" type='text/javascript'></script>


 <style>
	body
        {
            background:url({{ asset('theme/images/main-bg.jpg') }})  no-repeat;background-size:100%;font-family: 'Lato', sans-serif;}p{font-family: 'Lato', sans-serif;}.logo-main{position:relative;}.logo-main a img {
            
    max-width: 200px;
    transform: rotate(-90deg);
    
}
.content{margin:80px auto;}
.header {
    padding: 10px 0;
    color: #fff;
}
.logo-inr{
position:absolute;
margin-top:17%;
}
.user-name {float: right;padding-right: 86px;}.user-name h4 {font-size: 16px;}.user-name i{color:red;}.user-name h4 span {margin-left: 15px;} .user-name .ti-user{color:#fff;}
@-moz-document url-prefix(){
.logo-inr{
position:absolute;margin-top:17%;}}
	
</style>
   
</head>

<body>
 
 
 
<!-- <div class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="user-name">
					 <h4><i class="ti-user"></i> Welcome Debarati <span><a href="#" title="logout"><i class="ti-power-off"></i></a></span></h4> 
					
				</div>
			</div>
		</div>
	</div>
</div>-->
<div class="logo-main"><div class="logo-inr" style="    margin-top: 7% !important ;"><a href="{{ url( '/' ) }}"><img src="{{ asset('theme/images/bopt-logo.png') }}" alt="logo" style="max-width: 222px !important;transform: rotate(0deg) !important;" ></a></div></div>
<div class="content">


<section class="text-center example">
        <div class='gridly'>
		
		
		<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 brick small'>
		  <a href="{{ url('role/dashboard') }}" target="_blank">
		  <div class="dash-icon">
		  	<img src="{{ asset('theme/images/role.png') }}" alt="role">
			<p>Role Management</p>
		  </div>
		  </a>
            <!--<a class='delete' href='#'>&times;</a>-->
		</div>
		
		
		
        <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 brick small'>
		  <a href="{{ url('masters/dashboard') }}" target="_blank">
		  <div class="dash-icon">
		  	<img src="{{ asset('theme/images/conf.png') }}" alt="hr">
			<p>Configuration</p>
		  </div>
		  </a>
            <!--<a class='delete' href='#'>&times;</a>-->
		</div>
		
	
		
		
         <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 brick small'>
		  <a href="{{ url('pis/login') }}">
		  	<div class="dash-icon">
		  	<img src="{{ asset('theme/images/hr.png') }}" alt="finance">
			<p>Human Capital Management</p>
		  </div>
		  </a>
            <!--<a class='delete' href='#'>&times;</a></div>-->
		</div>
		
         </div>
		
          
		</div>
      </section>
</div>
 
 
 

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="{{ asset('theme/assets/js/main.js') }}"></script>

        <!--<script src="dragonfly.js"></script>-->
        <script src="{{ asset('theme/assets/js/jquery.js') }}" type='text/javascript'></script>
        <script src="{{ asset('theme/assets/js/jquery.gridly.js') }}" type='text/javascript'></script>
        <script src="{{ asset('theme/assets/js/sample.js') }}" type='text/javascript'></script>
        <script src="{{ asset('theme/assets/js/rainbow.js') }}" type='text/javascript'></script>
</body>
</html>