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

  // function to fetch all courses from the database
  function getCourses() {
    global $dbConn, $dbConfig;
    $allCourses = array();
    // SQL Query to get all courses from the database
		$query =  "SELECT * FROM `Courses` LIMIT 100;";
    $result = $dbConn->query($query);

    if ($result->rowCount() > 0) {
      $allCourses =  $result->fetchAll();
    }
    return $allCourses;
  }

  function updateProfile($id,$fname,$lname,$major, $minor,$semester, $year) {
    global $dbConn, $dbConfig;

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

  function addCourses($id, $courses) {
    global $dbConn, $dbConfig;

    // SQL Query used to add user to database
    // $query = "UPDATE `Sc_relation`
    // SET `first_name`='$fname',
    // `last_name`='$lname',
    // `graduation_semester`='$semester',
    // `graduation_year`='$year',
    // `major` = '$major',
    // `minor` = '$minor'
    // WHERE `user_id`='$id';";

		// Create the new user in database.
		$dbConn->exec($query);

		// Return true to indicate the new user has been created successfully
		return true;
  }
