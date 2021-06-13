<?php
session_start();
$conn=mysqli_connect('localhost','root','root','assignment');
if(mysqli_connect_error())
{
	echo "<p> Error in connection to database!</p>";
	exit();
	}
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset ($_POST["logout"]))
		{
			session_destroy();
			header ("location:login_page.php");
			exit();
		}
		$username=$password="";
		$username=$_POST["username"];
		$username=filter_login_input($username);
		$password=$_POST["password"];
		$password=filter_login_input($password);
		$qry="select * from user where username='$username' and password='$password'";
		$res=$conn->query($qry);
		if (mysqli_num_rows($res)>0)
		{
			$_SESSION['login']=$username;
			
		}
		else
		{
			$loginCheck="No";
		}
			}
			function filter_login_input($loginData)
			{
				$loginData=trim($loginData);
				$loginData=stripcslashes($loginData);
					$loginData=htmlspecialchars($loginData);
					return $loginData;
			}
			?>
			<html>
			<head>
			<script>
			function checkBeforeLogin()
			{
				if (document.loginForm.username.value=="")
				{
					
					alert("Enter username");
					document.loginForm.username.focus();
					return false;
				}
				if (document.loginForm.password.value=="")
				{
					
					alert("Enter your password");
					document.loginForm.password.focus();
					return false;
				}
			}
				</script>
				<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
				<title>Login Page</title>
				<style>
				html{
					font-family: Lato;
					background-image:url('backgrounds/login2bg.jpg');
					background-repeat: no-repeat;
					background-attachment: fixed;
					background-size: cover;
				}
				input[type=submit]{
					background-color: white;
					border-radius: 12px;
					font-size: 15px;
 					color: black;
  					padding: 13px 70px;
  					text-decoration: none;
  					cursor: pointer;
					font-family: Lato;
					transition-duration: 0.4s;
				}
				input[type=submit]:hover{
					background-color: #131820;
					color: white;
				}
				form{
					text-align:center;
					margin-top:180px;
				}
				#logoutbtn{
					margin-top:-150px;
				}
				.login-field{
					width: 13%;
					padding: 8px 16px;
					margin: px 0;
					display: inline-block;
					border: 1px solid #ccc;
					border-radius: 8px;
					box-sizing: border-box;
				}
				</style>
				</head>
				<body>
				<?php
				if(isset($_SESSION['login']))
				{
					echo "<div style=\"text-align:center; margin-top:200px;\">";
					echo "<h2>Welcome, ". $username ."!</h2>";
					echo "<font size=\"5px\"><a href=\"add to cart/index.php\">Click here to shop!</a>";
					echo "<form method=\"post\">";
				echo "<input type=\"submit\" name=\"logout\" value=\"Log Out\" id=\"logoutbtn\">";
					echo "</form>";
					echo "</div>";
					exit();
				}
				?>
				<form name="loginForm" method="post" onSubmit="return checkBeforeLogin()">
				<h2>LOGIN</h2>
				<input name="username" type="text" placeholder ="Username" required maxlenght="40" class="login-field"><br/><br>
				<input name="password" type="password" placeholder ="Password" required maxlenght="40" class="login-field"><br/><br>
				<?php
				if(isset($loginCheck))
				{
					echo "Wrong Password! <br/> <br/>";
					
				}
				?>
				<input type="submit" name="login" value="Login">
				</form>
				</body>
				</html>