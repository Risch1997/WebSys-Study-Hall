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
  function getCourses() {
    global $dbConn, $dbConfig;
    $allCourses = array();
    // SQL Query to get all courses from the database
		$query = "SELECT * FROM Courses";
    $result = $dbConn->query($query);
    if ($result->rowCount() > 0) {
      // $row = $result->fetch_array(MYSQLI_ASSOC);
      // printf ("%s (%s)\n", $row["course_id"], $row["subject"]);
      // while( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
        // $title = $row["course_name"];
        // echo "<script type='text/javascript'>alert('$title');</script>";
      // }
      // while ($row = mysql_fetch_object($result))) {
      //     $title = $row->title;
      //     // printf("'%s'@'%s'\n", $row['title']);
      //     echo "<script type='text/javascript'>alert('$title');</script>";
      // }
      //   $courseOption = "a"; //"<option value=\"" . $row["title"] . "\">" . $row["subject"] . " " . $row["course_number"] . " - "$row["title"] ."</option>";        }
      //   array_push($allCourses, "a");
      //   echo "<script type='text/javascript'>alert('Prefeneces Course function');</script>";
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
