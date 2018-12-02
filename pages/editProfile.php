<?php
	include("../includes/header.php");
	$courses = json_encode(getCourses());
	echo "<script type='text/javascript'>console.log('$courses');</script>";
	// $courses = getCourses();
	// [0]["course_id"];
	$id = $_SESSION['user_id'];
	$currentInfo = getUserProfile($id);
  $first_name = $currentInfo->first_name;
	$last_name = $currentInfo->last_name;
	$email = $currentInfo->email;
	$semester = $currentInfo->graduation_semester ?: 'NULL';
	$year = $currentInfo->graduation_year ?: 'NULL';
	$major = $currentInfo->major ?: 'NULL';
	$minor = $currentInfo->minor ?: 'NULL';

	if (isset($_POST["preferences"])) {
		updateProfile($id,$_POST["fname"],$_POST["lname"],$_POST["major"],$_POST["minor"],$_POST["semester"],$_POST["year"] );
		echo "<meta http-equiv='refresh' content='0'>";
		echo "<script type='text/javascript'>$('#notification').css('display', 'block');</script>";
		$courseList = [];
		// if (isset($_POST["course1"])) {
		//
		// }
		// if (isset($_POST["course2"])) {
		//
		// }
		// if (isset($_POST["course3"])) {
		//
		// }
		// if (isset($_POST["course4"])) {
		//
		// }
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
					Add courses and assign them a priority.
				</span>
				<h2>Course Priorities</h2>
				<div id="coursePriorities">
					<div id="courseRow1" class="course-row">
						<select id="course1Prefix" name="course1Prefix" onchange="onSelectPrefixChange(this.id,this.value);">
							<option value="CSCI">CSCI</option>
							<option value="ITWS">ITWS</option>
							<option value="PHYS">PHYS</option>
						</select>
						<select id="course1" name="course1">
						</select><select id="course1Priority" name="course1Priority">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>
					<div id="coursePriorityButtons">
						<button type="button" class="small-button" onclick="addCourseSelect()">Add Course</button>
					</div>
				</div>
				<input type="submit" name="preferences" value="Save" />
			</form>
		</div>
	</body>
	<script type="text/javascript">
		// var courses = <?php echo json_encode($courses) ?>;
		// console.log(courses);
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
