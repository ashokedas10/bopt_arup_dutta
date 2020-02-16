<!DOCTYPE html>
<html>
<head>
	<title>BOARD OF PRACTICAL TRAINING (EASTERN REGION)</title>
        <link rel="icon" href="public/theme/main/logo.png" type="image/gif" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: 'Raleway', sans-serif;
		}
		body{
			/*overflow: hidden;*/
		}
		a{
			text-decoration: none;
			color: #fff;
			font-size: 16px;
		}
		.main {
    position: relative;
    
}
	.holder {
    display: grid;
    width: 70%;
    margin: 12% auto 20px;
    left: 0;
    right: 0;
}
.each-section {
    padding: 0px;
    background: #fff;
    display: flex;
    flex-wrap: wrap;
}
	
.ele {
    width: 33.33%;
    height: 92.5px;
    margin-bottom: -14px;
    position: relative;
}
		.element{
			position: relative;
		    height: 100%;
		    width: 100%;
		    background: linear-gradient(88deg, #7CC2CC 1%,#1A70A5 53%);
		    border-top-right-radius: 60px;
		    border-bottom-right-radius: 60px;
		    box-shadow: 6px 8px 20px 0px rgba(0,0,0,0.2);
		}
.element:before {
    position: absolute;
    content: '';
    border-radius: 5px;
    background: linear-gradient(45deg, #7CC2CC 49%,transparent 36%);
    transform: rotate(45deg);
    height: 68.3px;
    width: 70px;
    top: 13px;
    bottom: 0;
    left: -33px;
}
.holder .each-section:first-child .ele:first-child .element{
	position: relative;
    top: -50px;
    left: 80px;
		}
		.holder .each-section:first-child .ele:last-child .element{
			position: relative;
		    top: -50px;
		    right: 80px;
		    transform: rotateY(180deg);
		}
		.holder .each-section:first-child .ele:first-child .element:after{
			 position: absolute;
    content: '';
    right: -25px;
    top: 86px;
    height: 35px;
    width: 35px;
    background: url(after.png) no-repeat center;
    background-size: contain;
		}
		.holder .each-section:first-child .ele:last-child .element:after{
			position: absolute;
		    content: '';
		   	right: -25px;
		    top: 86px;
		    height: 35px;
		    width: 35px;
		    background: url(after.png) no-repeat center;
		    background-size: contain;
		}
		.holder .each-section:nth-child(1) .ele:nth-child(1) .element > big{
			position: relative;
    /* left: 78px; */
		}
		big a{font-size:18px;font-weight:bold;}
		.holder .each-section:nth-child(1) .ele:nth-child(3) .element > big{
			transform: rotateY(-180deg);
    left: 35px;
    top: 0px;
    position: relative;
		}
		/*==========================================*/
		.holder .each-section:nth-child(2) .ele:nth-child(1) .element{
			position: relative;
		    top: 0px;
		    left: -3px;
		}
		.holder .each-section:nth-child(2) .ele:nth-child(3) .element{
			position: relative;
    top: 0px;
    right: -3px;
    transform: rotateY(180deg);
		}
		.holder .each-section:nth-child(2) .ele:nth-child(3) .element > big{
			transform: rotateY(-180deg);
    left: 104px;
    position: relative;
		}
		.holder .each-section:nth-child(2) .ele:nth-child(1) .element:after{
			position: absolute;
		    content: '';
		    right: -38px;
		    top: 40px;
		    height: 35px;
		    width: 35px;
		    background: url(after.png) no-repeat center;
		    background-size: contain;
		    transform: rotate(-45deg);
		}
		.holder .each-section:nth-child(2) .ele:nth-child(3) .element:after{
			position: absolute;
		    content: '';
		    right: -38px;
		    top: 40px;
		    height: 35px;
		    width: 35px;
		    background: url(after.png) no-repeat center;
		    background-size: contain;
		    transform: rotate(-45deg);
		}
		/*==============================================*/
		.holder .each-section:nth-child(3) .ele:nth-child(1) .element{
			position: relative;
		    top: 47px;
		    left: 80px;
		}
		.holder .each-section:nth-child(3) .ele:nth-child(3) .element{
			position: relative;
		    top: 47px;
		    right: 80px;
		    transform: rotateY(180deg);
		}
		.holder .each-section:nth-child(3) .ele:nth-child(3) .element > big{
			transform: rotateY(-180deg);
			left: 87px;
    		position: relative;
		}
		.holder .each-section:nth-child(3) .ele:nth-child(1) .element:after{
			position: absolute;
		    content: '';
		   	right: -25px;
		    top: 0px;
		    height: 35px;
		    width: 35px;
		    background: url(after.png) no-repeat center;
		    background-size: contain;
		    transform: rotate(-90deg);
		}
		.holder .each-section:nth-child(3) .ele:nth-child(3) .element:after{
			position: absolute;
		    content: '';
		   	right: -25px;
		    top: 0px;
		    height: 35px;
		    width: 35px;
		    background: url(after.png) no-repeat center;
		    background-size: contain;
		    transform: rotate(-90deg);
		}
		/*==============================================*/
		.element big{
			display: inline-block;
    padding-top: 34px;
    padding-left: 67px;
    font-weight: 500;
		}
		.inner-icon{
			height: 70px;
		    widheight: 70px;
    width: 70px;
    border-radius: 50%;
    background: #fff;
    right: 16px;
    top: 14px;
    text-align: center;
    position: absolute;
		}
		.inner-icon img{
			width: 58%;
    margin: 13px auto 0;
		}
		.logo{
			height: 130px;
		    width: 130px;
		    border-radius: 50%;
		    box-shadow:0px 0px 14px 20px rgba(0, 0, 0, 0.15);
		    position: absolute;
		    top: 0;
		    left: 0;
		    right: 0;
		    bottom: 0;
		    margin: auto;
		    background: url(public/theme/main/logo.png) center no-repeat;
		    background-size: contain;
		}
		.logo:before{
			position: absolute;
		    content: '';
		    height: 100%;
		    width: 100%;
		    border: 5px solid #006699;
		    padding: 23px;
		    left: -28px;
		    right: 0;
		    margin: auto;
		    border-radius: 50%;
		    top: -28px;
		}
		.roll-over{
			position: relative;
    height: 100%;
    width: 100%;
		}
		.navbar{
			position: fixed;
			top: 0;
			background: #fff;
			box-shadow: 0px 0px 5px rgba(0,0,0,0.2);
			z-index: 99;
			width: 100%;
			height:112px;
		}
		.navbar ul{
			list-style: none;
		    /*width: 1190px;*/
		    margin: 0 auto;
		    display: block;
                    position: relative;
		}
		.navbar ul li{
			display: inline-block;
		}
		.navbar ul li a{
			padding: 15px 10px;
			color: #22086A;
			display: table;
		}
		.navbar ul li img{
			width: 68px;
			position: relative;    		
    		/*border-right: 1px solid #00000012;
    		padding-right: 7px;*/
		}
		.navbar ul li a big{
			display: block;
			margin-top: -75px;
		}
		.navbar ul li p{
			position: relative;
            top: -41px;
    left: 269px;
    font-size: 12px;
		}
		.holder .each-section:nth-child(4) .ele{
			width: 50%;
			margin: 9% auto 0;
		}
		.holder .each-section:nth-child(4) .ele .element{
			border-radius: 0;
		}
		.holder .each-section:nth-child(4) .ele .element:after{
	  position: absolute;
    content: '';
    border-radius: 5px;
    background: linear-gradient(45deg, transparent 49%,#1A70A5 36%);
    transform: rotate(45deg);
    height: 69px;
    width: 69px;
    top: 12px;
    bottom: 0;
    right: -34px;
		}
		footer{
			/*position: absolute;
			bottom: 0;*/
			width: 100%;
			padding: 9px 0;
			background: #1A70A5;
			text-align: center;
			color: #fff;
		}
               
                .navbar ul li:nth-child(4) .element{
                    height: 40px;
                    width: 110px;
                    position: absolute;
                    top: 30px;
                    right:10px;
                }
                .navbar ul li:nth-child(4) .element .inner-icon{
                    height: 30px;
                    width: 30px;
                    top: 5px;
                    right: 5px;
                }
                .navbar ul li:nth-child(4) .element .inner-icon img{

                    width: 70%;
                    top: -9px;
                    /*left: 6px;*/
                      border-right:0;
                }
                .navbar ul li:nth-child(4) .element:before{
                   height: 30px;
                    width: 30px;
                    left: -14px;
                    top: 5px;
                }
                .navbar ul li:nth-child(4) .element big{
                    font-size: 12px;
                    padding: 0;
                    margin-top: -5px;
                    margin-left: 0px;
}
 

.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
.tooltip .tooltiptext {
  width: 120px;
  bottom: 100%;
  left: 50%; 
  margin-left: -60px; /* Use half of the width (120/2 = 60), to center the tooltip */
}

.nat-logo{

	position: relative;
    top: -23px;
    right: -263px;
}
	</style>
}
        
        
        
</head>
<body>
	<nav class="navbar">
		<ul>
                    <li><a href="#"><img style="width:49px;top:-16px;" src="{{URL::to('')}}/public/theme/main/govt.png"></a></li>
			<li>
				<a href="#">
					<h2 style="float: left;top:-22px;">BOARD OF PRACTICAL TRAINING (EASTERN REGION)
				
					</h2>
				<span class="nat-logo">
				
				<img src="{{ asset('images/img/logo.png')}}" alt="logo">
				<img src="{{ asset('images/img/nats.png')}}" alt="NATS logo" style="width:111px;    top: 9px; left: -8px;"></span>
					<big style="font-weight: 700;">Under Ministry of HRD, Government of India
						<img style="float: right;width: 164px;position: relative;
    right: -44px;" src="{{ asset('images/img/caption.png')}}" alt="caption"></big>
					<small style="font-weight: 700;">An Autonomous Body of Department of Higher Education</small>
				</a>
			</li>


			<li><p id="time"></p></li>
                         @if(auth()->check())
                        <li>
                            <div class="element">
				<big><a href="{{url('mainLogout')}}" style="color:#fff;">Logout</a></big>
                                    <div class="inner-icon">
					<img src="{{URL::to('')}}/public/theme/main/logout.png">
				</div>
                            </div>
                        </li>
                         @endif
		</ul>
	</nav>
    <?php 
    $rolemenu=''; 
    $hcm='';
    $config='';
    ?>
@if(auth()->user()->user_type=='user')  
@foreach($Roledata as $roles) 
@if(auth()->user()->email==$roles->member_id)
<?php
if($roles->module_name=='Role Management')
{
    $rolemenu='Role_Management';
}
if($roles->module_name=='Human Capital')
{
  $hcm='Human_Capital';
}
if($roles->module_name=='Configuration')
{
  $config='Configuration';
}

if($roles->module_name=='DAK Management')
{
  $dakm='DAK Management';
}

?>

@endif
@endforeach


	<section class="main">

			<div class="holder">
                            
				<div class="each-section">
					<div class="ele">
                                                <div class="element" <?php if($rolemenu!='Role_Management'){ echo 'style="background: linear-gradient(88deg, #7CC2CC 1%,#d9d9d9 53%);"'; }else{ echo '';}  ?>  >
                                                    @if($rolemenu=='Role_Management')
							<big><a href="{{ url('role/dashboard') }}">Rolet</a></big>
                                                        @else
                                                        <big><a href="javascript:void(0);">Role</a></big>
                                                        @endif
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon1.png">
							</div>
						</div>
					</div>
					<div class="ele"></div>
					<div class="ele">
						<div class="element">
							<big><a href="{{ url('finance-dashboard') }}">Finance & Accounts</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon2.png">
							</div>
						</div>
					</div>
				</div>
                            
                            

				<div class="each-section">
					<div class="ele">
						<div class="element">
                            @if($hcm=='Human_Capital')
							<big><a href="{{ url('pis/login') }}">Human Capital</a></big>
                            @else
                            <big><a href="javascript:void(0);">Human Capital</a></big>
                            @endif
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon3.png">
							</div>
						</div>
					</div>
					<div class="ele">
						<div class="roll-over">
							<div class="logo"></div>
						</div>
					</div>
					<div class="ele">
						<div class="element">
							<big><a href="{{ url('dak-dashboard') }}">DAK</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon4.png">
							</div>
						</div>
					</div>
				</div>

				<div class="each-section">
					<div class="ele">
						<div class="element">
							<big style="padding-left: 100px;"><a href="#">MIS</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon5.png">
							</div>
						</div>
					</div>
					<div class="ele"></div>
					<div class="ele">
						<div class="element">
							<big><a href="{{ url('procurement/procure-dashboard') }}">Procurement</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon6.png">
							</div>
						</div>
					</div>
				</div>

				<div class="each-section">
					<div class="ele">
						<div class="element">
                                                    @if($config=='Configuration')
							<big><a href="{{ url('masters/dashboard') }}">Settings</a></big>
                                                        @else
                                                        <big><a href="javascript:void(0);">Settings</a></big>
                                                        @endif
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon7.png">
							</div>
						</div>
					</div>
				</div>

			</div>
		<div style="width: 100%">
			
						<footer>
							<p>CopyRight © 2019 BOPT(ER) All Rights Reserved</p>
						</footer>

			</div>
		
	</section>
@elseif(auth()->user()->user_type=='admin')
<section class="main">

			<div class="holder">
                            
				<div class="each-section">
					<div class="ele">
						<div class="element">           
							<big><a href="{{ url('role/dashboard') }}">Role</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon1.png">
							</div>
						</div>
					</div>
					<div class="ele"></div>
					<div class="ele">
						<div class="element">
							<big><a href="{{ url('finance-dashboard') }}">Finance & Accounts</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon2.png">
							</div>
						</div>
					</div>
				</div>
                            
                            

				<div class="each-section">
					<div class="ele">
						<div class="element">
							<big><a href="{{ url('pis/login') }}">Human Capital</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon3.png">
							</div>
						</div>
					</div>
					<div class="ele">
						<div class="roll-over">
							<div class="logo"></div>
						</div>
					</div>
					<div class="ele">
						<div class="element">
							<big><a href="{{ url('dak-dashboard') }}">DAK</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon4.png">
							</div>
						</div>
					</div>
				</div>

				<div class="each-section">
					<div class="ele">
						<div class="element">
							<big style="padding-left: 100px;"><a href="mis/dashboard">MIS</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon5.png">
							</div>
						</div>
					</div>
					<div class="ele"></div>
					<div class="ele">
						<div class="element">
							<big><a href="{{ url('procurement/procure-dashboard') }}">Procurement</a></big>
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon6.png">
							</div>
						</div>
					</div>
				</div>

				<div class="each-section">
					<div class="ele">
						<div class="element">
                                                   
							<big><a style="padding-left: 54%;" href="{{ url('masters/dashboard') }}">Settings</a></big>
                                                       
							<div class="inner-icon">
								<img src="{{URL::to('')}}/public/theme/main/icon7.png">
							</div>
						</div>
					</div>
				</div>

			</div>
		<div style="width: 100%">
			
						<footer>
							<p>CopyRight © 2019 BOPT(ER) All Rights Reserved</p>
						</footer>

			</div>
		
	</section>
@endif

<script type="text/javascript">
	function getDateTime() {
        var now     = new Date(); 
        var year    = now.getFullYear();
        var month   = now.getMonth()+1; 
        var day     = now.getDate();
        var hour    = now.getHours();
        var minute  = now.getMinutes();
        var second  = now.getSeconds(); 
        if(month.toString().length == 1) {
             month = '0'+month;
        }
        if(day.toString().length == 1) {
             day = '0'+day;
        }   
        if(hour.toString().length == 1) {
             hour = '0'+hour;
        }
        if(minute.toString().length == 1) {
             minute = '0'+minute;
        }
        if(second.toString().length == 1) {
             second = '0'+second;
        }   
        var dateTime = "<b>Date:     " + day+'/'+month+'/'+year+ "      Time:      " +hour+':'+minute+':'+second+"</b>";   
         return dateTime;
    }

    // example usage: realtime clock
    setInterval(function(){
        currentTime = getDateTime();
        document.getElementById("time").innerHTML = currentTime;
    }, 1000);

</script>
</body>
</html>