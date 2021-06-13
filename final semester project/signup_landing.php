<?php
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
<html>
<head>
<title>Sign Up</title>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
<style>
html{
	font-family:Lato;
	background-image:url('backgrounds/loginbg.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
}
#loginbtn{
    background-color: white;
	border-radius: 12px;
	font-size: 15px;
 	color: black;
  	padding: 13px 24px;
  	text-decoration: none;
  	cursor: pointer;
	font-family: Lato;
	font-weight: bold;
	transition-duration: 0.4s;
}
#loginbtn:hover{
	background-color: #131820;
	color: white;
}
</style>
</head>
<body>
<?php
if(isset($_POST['submit']))
{
	$username=$_POST['username']; 
	$firstname=$_POST['firstname']; 
	$lastname=$_POST['lastname'];
	$dob=$_POST['dob'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];	

	//check if password is strong
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);
	
	$sql_u = "SELECT * FROM sign_up WHERE username= '$username'"; //checking same username in database
	$sql_e = "SELECT * FROM sign_up WHERE email ='$email'"; //checking same email in database
	$res_u = mysqli_query($conn, $sql_u);
	$res_e = mysqli_query($conn, $sql_e);
	
	if (mysqli_num_rows($res_u) > 0){
		echo "<script>alert('Sorry, username is already taken!');history.go(-1)</script>";				  
		}	
		elseif(mysqli_num_rows($res_e) > 0){
			echo "<script>alert('Sorry, email is already taken!');history.go(-1)</script>";
		}
		elseif(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){ //to check if password is strong
			echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character!');history.go(-1)</script>";
		} 
		elseif($password!=$repassword){ //checking retype password is valid
			echo "<script>alert('Password entered does not match!');history.go(-1)</script>";				  
			}			  
			else{
	$sql="INSERT INTO sign_up(username,firstname,lastname,dob,email,password)". 
	"VALUES('$username','$firstname','$lastname','$dob','$email','$password')";/*first sql query to pass biodata to sign_up table */
	
	$sql1="INSERT INTO user (username, password)"."VALUES ('$username','$password')"; /*second sql query to pass username and password to user table for log in */
	
	$res=mysqli_query($conn,$sql)&& mysqli_query($conn,$sql1);
		if(!$res)
		{
		die ("Query failed!".mysqli_error($conn));
			}
			else
		{
			echo "<div style=\"text-align:center; margin-top:150px;\">";
			echo "<h2>Welcome! You are signed up!</h2>";
			echo "<input type=\"button\"/ value=\"Log In\" id=\"loginbtn\" onclick=\"location.href='login_page.php'\">";
}
}
}
?>
</body>
</html>

