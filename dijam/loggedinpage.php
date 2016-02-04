<?php
include_once 'session.php';
require('login.php');
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
         <li><a href="http://localhost/dijam/mh453/php/logout.php">Log Out</a></li>
      </ul>
      <div>
      <div id="textoutside">

<?php
echo "Welcome ".$passeduser."!";
?>

	</div>

</body>
</html>
