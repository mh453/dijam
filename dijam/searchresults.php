<?php
	include_once 'session.php';

	if ((!(isset($_SESSION['username'])))&&(!(isset($_SESSION['password'])))){
		header('location:http://localhost/dijam/login.html');
	} else {
		global $connection;
		$user = "//";
		$pass = "//";
		$server = "//";

		if (!($connection =mysql_connect($server,$user, $pass)))die ("Could not connect to database
server");
		$db = "//";

		if (!(mysql_select_db($db, $connection)))die ("Could not open database $db");
	}

	?>

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
         <img src="Cog-512.png" alt="Logo for dijam" height="70" width="70"></a>
         <p>dijam</p>
      </div>
      <div id= "nav">
         <ul>
            <li><a href="http://localhost/dijam/search.php">Search for Films | </a></li>
            <li><a href="http://localhost/dijam/logout.php">Log Out </a></li>
         </ul>
      </div>
      <div id="textoutside">
         <p>Details:</p>
      </div>
      <div id="displayalldetails">

<?php
	$itemID = $_GET['item'];
	$alldetails="SELECT * FROM PHP_Item WHERE ItemID ='$itemID'";

	if (!($result = mysql_query($alldetails, $connection))) {
		print ("Could not execute
		query \n $alldetails");
		die (mysql_error());
	}

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		echo "ItemID - {$row['ItemID']}<br />";

	echo "Name - {$row['Name']}<br />";
	echo "Price - {$row['Price']}<br /><br />";
	echo "Description: {$row['Description']}";

	$urlforimages = "http://localhost/dijam/";
	echo '<img src="'.$urlforimages.$row['Image'].'" />';
	}

?>
</div>
</body>
</html>
