<?php
  // Purpose: add single Sc_relation record to db
  function addRelation($sid, $cid, $priority)
  {
    global $dbConn;

    $query = "INSERT INTO `Sc_relation` (`student_id`, `course_id`, `priority`)
    VALUES ('$sid', '$cid', '$priority')";

    $dbConn->exec($query);

    return True;
  }

 ?>
