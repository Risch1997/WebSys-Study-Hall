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
			header("Location: index.php");
			// TODO: Redirect signed in user to dashboard
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


		// //---EDITED: hzz, NOV 25, TESTING FUNCTIONALITY---
		// $matches = findMatchAll($_SESSION['user_id']);

		// echo "<h4>Matches</h4>";
		// foreach ($matches as $key => $value) {
		// 	echo "<p>student_id: ".$key. " Mpts: ".$value."</p>";
		// }
		// echo "<form id=\"add\" method=\"POST\">
		// 	<input type=\"cid\" name=\"course_id\" placeholder=\"Course Id\">
		// 	<input type=\"priority\" name=\"priority\" placeholder=\"Priority\">
		// 	<input type=\"submit\" name=\"add\" value=\"Add\">
		// </form>";
		// //------------------------------------------------

		// echo "<form id=\"logout\" method=\"POST\">
		// 	<input type=\"submit\" name=\"logout\" value=\"Log Out\">
		// </form>";
	}
?>
<div id="logo">
  <a href="">
    <img src="../studyHallLogo.png" alt="Logo for the Study Hall Site" height="100">
  </a>
</div>
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
