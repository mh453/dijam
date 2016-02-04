<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
   <head>
      <title>Dijam</title>
      <link rel="stylesheet" type="text/css" href="theme.css">
      <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <div id="header">
         <a href="http://localhost/dijam/login.html"><img src="Cog-512.png" alt="Logo for dijam" height="70" width="70"></a>
         <p>dijam</p>
      </div>
      <div id="textoutside">
         <p>Sign Up</p>
      </div>
      <div id="postform">
         <form method="post" action="signupprocess.php">
            <br>
            <img src="Accept Male User.png" alt="Logo for dijam" height="70" width="70">
            <br>
            <br>Username</br><br><input type="text" name="usernamesgn"></br>
            <br>Email </br><br><input type="text" name="email"></br>
            <br>Password </br><br><input type="password" name="password"></br>
            <br>Confirm Password </br><br><input type="password" name="password2"></br>
            <br>Prove you're human</br><br><input type="text" name="authenticate" value="Whats 6+4?"></br>
            <br><input type="submit" value="Sign Up"></br>
            <br></br>
            <br></br>
      </div>
      </form>
      </div>
 </body>
</html>

<?php

if(!empty($_POST["usernamesgn"])) {
$username = $_POST["usernamesgn"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmpassword = $_POST["password2"];
$authenticationmaths = $_POST["authenticate"];

if ((empty($username) || empty($email) || empty($password) || empty($confirmpassword)) || ($password !== $confirmpassword))
	{
	echo "Oops Something went wrong, please fill in all fields or passwords don't match";
	}
  else
	{
	global $connection;
	$user = "//";
	$pass = "//";
	$server = "//";
	if (!($connection = mysql_connect($server, $user, $pass))) die("Could not connect to database server");
	$db = "//";
	if (!(mysql_select_db($db, $connection))) die("Could not open database $db");
	}

$query = "SELECT Username FROM PHP_Customer WHERE Username='$username'";

if (!($result = mysql_query($query, $connection)))
	{
	print ("Could not execute query \n $query");
	die(mysql_error());
	}

if (!(filter_var($email, FILTER_VALIDATE_EMAIL)) || ($authenticationmaths != 10))
	{
	echo "Please enter a valid email address or wrong values for CAPTCHA ";
	}
  else
	{
	if (mysql_num_rows($result) != 0)
		{
		echo "Sorry! Username is taken";
		}
	  else
		{
		echo "You have successfully created an account ";
		$input = "INSERT INTO PHP_Customer (Username, Email, Password) VALUES ('$username','$email','$password')";
	header('Location:http://localhost/dijam/login.html');
		if (!($result1 = mysql_query($input, $connection)))
			{
			print ("Could not execute query \n $input");
			die(mysql_error());
			}
		}
  }
	}?>
