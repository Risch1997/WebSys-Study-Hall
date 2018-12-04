<?php
	include("../includes/header.php");

  if (isset($_SESSION['user_id'])) {
    header("Location: myMatches.php");
  }

	// Handle new user
	if (isset($_POST["register"])) {
		// Get input values from form
		$email = mysql_real_escape_string($_POST["email"]);
		$first_name = mysql_real_escape_string($_POST["first_name"]);
		$last_name = mysql_real_escape_string($_POST["last_name"]);
		$password = mysql_real_escape_string($_POST["password"]);
		$school = mysql_real_escape_string($_POST["school"]);

		if (createUser($email, $first_name, $last_name, $password, $school)) {
      if (login($email, $password)) {
        header("Location: myMatches.php");
      }
		}
	}

	// Handle a signing in user
	if (isset($_POST['login'])) {
		// Get input values from form
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);

		if (login($email, $password)) {
			header("Location: myMatches.php");
		}
	}

	// Handle add a sc_relation
	if (isset($_POST['add'])) {
		$sid = $_SESSION['user_id'];
		$cid = $_POST["course_id"];
		$priority = $_POST["priority"];
		if (addRelation($sid, $cid, $priority)){

		}
	}

	if (isset($_SESSION['user_id'])) {

		// echo "Logged in. ID: " . $_SESSION['user_id'];

		// echo "<form id=\"logout\" method=\"POST\">
		// 	<input type=\"submit\" name=\"logout\" value=\"Log Out\">
		// </form>";
	}
?>
<form class=wrap id="register" method="POST">
	<input type="email" name="email" placeholder="Email Address" required>
	<input type="text" name="first_name" placeholder="First Name" required>
	<input type="text" name="last_name" placeholder="Last Name" required>
	<input type="password" name="password" placeholder="Password" required>
	<select name="school" required>
		<option value="rpi">Rensselaer Polytechnic Institute</option>
	</select>
	<button type="submit" name="register" value="Register">Register</button>
</form>
<form class=wrap id="login" method="POST">
	<input type="email" name="email" placeholder="Email Address" required>
	<input type="password" name="password" placeholder="Password" required>
	<button type="submit" name="login" value="Log In"> Log In</button>
</form>


<?php
	include("../includes/footer.php");
?>
