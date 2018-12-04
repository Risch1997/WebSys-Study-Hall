<?php
	session_start();
	include_once("../functions/load.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Web Systems and Development: Study Hall</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/studyHall.css">
    <link rel="stylesheet" href="../styles/editProfile.css">
    <link rel="stylesheet" href="../styles/browse.css">
    <script src="../scripts/studyHall.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <style type="text/css">
      body {
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>
  <body>
    <div style="width: 100%" id = "header">
      <div >
        <hr>
        <div id="logo">
          <a href="index.php">
            <img src="../studyHallLogo.png" alt="Logo for the Study Hall Site" height="100">
          </a>
        </div>
        <br />
        <div>
          <ol>
            <li><a href="browse.php">Browse for Matches</a></li>
            <li><a href="">My Matches</a></li>
            <li><a href="editProfile.php">My Profile</a></li>
            <li><a href="logout.php">Log Out</a></li>
          </ol>
        </div>
        <br />
        <hr>
      </div>
    </div>
