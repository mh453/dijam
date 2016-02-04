<?php
	include_once 'session.php';
	$passeduser = $_POST["username"];
	$passedpasswrd = $_POST["password"];
	$_SESSION['username']=$passeduser;
	$_SESSION['password']=$passedpasswrd;
	#if no data entered;

	if($passeduser==null||$passedpasswrd==null){
		header('Location: http://localhost/dijam/errorpage.php');
	}

	global $connection;
	$user = "//";
	$pass = "//";
	$server = "//";

	if (!($connection =mysql_connect($server,$user, $pass)))die ("Could not connect to database
	server");
	$db = "//";

	if (!(mysql_select_db($db, $connection)))die ("Could not open database $db");
	$query="SELECT * FROM PHP_Customer WHERE Username ='".mysql_real_escape_string($_POST['username'])."'AND Password = '".mysql_real_escape_string($_POST['password'])."'";

	if (!($result = mysql_query($query, $connection))) {
		print ("Could not execute
		query \n $query");
		die (mysql_error());
	}

	# do something meaningful

	if(mysql_num_rows($result)>0){
		$row = mysql_fetch_row($result);
		$username = $row[0];

	} else
	if(mysql_num_rows($result)<=0){
		header('Location: http://localhost/dijam/errorpage.php');
	}

	# close connection
	mysql_close($connection); //c
	?>
