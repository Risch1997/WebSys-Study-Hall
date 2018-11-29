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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
		<style><?php include '../styles/editProfile.css'; ?></style>
	</head>
	<body>
