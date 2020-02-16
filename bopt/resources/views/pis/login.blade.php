<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BOPT - HCM LOGIN</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-------------favicon--------------->
    <!--<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">-->	
<!-------------------------->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="gray" style="background:#f1f1f1;">

   
	
<div class="login-body">
<div class="text-center new-crd-hd">
		<img src="{{ asset('theme/images/bopt-logo.png') }}" alt="logo">
	</div>
	<div class="container col-md-8 login-container">
	
            <div class="row">
			
                <div class="col-md-12 login-form-1">
                    <h3>Login</h3>
					<p>Sign In to your account</p>
                    <form action="{{url('pis/login')}}" method="post">
                        {{csrf_field()}}
      <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email">
    @if ($errors->has('email'))
        <div class="error" style="color:red;">{{ $errors->first('email') }}</div>
@endif
  </div>
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="psw">
    @if ($errors->has('psw'))
        <div class="error" style="color:red;">{{ $errors->first('psw') }}</div>
@endif
  </div>
                        
@if(Session::has('login_error'))										
<div class="alert alert-danger" style="text-align:center;color: #ff0000;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><em > {{ Session::get('login_error') }}</em></div>
@endif	

   <div class="input-container">
   <button class="btn btn-default" type="submit" style="width:100%;">Login</button>
    <!--<div class="col-md-8 frgt" style="float:right;"><a href="#"> Forgot Password?</a></div>-->
  
   </div>
                    </form>
                </div>
                
            </div>
        </div>
</div>
 
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('theme/assets/js/main.js') }}"></script>

</body>
</html>
