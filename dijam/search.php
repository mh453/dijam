<?php
include_once 'session.php';

if ((!(isset($_SESSION['username']))) && (!(isset($_SESSION['password']))))
	{
	header('location:http://localhost/dijam/login.html');
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

         <li><a href="http://localhost/dijam/logout.php">Log Out</a></li>
      </ul>
      <div>
      <div id="textoutside">
         <p>"The whole of life is just like watching a film"</p>
      </div>
      <div id="postform">
         <form method="get" action="search.php">
            <br>
            <img src="film-reel24.jpg" alt="Logo for dijam" height="70" width="70">
            <br>
            <br>Title</br><br><input type="text" name="title"></br>
            <br></br>
            <br><input type="submit" value="Search"></br>
            <br></br>
            <br></br>
      </div>
      </form>
      <div id="searchforfilms">

<?php

if (isset($_GET["title"]))
	{
	if ($_GET["title"] == "")
		{
		}
	  else
		{
		$passedtitle = $_GET["title"];
		$bookquery = "SELECT ItemID, Name,Price FROM PHP_Item WHERE Name LIKE '%$passedtitle%'";
		if (!($result = mysql_query($bookquery, $connection)))
			{
			print ("Could not execute query \n $bookquery");
			die(mysql_error());
			}

		echo "<table>
	<tr>
	<th>Title</th>
	<th>Price</th>
	</tr>";
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
			echo "<tr>";
			echo "<td><a href='http://localhost/dijam/searchresults.php?item={$row['ItemID']}'>{$row['Name']}</a></td>";
			echo "<td><a href='http://localhost/dijam/searchresults.php?item={$row['ItemID']}'>{$row['Price']}</td>";
			echo "</tr>";
			}

		echo "</table>";
		}
	}
  else
	{
	$passedtitle = null;
	}
?>

</div>
</body>
</html>
