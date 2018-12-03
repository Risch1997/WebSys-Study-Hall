<?php

  include("../includes/header.php");

  $data;
  if(isset($_SESSION['user_id'])) {
    // echo "Your session is running " . $_SESSION['user_id'];
  }
  if(isset($_POST['search'])) {
    echo "<script>console.log( 'Starting Search..." . "' );</script>";
    // $sid = $_SESSION['user_id'];
    $sid = 5;
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
      * {
        box-sizing: border-box;
        }

      body {
        font-family: Arial, Helvetica, sans-serif;
      }

      /* Float four columns side by side */
      .column {
        float: left;
        width: 25%;
        padding: 0 10px;
      }

      /* Remove extra left and right margins, due to padding */
      .row {margin: 0 -5px;}

      /* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      }

      /* Responsive columns */
      @media screen and (max-width: 600px) {
        .column {
          width: 100%;
          display: block;
          margin-bottom: 20px;
        }
      }

      /* Style the counter cards */
      .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 10px;
        text-align: center;
        background-color: #c65353;
        color: white;
        margin: 8px 0;
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
          <!-- <form id="logout" method="POST">
            <input type="submit" name="logout" value="Log Out">
          </form> -->
        </div>
        <br />
        <div class="center">
          <form id="search" method="POST">
            <input type="text" name="subject" placeholder="Subject">
            <input type="text" name="number" placeholder="Number">
            <input type="submit" name="search" value="Search">
          </form>
        </div>
        <hr>
      </div>
    </div>
    <div id="matches-list" class="matches row">
      <h1>Found Matches:</h1>
    </div>
    </ul>
  </body>
  <script>
    var obj = <?php echo isset($data) ? $data : 'null' ; ?>;

    // Sort the list of matches by priority (descending order)
    if (obj) {
      obj.sort(function (a, b) {
          // a and b will be two instances of your object from your list

          // possible return values
          var a1st = -1; // negative value means left item should appear first
          var b1st =  1; // positive value means right item should appear first
          var equal = 0; // zero means objects are equal

          // compare object priority values and determine their order
          if (a.priority < b.priority) {
              return b1st;
          }
          else if (b.priority < a.priority) {
              return a1st;
          }
          else {
              return equal;
          }
      });
    }
  </script>
  <script type="text/javascript" src="../scripts/browse.js"></script>
</html>
