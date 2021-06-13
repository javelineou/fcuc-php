<?php
session_start();
$host="localhost";
$dbuser="root";
$pass="root";
$dbname="assignment";  
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
if(mysqli_connect_errno()){
	die("Connection failed!".mysqli_connect_error());
	}
?>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
<title>Check Out Page</title>
</head>
<style>
html{
	background-image:url('paybg.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
}
#payment-form{
	text-align:center;
	padding-top:100px;
	font-family:Lato;
}
p{
	font-size:16px;
}
.payment-field{
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-sizing: border-box;
}
textarea{
	resize:none;
}
#paypalbtn{
	border:0;
	background-color:#b8b8b8;
	cursor:pointer;
}
</style>
<body>
	<form action="thankyou.php" method="POST" id="payment-form" > 
	<h2>Checkout - Your total is 
	<?php $total_cost = $_SESSION['total_price']; echo "$$total_cost</h2>";?>
      <p>Enter your email address. This address will be used to send you order status updates.</p>
	  <input type="email" name="email" id="email-field" class="payment-field" placeholder="Email" required>
	  <p>Recipient Name</p>
	  <input type="text" name="recipient" class="payment-field" placeholder="Recipient Name" required><br>
	  <p>Shipping Address</p>
	  <textarea rows="4" cols="50" name="shipping" form="payment-form" placeholder="Enter shipping address..."></textarea><br><br>
	  <input type="checkbox" name="tnc" value="tnc" id="tnc" required>
	  <label for="tnc">I agree with the terms and conditions.</label><br><br>
	  <button type="submit" name="submit" id="paypalbtn">
	<img src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"/>
	</button>
<!--buy now button from paypal -->
    </form>
</body>
</html>