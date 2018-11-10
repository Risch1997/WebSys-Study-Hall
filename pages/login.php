<?php
	include("../includes/header.php");
	
	// Handle new user
	if(isset($_POST["register"])) {
		// Get input values from form
		// TODO: make input strings safe
		$email = $_POST["email"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$password = $_POST["password"];
		$school = $_POST["school"];
		
		// TODO: Ensure all fields are filled out
		if (createUser($email, $first_name, $last_name, $password, $school)) {
			
		}
	}
?>
<html>
	<head>
		<title>Study Hall - Login or Register</title>
	</head>
	<body>
		<form id="register" method="POST">
			<input type="email" name="email" placeholder="Email Address">
			<input type="text" name="first_name" placeholder="First Name">
			<input type="text" name="last_name" placeholder="Last Name">
			<input type="password" name="password" placeholder="Password">
			<select name="school">
				<option value="rpi">Rensselaer Polytechnic Institute</option>
			</select>
			<input type="submit" name="register" value="Register" />
		</form>
	</body>
</html>