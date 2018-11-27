<?php
	include("../includes/header.php");
	$courses = sizeof(getCourses());
	// echo "<script type='text/javascript'>alert('$courses');</script>";

	$id = 4;
	$currentInfo = getUserProfile($id);
  $first_name = $currentInfo->first_name;
	$last_name = $currentInfo->last_name;
	$email = $currentInfo->email;
	$semester = $currentInfo->graduation_month;
	$year = $currentInfo->graduation_year;
	$major = $currentInfo->major;
	$minor = $currentInfo->minor;

	// $userPreferences = getCurrentInfo($id);
	if (isset($_POST["preferences"])) {
		updateProfile($id,$_POST["fname"],$_POST["lname"],$_POST["major"],$_POST["minor"],$_POST["semester"],$_POST["year"] );
		echo "<meta http-equiv='refresh' content='0'>";
		echo "<script type='text/javascript'>$('#notification').css('display', 'block');</script>";
	}
?>

		<h1>Study Hall</h1>
		<div id="notification" class="success">
		  Profile was successfully updated!
		</div>
		<div class="center">
			<form id="preferences" method="POST">
				<h1>Student Information</h1>
				<div>
					<p>
						<label for="fname">First Name:</label>
						<input type="text" name="fname" id="fname" value=<?php echo $first_name;?> />

						<label for="lname">Last Name:</label>
						<input type="text" name="lname" id="lname" value=<?php echo $last_name;?> />

						<label for="email">Email:</label>
						<input type="text" name="email" id="email" value=<?php echo $email;?> readonly/>

						<label for="major">Major</label>
						<select id="major" name="major">
						  <option value="Computer Science">Computer Science</option>
							<option value="Information Technology and Web Science">Information Technology and Web Science</option>
							<option value="Mechanical Engineering">Mechanical Engineering</option>
						</select>
						<label for="minor">Minor</label>
						<select id="minor" name="minor">
							<option value="None">None</option>
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
		var year = parseInt("<?= $year ?>");
		var major = "<?= $major ?>";
		var minor = "<?= $minor ?>";
		if (semester == "") {
			$("#semester").val("fall");
		} else {
			$("#semester").val(semester);
		}
		if (!year) {
			$("#year").val(2021);
		} else {
			$("#year").val(year);
		}
		if (major == "") {
			$("#major").val("Computer Science");
		} else {
			$("#major").val(major);
		}
		if (minor == "") {
			$("#minor").val("None");
		} else {
			$("#minor").val(minor);
		}
	</script>
	<script type="text/javascript" src="../scripts/editProfile.js"></script>
</html>
