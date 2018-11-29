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

    return $results;
  }

  // Purpose: base on sid genetate a list of students on course match rankings
  // Return: all sid of students order by course match ranking

  // TODO: for now it return all students's data, NEEDS TOBE CHENGED
  function findMatchCourse($sid, $cid)
  {
    global $dbConn;
    $query = $dbConn->query("SELECT * from Students, Sc_relation WHERE Sc_relation.student_id=Students.user_id AND Sc_relation.course_id='$cid' AND Students.user_id!='$sid';");

    return $query->fetchAll();
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
 ?>
