<?php

  include("../includes/header.php");

  if(isset($_SESSION['user_id'])) {

  }
?>
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
