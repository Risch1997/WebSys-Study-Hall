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

		// Query db to see if a student exists with specified email
		$query = $dbConn->query("SELECT * FROM `Students` WHERE `email`='$email'");

		if ($query->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function login($email, $password) {
		global $dbConn;

		// Query DB to get the salt of associted with the specified email address
		$query = $dbConn->query("SELECT `salt` FROM `Students` WHERE `email`='$email';");

		// Check to make sure something was returned by the query
		if ($query->rowCount() != 1) {
			return false;
		} else {
			$query = $query->fetchObject();
			$salt = $query->salt;

			// Create the salted version of the password
			$salted = hash("sha256", $salt . $password);

			// Check if there is an appropriate entry with the specified email and salted password
			$query = $dbConn->query("SELECT * FROM `Students` WHERE `email`='$email' AND `password`='$salted';");
			if ($query->rowCount() == 1) {
				$user = $query->fetchObject();

				// Set session variables
				$_SESSION['user_id'] = $user->user_id;

				return true;
			} else {
				return false;
			}
		}
	}

	function logout() {
		// Unset session variables
		unset($_SESSION['user_id']);
		session_destroy();

		// Clear browser cookie
		setcookie(session_name(), time() - 72000);
	}
?>
