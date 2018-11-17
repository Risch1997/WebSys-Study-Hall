<?php
	include("../includes/header.php");
	
	// Handle new user
	if (isset($_POST["register"])) {
		// Get input values from form
		// TODO: make input strings safe
		$email = $_POST["email"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$password = $_POST["password"];
		$school = $_POST["school"];
		
		// TODO: Ensure all fields are filled out
		if (createUser($email, $first_name, $last_name, $password, $school)) {
			// TODO: Redirect new user to dashboard and have them signed in. 
		}
	}
	
	// Handle a signing in user
	if (isset($_POST['login'])) {
		// Get input values from form
		// TODO: make input strings safe
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		// TODO: Ensure all fields are filled out. 
		if (login($email, $password)) {
			// TODO: Redirect signed in user to dashboard
		}
	}
	
	if (isset($_SESSION['user_id'])) {
		echo "Logged in. ID: " . $_SESSION['user_id'];
		echo "<form id=\"logout\" method=\"POST\">
			<input type=\"submit\" name=\"logout\" value=\"Log Out\">
		</form>";
	}
?>
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
<form id="login" method="POST">
	<input type="email" name="email" placeholder="Email Address">
	<input type="password" name="password" placeholder="Password">
	<input type="submit" name="login" value="Log In">
</form>

<?php
	include("../includes/footer.php");
?>