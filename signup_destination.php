<?php
$host="localhost";
$dbuser="root";
$pass="root";
$dbname="sign_up";
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
if(mysqli_connect_errno())
{
	
	die("connection failed!".mysqli_connect_error());
}
?>
<html>
<head>
<title>Sign Up</title>
</head>
<body>
<?php
if(isset($_POST['submit']))
{
	$firstname=$_POST['first_name']; //yg didalem kurung ngambil dari name html
	$lastname=$_POST['last_name'];
	$email=$_POST['email'];
	$dateob=$_POST['dateob'];
	$gender=$_POST['gender'];
	$pass=$_POST['pass'];
						
	$dob=$dateob;
	$name=$firstname.''.$lastname;
	$repass=$_POST['repass'];
	if (empty($firstname)||empty($lastname)||empty ($email)||empty ($dateob) || empty ($gender)|| empty ($pass))
	 {
	 echo "Oops! Can't leave any field blank!";
								  
			}
		elseif($pass!=$repass)
		{
		echo"Password entered does not match!";
								  
		}
							  
			else
								
							
			{
	$sql="INSERT INTO signup(firstname,lastname,email,dob,gender,pass)".
	"VALUES('$firstname','$lastname','$email','$dob','$gender','$pass')";
	$res=mysqli_query($conn,$sql);
		if(!$res)
		{
		die ("query failed!".mysqli_error($conn));
			}
			else
		{
			echo "Data inserted successfully!";
}
}
}
?>
</body>
</html>

