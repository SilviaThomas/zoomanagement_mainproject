<!DOCTYPE html>
<html>
<head>
	<title>Employee Attendance System</title>
</head>
<body>
	<h2>Mark Attendance</h2>
	<form method="post" action="submit.php">
		<label>Employee Name:</label>
		<input type="text" name="employee_name"><br><br>
		<label>Date:</label>
		<input type="date" name="date"><br><br>
		<label>Morning:</label>
		<input type="checkbox" name="morning" value="1"><br>
		<label>Afternoon:</label>
		<input type="checkbox" name="afternoon" value="1"><br>
		<label>Evening:</label>
		<input type="checkbox" name="evening" value="1"><br><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
