<?php

  // Purpose: base on sid genetate a list of students on match rankings
  // Return: all sid of students order by match ranking
  // function findMatch($sid)
  // {
  //   global $dbConn;

  //   $query = "SELECT * FROM `Sc_relation`  "

  // }

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
