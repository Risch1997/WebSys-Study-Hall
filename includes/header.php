<?php
	session_start();
	include_once("../functions/load.php");
	
	if (isset($_POST['logout'])) {
		logout();
	}
?>

<html>
	<head>
		<title>Study Hall</title>
	</head>
	<body>