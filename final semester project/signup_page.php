<html>
<head>
<title>Sign Up</title>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
</head>
<style> 
html{
	background-image:url('backgrounds/signupbg.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
}
#main-holder{
	text-align:center;
	font-family:Lato;
	margin-top:40px;
}
p{
	font-weight: normal;
	margin: 16px 0;
}
#regis-form-submit{
	background-color: white;
	border: 1px solid #000000;
	color: black;
	padding: 8px 22px;
	border-radius: 8px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 14px;
	cursor:pointer;
	font-family:Lato;
	font-weight: bold;
	transition-duration: 0.4s;
}
#regis-form-submit:hover{
	background-color: #131820;
	color: white;
}
.regis-form-field{
	width: 13%;
	padding: 8px 16px;
	margin: -6px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 8px;
	box-sizing: border-box;
}
</style>
<body>
<main id="main-holder"> 
    <h1 id="regis-header">Create a new account</h1>
    
    <form action="signup_landing.php" method="POST" id="regis-form" > 
      <p>Username</p>
	  <input type="text" name="username" id="username-field" class="regis-form-field" placeholder="Username" required><br> 
	  <p>First Name</p>
	  <input type="text" name="firstname" id="firstname-field" class="regis-form-field" placeholder="First Name" required><br>
	  <p>Last Name</p>
      <input type="text" name="lastname" id="lastname-field" class="regis-form-field" placeholder="Last Name" required><br>
	  <p>Date of Birth</p>
	  <input type="date" name="dob" id="dob-field" class="regis-form-field" required><br>
	  <p>Email</p>
	  <input type="email" name="email" id="email-field" class="regis-form-field" placeholder="Email" required><br>
	  <p>Password</p>
	  <input type="password" name="password" id="password-field" class="regis-form-field" placeholder="Password	" required><br>
	  <p>Retype Password</p>
	  <input type="password" name="repassword" id="repassword-field" class="regis-form-field" placeholder="Retype Password" required><br><br>
      <input type="submit" value="Create" name="submit" id="regis-form-submit" class="regis-form-field">
    </form>
  
  </main>
</body>
</html>