<?php

  include("../includes/header-browse.php");

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
    <div style="width: 100%" id="header">
    <div>
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
        <hr>
      </div>
    </div>
    <div id="search-div" class="center">
      <h1>Search</h1>
      <form id="search" method="POST">
        <input type="text" name="subject" placeholder="Subject">
        <input type="text" name="number" placeholder="Number">
        <input type="submit" name="search" value="Search">
      </form>
    </div>
    <div id="matches-list" class="matches row">
      <h1>Found Matches:</h1>
      <hr>
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
