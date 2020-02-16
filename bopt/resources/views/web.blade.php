<!DOCTYPE html>
<html>
<head>
	<title>BOPT | BRP </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{asset('theme/first-screen/logo.png')}}" sizes="16x16" type="image/png"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		a, a:hover{
			text-decoration: none;
			color: inherit;
		}
		.banner{
			background: url(public/theme/first-screen//cover3.jpg) no-repeat center;
			background-size: cover;
			min-height: 100vh;
			position: relative;
		}
		nav{
			/*background: rgba(0, 0, 0, 0.5);*/
			padding: 0 !important;
		}
		.list-inline {
			width: 100%;
		}
		.list-inline li{
			
		}
		.list-inline li img{
			width: 18%;
			float: left;
			position: relative;
    		top: 10px;
		}
		.list-inline li:last-child{
			float: right;
		}
		.list-inline li:last-child button{
			margin: 25px 0;
		   height: 30px;
		   width:30px;
		   border-radius: 50%;
		    border: none;
		    background: #257be3;
		    color: #fff;
		}
		.name{
			font-size: 24px;
		    color: #fff;
		    float: left;
		    margin: 32px 25px;
		    font-weight: 600;
		}
		.banner-txt{
			position: absolute;
			padding: 10px;
			top:0;
			left:0;
			right:0;
			bottom:0;
			margin: auto;
			width: 60%;
			height: 150px;
			text-align: center;
		}
		.banner-txt h1{
			color: #fff;
			font-weight: 700;
			font-size: 1.8	5em;
		}
		.banner-txt img{
			width: 19%;
		    top: -63px;
		    margin-top: -130px;
		}
		.sub-txt{
			color: #efefef;
		}
		.login{
			border-radius: 50px;
		    background: #257be3;
		    color: #fff;
		    font-weight: 700;
		    padding: 17px 40px;
		    border: none;
		    text-transform: uppercase;
		    margin: 15px 0;
		    outline: none;
		   }
		 .get-touch{
		 	background: #257be3;
		 }
		 .get-txt{
		 	padding: 75px 0;
		 	text-align: center;
		 }
		 h2{
		 	color: #fff;
		 }
		 small{
			 font-size: 20px;
		    color: #efefef;
		    width: 70%;
		    display: inline-block;
		 }
		.icon{
			border-right: 1px solid #00000012;
		}
		.icon i{
			color: #fff;
			font-size: 3em;
		}
		strong a{
			color: #fff;
			margin-top:10px;
			display: inline-block;
		}
		footer p{
			margin: 10px 0;
		}
	.login:focus {
    outline: none !important;
	}
	.banner ul li button:focus {
    outline: none !important;
    }
	</style>
</head>
<body>

<section class="banner">
		<nav class="navbar nav-fixed-top">
			<div class="container">
				<ul class="list-inline">
					<li class="list-inline-item">
						
						<!-- <p class="name">BOARD OF PRACTICAL TRAINING (EASTERN REGION)</p> -->
					</li>
					<li class="list-inline-item">
						<button><i class="fa fa-user"></i></button>
					</li>
				</ul>
			</div>
		</nav>

	<div class="banner-txt">
		<a href="#"><img src="{{ asset('theme/first-screen/logo.png') }}"></a>
		<h1>BOARD OF PRACTICAL TRAINING RESOURCE PLANNING <br>(BRP Solutions)</h1>
		<p class="sub-txt">Human Capital, Finance & Accounts, Inventory, Role, MIS Management Systems and much more...</p>
                <a  href="{{url('login')}}" class="login">Login</a>
	</div>

</section>

    <section  style="background:#257be3"class="get-touch">
	<div class="container">
		<div class="get-txt">
			<!-- <h2>Let's Get In Touch!</h2>
			<small>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</small> -->
			<div class="row" style="margin-top:80px;">
				<div class="col-md-6">
					<div class="icon">
						<i class="fa fa-phone"></i>
					</div>
					<strong><a href="tel: (033) 2337-0750/51"> (033) 2337-0750/51</a></strong>
				</div>
				<div class="col-md-6">
					<div class="icon">
						<i class="fa fa-envelope"></i>
					</div>
					<strong><a href="mailto:inf@bopter.gov.in.">inf@bopter.gov.in.</a></strong>
				</div>
			</div>
		</div>
	</div>
	
</section>

<footer>
	<div class="container text-center">
		<p>CopyRight © 2019 BOPT(ER) All Rights Reserved</p>
	</div>
</footer>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>