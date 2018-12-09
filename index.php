<!DOCTYPE html>
<html>
<head>
	<title>Student Database</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php include "dbconn.php" ?>
	<?php include "navbar.php" ?>
	<br>
	<div class="container">
		<table class="table table-striped">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Year</th>
				<th>Age</th>
				<th>Average CGPA</th>
				<th></th>
			</tr>
		<?php  
			$query = "SELECT *FROM student";
			$query_result = mysqli_query($connection, $query);
			if (!$query_result) {
				die("Query failed: ".mysqli_error($connection));
			}else{
				$database_array = [];
				while ($row = mysqli_fetch_assoc($query_result)) {
					$database_array[] = $row;
					$id = $row['id'];
					$name = $row['name'];
					$email = $row['email'];
					$year = $row['year'];
					$age = $row['age'];
					$avg_cgpa = $row['avg_cgpa'];
					$databse_json = json_encode($database_array, JSON_PRETTY_PRINT);
		?>
			<tr>
				<td><?php echo $id ?></td>
				<td><?php echo $name ?></td>
				<td><?php echo $email ?></td>
				<td><?php echo $year ?></td>
				<td><?php echo $age ?></td>
				<td><?php echo $avg_cgpa ?></td>
				<td><button class="btn btn-danger"><a style="color: white;" href="delete_entry.php?id=<?php echo $id ?>">Delete</a></button></td>
			</tr>
		<?php
				}
			}
		?>
		</table>
		<h3>JSON Representation of database</h3>
		<?php echo $databse_json ?>
	</div>
</body>
</html>