<?php
	include("../includes/header.php");
	// $courses = sizeof(getCourses());
	// echo "<script type='text/javascript'>alert('$courses');</script>";

	$id = 4;
	$currentInfo = getUserProfile($id);
  $fname = $currentInfo->first_name;
	$lname = $currentInfo->last_name;
	$email = $currentInfo->email;
	$semester = $currentInfo->graduation_month;
	$year = $currentInfo->graduation_year;
	$major = $currentInfo->major;
	$minor = $currentInfo->minor;


	// $userPreferences = getCurrentInfo($id);
	// if (isset($_POST["preferences"])) {
	// 	$message = $_POST["course1"];
	// 	echo "<script type='text/javascript'>alert('$message');</script>";
	// 	// $email = $_POST["email"];
	// 	// $first_name = $_POST["first_name"];
	// 	// $last_name = $_POST["last_name"];
	// 	// $password = $_POST["password"];
	// 	// $school = $_POST["school"];
	// 	//
	// 	// // TODO: Ensure all fields are filled out
	// 	// if (createUser($email, $first_name, $last_name, $password, $school)) {
	// 	// 	// TODO: Redirect new user to dashboard and have them signed in.
	// 	// }
  //       $emp_id = $_POST['emp_id'];
  //       $emp_salary = $_POST['emp_salary'];
	//
  //       $sql = "UPDATE employee ". "SET emp_salary = $emp_salary ".
  //          "WHERE emp_id = $emp_id" ;
  //       mysql_select_db('test_db');
  //       $retval = mysql_query( $sql, $conn );
	//
  //       if(! $retval ) {
  //          die('Could not update data: ' . mysql_error());
  //       }
  //       echo "Updated data successfully\n";
	//
        // mysql_close($conn);
	// }
?>


		<h1>Study Hall</h1>
		<div class="center">
			<form id="preferences" method="POST">
				<h1>Student Information</h1>
				<div>
					<p>
						<label for="fname">First Name:</label>
						<input type="text" name="fname" id="fname" value=<?php echo $fname;?> />

						<label for="lname">Last Name:</label>
						<input type="text" name="lname" id="lname" value=<?php echo $lname;?> />

						<label for="email">Email:</label>
						<input type="text" name="email" id="email" value=<?php echo $email;?> />

						<label for="major">Major</label>
						<select id="major" name="major">
						  <option value="Computer Science">Computer Science</option>
							<option value="Information Technology and Web Science">Information Technology and Web Science</option>
							<option value="Mechanical Engineering">Mechanical Engineering</option>
						</select>
						<label for="minor">Minor</label>
						<select id="minor" name="minor">
							<option value="Computer Science">Computer Science</option>
							<option value="Information Technology and Web Science">Information Technology and Web Science</option>
							<option value="Mechanical Engineering">Mechanical Engineering</option>
						</select>
					</p>
					<p>
						<label for="semester">Graduation</label>
						<select id="semester" name="semester">
						  <option value="fall">Fall</option>
							<option value="spring">Spring</option>
						</select>
						<select id="year" name="year">
							<option value=2019>2019</option>
							<option value=2020>2020</option>
							<option value=2021>2021</option>
							<option value=2022>2022</option>
							<option value=2023>2023</option>
						</select>
					</p>
				</div>
				<h1>Course Information</h1>
				<span>
					Add your courses according to their importance,
				</span>
				<div id="coursePriorities">
					<h2>Course Priorities</h2>
					<select id="course1" name="course1">
					</select>
					<button type="button" class="small-button" onclick="addCourseSelect()">Add Course</button>
				</div>
				<input type="submit" name="preferences" value="Save" />
			</form>
		</div>
	</body>
	<script type="text/javascript">
		var semester = "<?= $semester ?>";
		if (semester !== null) alert(semester);
		var year = "<?= $year ?>";
		var major = "<?= $major ?>";
		var minor = "<?= $minor ?>";
	</script>
	<script type="text/javascript" src="../scripts/preferences.js"></script>
</html>
