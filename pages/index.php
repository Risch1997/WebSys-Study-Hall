<?php
  include("../includes/header.php");

  if(isset($_SESSION['user_id'])) {
    echo "Your session is running " . $_SESSION['user_id'];
  }

  if (isset($_POST['logout'])) {
    logout();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Web Systems and Development: Study Hall</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="../studyHallCSS.css">
    <link rel="stylesheet" href="../styles/studyHall.css">
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
          <li><a href="">Browse for Matches</a></li>
          <li><a href="">My Matches</a></li>
          <li><a href="">My Profile</a></li>
        </ol>
        <form id="logout" method="POST">
          <input type="submit" name="logout" value="Log Out">
        </form>
      </div>
      <br />
      <hr>
    </div>
  </body>
</html>
