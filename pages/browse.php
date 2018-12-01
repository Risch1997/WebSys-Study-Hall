<?php

  include("../includes/header.php");

  $data;
  if(isset($_SESSION['user_id'])) {
    echo "Your session is running " . $_SESSION['user_id'];
  }
  if(isset($_POST['search'])) {
    echo "<script>console.log( 'Starting Search..." . "' );</script>";
    $sid = $_SESSION['user_id'];
    if($_POST["subject"]!='' and ($_POST['number']!='')) {
      echo "<script>console.log( 'Course specified.' );</script>";
      $subject = $_POST["subject"];
      $number = $_POST['number'];
      $result = findMatchCourse($sid,$subject,$number);
      echo "<script>console.log( 'Debug Objects: " . json_encode($result) . "' );</script>";
      $data = json_encode($result);
    } else {
      echo "<script>console.log( 'No Course specified.' );</script>";
      $result = findMatchAll($sid);
      echo "<script>console.log( 'Debug Objects: " . json_encode($result) . "' );</script>";
      $data = json_encode($result);
    }
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
    <script>
      function refresh() {
        $('.matches').children().remove;
      }
      function generateList (list) {
        // body...
        $('.matches').append("<li>"+list.first_name+" "+list.last_name+"___ Mpts: "+list.priority+"___ Contact: "+list.email+" </li>");
      }
      function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
      }
      function init(){
        var obj = <?php echo isset($data) ? $data : 'null' ; ?>;
        if(obj!=null){
          console.log("JS side: ",obj);
          for (var i = 0; i < obj.length; i++) {
            generateList(obj[i]);
          };
        }
      }

      $(document).ready(function(){
        init();
      });

    </script>
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
            <li><a href="">My Profile</a></li>
          </ol>
          <form id="logout" method="POST">
            <input type="submit" name="logout" value="Log Out">
          </form>
        </div>
        <br />
        <div>
          <form id="search" method="POST">
            <input type="text" name="subject" placeholder="Subject">
            <input type="text" name="number" placeholder="Number">
            <input type="submit" name="search" value="Search" >
          </form>
        </div>
        <hr>
      </div>
    </div>
    <ul class="matches">
      <th class="match">List of matches: </th>
    </ul>
  </body>
</html>
