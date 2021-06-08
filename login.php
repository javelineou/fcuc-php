<?php

session_start();
$conn=mysqli_connect('localhost','root','root','login3');
if(mysqli_connect_error())
{
	echo "<p> Error in connection to database.</p>";
	exit();
	}
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset ($_POST["logout"]))

		{
			
			session_destroy();
			header ("location:login3.php");
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
				</head>
				<body>
				<?php
				if(isset($_SESSION['login']))
				{
					echo "<p>welcome to my site</p>";
					echo "<p>now you can access the admin page</p>";
					echo "<form method=\"post\">";
				echo "<input type=\"submit\" name=\"logout\" value=\"LogOut\">";
					echo "</form>";
					exit();
				}
				?>
				<h2>Login</h2>
				<form name="loginForm" method="post" onSubmit="return checkBeforeLogin()">
				<input name="username" type="text" placeholder ="enter username" maxlenght="40"><br/>
				<input name="password" type="password" placeholder ="enter password" maxlenght="40"><br/>
				<?php
				if(isset($loginCheck))
				{
					echo "invalid data<br/>";
					
				}
				?>
				<input type="submit" name="login" value="Login">
				</form>
				</body>
				</html>