<html>
<head>
<title>Sign Up</title>
</head>
<body>
<table cellpadding="20px" border="1px" align="center">
<form action="signup_destination.php" method="POST">
<tr>
<td>First Name</td>
<td><input type="text"name="first_name"/></td>
</tr>
<tr>
<td>Last Name</td>
<td><input type="text"name="last_name"/></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text"name="email"/></td>
</tr>
<tr>
<td>Date of Birth</td>
<td><input type="date" id="dateob" name="dateob"></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="radio" name="gender" value="male" checked="checked"/>Male
  <input type="radio" name="gender" value="female" checked="checked"/>Female</td>
  </tr>
  <tr>
  <td>Password</td>
  <td><input type="password" name="pass"/></td>
  </tr>
  <tr>
  <td>Retype Password </td>
  <td><input type="password" name="repass"/></td>
</tr>
<tr>
<td><input type="submit" value="submit" name="submit"/></td>
</tr>

  </form>
  </table>
  </body>
  </html>
