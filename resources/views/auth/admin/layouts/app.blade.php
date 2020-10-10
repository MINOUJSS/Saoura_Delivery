<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{url('login_inc')}}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/vendor/bootstrap/css/bootstrap.min.css">	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/css/main.css">
	<link rel="stylesheet" type="text/css" href="{{url('login_inc')}}/css/mystyle.css">
<!--===============================================================================================-->
</head>
<body>
@yield('content')
	
<!--===============================================================================================-->
<script src="{{url('login_inc')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('login_inc')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('login_inc')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{url('login_inc')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('login_inc')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('login_inc')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{url('login_inc')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{url('login_inc')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{url('login_inc')}}/js/main.js"></script>

</body>
</html>