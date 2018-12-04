<?php

  include("../includes/header-myMatches.php");

  $data;
  if(isset($_SESSION['user_id'])) {
    // echo "Your session is running " . $_SESSION['user_id'];
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
  <h1 class="center">My Matches</h1>

    <div id="matches-list" class="center">
        <div id="invitations" class="column">
          <h2>Invitations:</h2>
          <hr>

          <div class="card-container">
            <div class="card">
              <div class="container">
                <img src="../person-placeholder.png" alt="Avatar" style="width:50%">
                <h4><b>John Doe</b></h4>
                <p>Architect & Engineer</p>
              </div>
            </div>


            <div class="card">
              <div class="container">
                <img src="../person-placeholder.png" alt="Avatar" style="width:50%">
                <h4><b>John Doe</b></h4>
                <p>Architect & Engineer</p>
              </div>
            </div>

            <div class="card">
              <div class="container">
                <img src="../person-placeholder.png" alt="Avatar" style="width:50%">
                <h4><b>John Doe</b></h4>
                <p>Architect & Engineer</p>
              </div>
            </div>

            <div class="card">
              <div class="container">
                <img src="../person-placeholder.png" alt="Avatar" style="width:50%">
                <h4><b>John Doe</b></h4>
                <p>Architect & Engineer</p>
              </div>
            </div>

            <div class="card">
              <div class="container">
                <img src="../person-placeholder.png" alt="Avatar" style="width:50%">
                <h4><b>John Doe</b></h4>
                <p>Architect & Engineer</p>
              </div>
            </div>
          </div>
        </div>
        <div id="matches" class="column">

            <h2>People:</h2>
            <hr>

            <div class="card-container">
              <div class="card">
                <div class="container">
                  <img src="../person-placeholder.png" alt="Avatar" style="width:50%">
                  <h4><b>John Doe</b></h4>
                  <p>Architect & Engineer</p>
                </div>
              </div>

              <div class="card">
                <div class="container">
                  <img src="../person-placeholder.png" alt="Avatar" style="width:50%">
                  <h4><b>John Doe</b></h4>
                  <p>Architect & Engineer</p>
                </div>
              </div>
            </div>
          </div>

        </div>
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
