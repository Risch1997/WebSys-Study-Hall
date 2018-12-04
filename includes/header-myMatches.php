<?php
	session_start();
	include_once("../functions/load.php");

	if (isset($_POST['logout'])) {
		logout();
		header("Location: ../pages/login.php");
	}
?>

<html>
	<head>
    <title>Web Systems and Development: Study Hall</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <style><?php include '../styles/myMatches.css'; ?></style>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
