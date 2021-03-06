<?php
	require_once("config.php");

	//Include all function files
	include("functions_user.php");
	include("functions_edit_profile.php");
  include("functions_browse.php");
	// EDITED: hzz, Nov 25
	include("functions_screlate.php");
	include("functions_match.php");

	function dbConnect($selectDB = true) {
		global $dbConfig, $dbConn;
		$dbConfig = array(
			"name"	=>	"websys",
			"host"	=>	"108.61.191.73",
			"user"	=>	"root",
			"pass"	=>	"websys555"
		);

		try {
			//Connect to database defined in config
			$dbConn = new PDO("mysql:host=" . $dbConfig["host"] . ";", $dbConfig["user"], $dbConfig["pass"]);
			$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//Select the correct database unless otherwise specified
			if ($selectDB) {
				try {
					$dbConn->exec("USE `" . $dbConfig["name"] . "`;");
				} catch (PDOEXCEPTION $e) {
					return false;
				}
			}
		} catch (PDOException $e) {
			return false;
		}

		// Return true to indicate we have connected to the database
		return true;
	}
?>
