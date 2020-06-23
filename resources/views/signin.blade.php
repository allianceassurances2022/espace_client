<!DOCTYPE html>
<html lang="en">
<head>
	<title>Authentification</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('signin_assets/css/main.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">

	<style>
		.all_header{
            position: relative;
            display: block;
            width: 146.7%;
            padding: 2em 0px;
            border-top: 1px #cae0f1 solid;
            border-bottom: 1px #007481 solid;
            text-align: center;
            background-color: #007481;
            margin-left: -1.6em;
            border-radius: 10px 10px 0px 0px;
            border-bottom: 4px #ffffff dashed;
            margin-left: -4.65em;
            border-top: 1px #007481 solid;
            margin-bottom: 45px;
        }
        .wrap-login100 {
        	padding-top: 0;
        }
        .login100-form-bgbtn {
            background: -webkit-linear-gradient(right, #21d4fd, #007481, #00576b, #068597);
        }
        h4{
        	margin-top: 25px;
		    text-align: center;
		    font-weight: bold;
		    font-size: 12px;
		    font-size: 1.2rem;
		    text-transform: capitalize;
		    margin-bottom: 1em;
		    margin-top: 1.5em;
		    letter-spacing: 0.1em;
		    word-spacing: 0.5em;
		    font-weight: bold;
		    font-family: 'Lato';
		    font-weight: 300;
		    text-align: right;
		    color: #404040;
		    border: 4px #88888821 dotted;
		    padding: 21px;
		    background: #8888880f;
        }
        h4 i{
        	padding: 5px;
        	background-color: white;
        	border-radius: 50px;
        }
	</style>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				 <div class="all_header">
                    <img src="produit_assets/images/icons/alliance-assurance.png" alt="">
                </div>
				<form class="login100-form validate-form">
                    
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Vous n'avez pas de compte ?
						</span>

						<a class="txt2" href="#">
							M'inscrire
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{asset('signin_assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('signin_assets/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('signin_assets/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('signin_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('signin_assets/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('signin_assets/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('signin_assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('signin_assets/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('signin_assets/js/main.js')}}"></script>

</body>
</html>