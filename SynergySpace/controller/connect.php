<?php
	$servername = "localhost";
	$serverusername = "root";
	$serverpassword = "";
	$dbname = "synergyspace";
	//connect to database
	mysql_connect($servername, $serverusername, $serverpassword) or die("Error connecting to database: ".mysql_error());
	mysql_select_db($dbname) or die(mysql_error());
?>