<?php
include_once 'session.php';

session_destroy();
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
         <a href="http://localhost/dijam/login.html"><img src="Cog-512.png" alt="Logo for dijam" height="70" width="70"></a> 
         <p>dijam</p>
      </div>
      <div id="textoutside">
         <p>You have successfully logged out from dijam!</p>
      </div>
   </body>
</html>
