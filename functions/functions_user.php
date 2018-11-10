<?php

	function createUser($email, $first_name, $last_name, $password, $school) {
		global $dbConn, $dbConfig;
		
		// Ensure a user has not already been created with this email.
		if (userExists($email)) {
			return false;
		}
		
		// Generate random salt
		$salt = hash("sha256", uniqid(mt_rand(), true));
		
		// Add salt to the password and hash it.
		$salted = hash("sha256", $salt . $password);
		
		// SQL Query used to add user to database
		$query = "INSERT INTO `Students` (`first_name`, `last_name`, `email`, `password`, `salt`, `school`)
		VALUES ('$first_name', '$last_name', '$email', '$salted', '$salt', '$school')";
		
		// Create the new user in database.
		$dbConn->exec($query);
		
		// Return true to indicate the new user has been created successfully
		return true;
	}
	
	function userExists($email) {
		global $dbConn;
		echo $dbConfig["name"];
		
		// Query db to see if a student exists with specified email
		$query = $dbConn->query("SELECT * FROM `Students` WHERE `email`='$email'");
		$user = $query->fetch(PDO::FETCH_ASSOC);
		
		if (count($user) > 0) {
			return true;
		} else {
			return false;
		}
	}
?>