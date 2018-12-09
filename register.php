<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var name_flag;
		var cgpa_flag;
		
		function checkName(name) {
			pattern = new RegExp('^[A-Za-z]+$');
			if (!pattern.test(name)) {
				document.getElementById('name_error').innerHTML = 'Name can contain alphabet only';
				name_flag = false;
			}else{
				name_flag = true;
				document.getElementById('name_error').innerHTML = '';
			}
		}

		function checkCGPA(cgpa) {
			if (cgpa > 10) {
				document.getElementById('cgpa_error').innerHTML = 'CGPA should be less than 10';
				cgpa_flag = false;
			}else{
				document.getElementById('cgpa_error').innerHTML = '';
				cgpa_flag = true;
			}
		}

		function checkForm() {
			if (name_flag && cgpa_flag) {
				return true;
			}else{
				return false;
			}
		}
	</script>

	<style type="text/css">
		#name_error{
			color: red;
		}
		#cgpa_error{
			color: red;
		}
	</style>
</head>
<body>
	<?php include "dbconn.php"; ?>
	<?php include "navbar.php" ?>
	<?php  
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$id = $_POST['id'];
			$age = $_POST['age'];
			$year = $_POST['year'];
			$email = $_POST['email'];
			$avg_cgpa = $_POST['avg_cgpa'];	

			$query = "INSERT INTO student VALUES($id,'$name','$year',$age,'$email','$avg_cgpa')";
			if (!mysqli_query($connection, $query)) {
				die('Query failed'.mysqli_error($connection));			
			}else{
				echo "New entry inserted";
				header('Location: ./index.php');
			}		
			$_POST = array();
		}
	?>

	<div class="container">
		<form method="post" onsubmit="return checkForm()" action="">
			<label>Name: </label>
			<input type="text" class="form-control" onfocusout="checkName(this.value)" name="name" required>
			<p id="name_error"></p>
			<label>ID: </label>
			<input type="number" class="form-control" name="id" required>
			<label>Year: </label>
			<input type="text" class="form-control" name="year" required>
			<label>Age: </label>
			<input type="number" class="form-control" name="age" required>
			<label>Email: </label>
			<input type="email" class="form-control" name="email" required>
			<label>Average CGPA: </label>
			<input type="text" class="form-control" onfocusout="checkCGPA(this.value)" name="avg_cgpa" required><br>
			<p id="cgpa_error"></p>
			<input type="submit" name="submit" class="btn btn-primary">
		</form>
	</div>
</body>
</html>