<?php
	include("../includes/header.php");
?>
<style>
<?php include '../styles/preferences.css'; ?>
</style>
<html>
	<head>
		<title>Study Hall - Preferences</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
		<h1>Study Hall</h1>
		<div class="center">
			<form id="preferences" method="POST">
				<h1>Student Information</h1>
				<div>
					<p>
						<label for="major">Major</label>
						<select id="major" name="major">
						  <option value="volvo">Computer Science</option>
						</select>
						<label for="minor">Minor</label>
						<select id="minor" name="minor">
							<option value="volvo">Computer Science</option>
						</select>
					</p>
					<p>
						<label for="month">Graduation</label>
						<select id="month" name="month">
						  <option value="volvo">January</option>
							<option value="volvo">February</option>
							<option value="volvo">March</option>
							<option value="volvo">April</option>
							<option value="volvo">May</option>
							<option value="volvo">June</option>
							<option value="volvo">July</option>
							<option value="volvo">August</option>
							<option value="volvo">September</option>
							<option value="volvo">October</option>
							<option value="volvo">November</option>
							<option value="volvo">December</option>
						</select>
						<select id="year" name="year">
						  <option value="volvo">Year</option>
						</select>
					</p>
				</div>
				<h1>Course Information</h1>
				<span>
					Drap and drop courses. Reorder them to rank their priority,
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
	<script type="text/javascript" src="../scripts/preferences.js"></script>
</html>
