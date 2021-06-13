<?php
session_start();
$host="localhost";
$dbuser="root";
$pass="root";
$dbname="assignment";  
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
if(mysqli_connect_errno())
{
	
	die("Connection failed!".mysqli_connect_error());
}
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thank you!</title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
		<!-- importing bootstrap-->
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch for buying our products. It means a lot to us, just like you do! Hope you have a really good day.</p>
	</div>

	<footer class="site-footer" id="footer">
		<p class="site-footer__fineprint" id="fineprint">Copyright ©2021 | Adrianus Tristan</p>
	</footer>
	
<?php
if(isset($_POST['submit'])){ //insert order detail to order_table on database
	$email=$_POST['email'];
	$recipient=$_POST['recipient'];
	$ship_address=$_POST['shipping'];
	$total_cost = $_SESSION['total_price'];
	
	$sql_order="INSERT INTO order_table (email, recipient, ship_address, total_cost)"."VALUES ('$email','$recipient','$ship_address','$total_cost')";
	$res_order=mysqli_query($conn,$sql_order);
}
?>
</body>
</html>