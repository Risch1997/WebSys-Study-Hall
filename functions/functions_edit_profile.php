<?php
  require_once("functions.php");

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

    // if ($result->rowCount() > 0) {
    //   $allCourses =  $result->fetchAll();
    // }
    return $allCourses;
  }

  function getPrefixes() {
    global $dbConn, $dbConfig;
    $allPrefix = array();
    // SQL Query to get all courses from the database
		$query =  "SELECT DISTINCT `subject` FROM `Courses`;";
    $result = $dbConn->query($query);

    if ($result->rowCount() > 0) {
      $allPrefix =  $result->fetchAll();
    }
    return $allPrefix;
  }

  function getPrefixCouses($prefix) {
    // dbConnect();
    global $dbConn, $dbConfig;
    echo "aaaaaaaaaaaaaa";
    $allCourses = array();
    // SQL Query to get all courses from the database

    try {
      $stmt = $dbConn->prepare("SELECT * FROM Courses WHERE subject = ?");
      echo "aaaaaaaaaaaaaa";
      $stmt->execute(array($prefix));
      $result = $stmt->get_result();
    } catch(Exception $e) {
      echo $e->getMessage();
    }


		// $query =  "SELECT * FROM `Courses` WHERE `subject` = '$prefix';";
    // $result = $dbConn->query($query);
    // if ($result->rowCount() > 0) {
    //   $length = sizeof($allCourses);
    //   echo "<script type=\"text/javascript\">alert('$length');</script>";
    //   $allCourses = $result->fetchAll();
    // }
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

  if (isset($_POST['prefix'])) {
    $prefix = $_POST['prefix'];
    $courses = getPrefixCouses($prefix);
    echo json_encode($prefix);
  }
