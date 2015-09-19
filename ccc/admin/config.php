<?php

	$DB_HOST="localhost";
	$DB_USER="root";
	$DB_PASSWORD="";
	$DATABASE="ccc";
	
	$connect_baza=mysql_connect($DB_HOST,$DB_USER,$DB_PASSWORD);
	if(!$connect_baza)
	{
		die("can't connect to the server");
	}
	
	$select_db=mysql_select_db($DATABASE);
	if(!$select_db)
	{
		die("can't connect to the database");
	}

	//check mysql injection
	function check_input($value){
		$value=htmlspecialchars($value);
		if (get_magic_quotes_gpc()){
  			$value = stripslashes($value);
  		}
		// Quote if not a number
		if (!is_numeric($value)){
  			$value = mysql_real_escape_string($value);
  		}
		return $value;
	}

	//is login function
	function is_login()
	{
		session_start();
		if(!isset($_SESSION['SESSION_ADMIN_ID']) || (trim($_SESSION['SESSION_ADMIN_ID']) == '') ) {
			header("location: index.php?login=0");
			exit();
		}
	}

	function head()
	{
		return <<<HEAD
		<!DOCTYPE html>
		<html>
		<head>
			<title>jQuery Slider ADMINISTRATION</title>
	<link href="jquery-ui.css" rel="stylesheet" type="text/css"/>
  			<script src="jquery.min.js"></script>
  			<script src="jquery-ui.min.js"></script>
  		</head>
HEAD;
	}
	
?>
