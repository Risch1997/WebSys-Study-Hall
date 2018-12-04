<?php

  include("../includes/header-myMatches.php");

  $pending = array();
  $accepted = array();
  if(isset($_SESSION['user_id'])) {
    $sid = $_SESSION['user_id'];
    $pending  = pendingMatchAll($sid);
    for ($i=0; $i < sizeof($pending); $i++) {
        $match_id = $pending[$i]['student_id1'];
        $pending[$i]['courses'] = getUserCourses($match_id);
    }
    $accepted = acceptedMatchAll($sid);
    for ($i=0; $i < sizeof($accepted); $i++) {
        $match_id = $accepted[$i]['user_id'];
        $accepted[$i]['courses'] = getUserCourses($match_id);
    }
  }
  if (isset($_POST['accept'])) {
    global $dbConn;

    $res = updateMatchStatus($_POST['matchId'], "Accepted");
    header("Location: myMatches.php");
  }
  if (isset($_POST['remove'])) {
    global $dbConn;
    $res = updateMatchStatus($_POST['matchId'], "Removed");
    header("Location: myMatches.php");
  }

?>
  <h1 class="center">My Matches</h1>

    <div id="matches-list" class="center">
        <div id="pending" class="column">
          <h2>Invitations:</h2>
          <hr>

          <div class="card-container">
          </div>
        </div>
        <div id="accepted" class="column">
            <h2>Matches:</h2>
            <hr>
            <div class="card-container">
            </div>
        </div>
    </div>
  </body>
  <script>
    var allPending = <?php echo json_encode($pending) ?>;
    var allAccepted = 	<?php echo json_encode($accepted) ?>;
  </script>
  <script type="text/javascript" src="../scripts/myMatches.js"></script>
</html>
