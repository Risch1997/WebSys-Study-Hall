<?php
	require_once("config.php");
	//Include all function files
	include("functions_user.php");
	
	function dbConnect($selectDB = true) {
		global $dbConfig, $dbConn;
		
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