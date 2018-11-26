<?php

  // fetch current user's information from the database
  function getUserProfile($id) {
    global $dbConn, $dbConfig;

    $info = [];
    $result = $dbConn->query("SELECT * FROM `Students` WHERE `user_id`='$id';");
    if ($result->rowCount() == 1) {
      // echo "<script type='text/javascript'>alert('aaaaaaaaaa');</script>";
			$user = $result->fetchObject();
			$info = $user;
    }
    return $info;
  }

  // function to fetch all courses from the database
  // function getCourses() {
  //   global $dbConn, $dbConfig;
  //   $allCourses = array();
  //   // SQL Query to get all courses from the database
	// 	$query = "SELECT * FROM `Courses`";
  //   $result = $dbConn->query($query);
  //
  //   if ($result->rowCount() > 0) {
  //     $word = gettype($result); //->rowCount();
  //     echo "<script type='text/javascript'>alert('$word');</script>";
      // $row = $results->fetch_assoc();
      // while ($row = $result->fetch_assoc()) {
      //     printf("'%s'@'%s'\n", $row['title']);
      // }
        // $courseOption = "a"; //"<option value=\"" . $row["title"] . "\">" . $row["subject"] . " " . $row["course_number"] . " - "$row["title"] ."</option>";        }
        // array_push($allCourses, "a");
        // echo "<script type='text/javascript'>alert('Prefeneces Course function');</script>";
      // }
  //   }
  //   return $allCourses;
  // }

  // function addCourses() {
  //   global $dbConn, $dbConfig;
  //
  //   // SQL Query used to add user to database
	// 	$query = "INSERT INTO `Sc_relation` (`student_id`, `course_id`, `priority`)
	// 	VALUES (`$student_id`, `$course_id`, `$priority`)";
  //
	// 	// Create the new user in database.
	// 	$dbConn->exec($query);
  //
	// 	// Return true to indicate the new information has been added
	// 	return true;
  // }
  //
  // function addInfo($id,$month = null, $year = null, $major = null, $minor = null) {
  //   global $dbConn, $dbConfig;
  //
  //   // SQL Query used to add user to database
	// 	$query = "INSERT INTO `students` (`graduation_month`, `graduation_year`, `major`, `minor`)
	// 	VALUES (`$student_id`, `$course_id`, `$priority`)";
  //
  //   $query = "UPDATE `students`
  //   SET `graduation_month`=`$month`,
  //   `graduation_year`=`$year`,
  //   `major` = `$major`,
  //   `minor` = `$minor`
  //   WHERE id=`$id`";
  //
	// 	// Create the new user in database.
	// 	$dbConn->exec($query);
  //
	// 	// Return true to indicate the new user has been created successfully
	// 	return true;
  // }
