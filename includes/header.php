<?php
	session_start();
	include_once("../functions/load.php");

	if (isset($_POST['logout'])) {
		logout();
		header("Location: login.php");
	}
?>

<html>
	<head>
		<title>Study Hall</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
		<style><?php include '../styles/editProfile.css'; ?></style>
		<style><?php include '../styles/studyHall.css'; ?></style>
	</head>
	<body>
