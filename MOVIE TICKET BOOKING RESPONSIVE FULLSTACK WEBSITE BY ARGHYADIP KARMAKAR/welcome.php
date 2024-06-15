<!DOCTYPE html>
<html>
<head>
	<title>Signup Success || Welcome</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<style>
		body {
			background-color: #f9f9f9;
		}
		.container {
			margin-top: 50px;
		}
		h1 {
			font-weight: bold;
			font-size: 60px;
			color: #0099ff;
			text-align: center;
			margin-bottom: 30px;
		}
		.btn {
			font-size: 30px;
			font-weight: bold;
			background-color: #0099ff;
			color: #fff;
			padding: 15px 30px;
			border-radius: 50px;
			border: none;
			outline: none;
			box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
			transition: all 0.2s ease-in-out;
		}
		.btn:hover {
			transform: scale(1.1);
			background-color: #0066cc;
			box-shadow: 0px 6px 14px rgba(0, 0, 0, 0.25);
		}
		.animated {
			animation-duration: 2s;
			animation-fill-mode: both;
		}
		.fadeInUp {
			animation-name: fadeInUp;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="animated fadeInUp">Signup Successfully</h1>
		<p class="text-center">Your Account is Created. Now you can login and can book Movie Ticket.</p>
		<div class="text-center">
			<a href="login.php" class="btn animated fadeInUp delay-1s">Login Now</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
?>