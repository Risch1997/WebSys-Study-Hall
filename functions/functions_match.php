<?php
  // Purpose: base on sid genetate a list of students on match rankings
  // Return: all sid of students order by match ranking

  // TODO: for now it return all students's data, NEEDS TOBE CHENGED
  function findMatchAll($sid)
  {
    global $dbConn;

    $query = $dbConn->query("SELECT * FROM `Sc_relation` as s1 WHERE s1.student_id!='$sid' AND
    EXISTS (SELECT 1 from `Sc_relation` as s2 where s2.student_id='$sid' and s2.course_id=s1.course_id);");

    $matches = $query->fetchAll();

    $query = $dbConn->query("SELECT * FROM `Sc_relation` as s1 WHERE s1.student_id='$sid'");

    $self = $query->fetchAll();

    $results = array();

    foreach($matches as $m) {
      if (array_key_exists($m[0],$results)) {
        $tmp = $results[$m[0]]+$m[2];
        $results[$m[0]] = $tmp;
      } else {
        $tmp_sid = $m[0];
        $tmp_sum = $m[2];
        foreach ($self as $s) {
          if ($s[0]==$m[0]) {
            $tmp_sum += $s[2];
          }
        }
        $results[$tmp_sid] = $tmp_sum;
      }
    }

    $output = array();

    foreach ($results as $key => $value) {

      $query = $dbConn->query("SELECT * FROM `Students` as s1 WHERE s1.user_id='$key'");

      $tmp_db = $query->fetchObject();

      $tmp = array(
        'first_name' => $tmp_db->first_name,
        'last_name' => $tmp_db->first_name,
        'email' => $tmp_db->email,
        'priority' => $value
      );

      array_push($output, $tmp);
    }

    return $output;
  }

  // Purpose: base on sid genetate a list of students on course match rankings
  // Return: all sid of students order by course match ranking

  // TODO: for now it return all students's data, NEEDS TOBE CHENGED
  function findMatchCourse($sid, $subject, $number)
  {
    global $dbConn;

    $query = $dbConn->query("SELECT `course_id` FROM `Courses` WHERE `subject`='$subject' AND `course_number`='$number';");

    if ($query->rowCount() == 1) {
      $query = $query->fetchObject();
      $cid = $query->course_id;

      $query = $dbConn->query("SELECT first_name,last_name,email,priority from Students, Sc_relation WHERE Sc_relation.student_id=Students.user_id AND Sc_relation.course_id='$cid' AND Students.user_id!='$sid' ORDER BY Sc_relation.priority DESC;");

      return $query->fetchAll();
    }

    // $results = array();

    //  $matches = $query->fetchAll();
    // foreach ($matches as $m) {
    //   $results[$m[0]] = $m[14];
    // }
  }

  // Purpose: add single record to db
  function addMatch($sid1, $sid2, $status)
  {
    global $dbConn;

    $query = "INSERT INTO `Matches` (`student_id1`, `student_id2`, `status`)
    VALUES ('$sid1', '$sid2', '$status')";

    $dbConn->exec($query);
    return True;
  }

  // Return a list of exist matches.
  // function listMatch()
 ?>
