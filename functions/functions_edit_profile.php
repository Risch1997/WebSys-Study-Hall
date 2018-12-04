<?php

  // fetch current user's information from the database
  function getUserProfile($id) {
    global $dbConn, $dbConfig;

    $info = [];
    $result = $dbConn->query("SELECT * FROM `Students` WHERE `user_id`='$id';");
    if ($result->rowCount() == 1) {
			$user = $result->fetchObject();
			$info = $user;
    }
    return $info;
  }

  function getUserCourses($id) {
    global $dbConn, $dbConfig;

    $info = [];
    $result = $dbConn->query("SELECT `course_id`, `priority` FROM `Sc_relation` WHERE `student_id`='$id';");
    if ($result->rowCount() > 0) {
			$info = $result->fetchAll();
    }
    return $info;
  }


  // function to fetch all courses from the database
  function getCourses() {
    global $dbConn, $dbConfig;
    $allCourses = array();
    // SQL Query to get all courses from the database
		$query =  "SELECT * FROM `Courses`;";
    $result = $dbConn->query($query);

    if ($result->rowCount() > 0) {
      $allCourses =  $result->fetchAll();
    }
    return $allCourses;
  }

  function updateProfile($id,$fname,$lname,$major, $minor,$semester, $year) {
    global $dbConn, $dbConfig;


    if (strcmp("None",$minor)) {
      $minor = null;
    }

    // SQL Query used to add user to database
    $query = "UPDATE `Students`
    SET `first_name`='$fname',
    `last_name`='$lname',
    `graduation_semester`='$semester',
    `graduation_year`='$year',
    `major` = '$major',
    `minor` = '$minor'
    WHERE `user_id`='$id';";

		// Create the new user in database.
		$dbConn->exec($query);

		// Return true to indicate the new user has been created successfully
		return true;
  }

  function updateCourses($id, $courseList) {
    global $dbConn, $dbConfig;

    if (sizeof($courseList) > 0) {
      $query1 = "DELETE from Sc_relation WHERE student_id = '$id';";
      $dbConn->exec($query1);

      foreach ($courseList as $value) {
        // echo "<script type=\"text/javascript\">alert('$value[0]');</script>";
        $query2 = "INSERT INTO Sc_relation (student_id, course_id, priority)
                  VALUES ('$id', '$value[0]', '$value[1]');";
        $dbConn->exec($query2);
      }
    }
		return true;
  }
