<?php

  include("../includes/header.php");

  if(isset($_SESSION['user_id'])) {

  }
  
  if (isset($_POST['invite'])) {
    global $dbConn;
    
    $id1 = $_SESSION['user_id'];
    $id2 = $_POST['studentId'];
    
    try {
      $query = $dbConn->prepare("INSERT INTO `Matches` (`student_id1`, `student_id2`, `status`) VALUES(?, ?, ?);");
      $query->execute(array($id1, $id2, "Pending"));
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  
  $scores = getScores($_SESSION['user_id']);
  foreach ($scores as $id => $score) {
    $student = getStudentInfo($id);
    $courses = getStudentCourses($id);
    
    echo "
    <div class=\"column\">
      <div class=\"card\">
        <h3>" . $student['first_name'] . " " . $student['last_name'] . "</h3>
        <p><strong>Major:</strong> " . $student['major'] . "</p>
        <p><strong>Graduation Date:</strong> " . $student['graduation_semester'] . " " . $student['graduation_year'] . "</p>
        <p class=\"centered\"><strong>Courses</strong></p>";
        
    foreach ($courses as $course) {
      echo "
        <p>" . $course['subject'] . " " . $course['course_number'] . "-" . $course['course_name'] . "</p>";
    }
        
    echo "
        <form method=\"POST\">
          <input type=\"hidden\" name=\"studentId\" value=\"" . $student['user_id'] . "\" />
          <input type=\"submit\" class=\"inviteButton\" name=\"invite\" value=\"Invite\" />
        </form>
      </div>
    </div>";    
  }
?>

  </body>
</html>