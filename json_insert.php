<!DOCTYPE html>
<html>
<head>
	<title>Insert JSON</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php include 'dbconn.php'; ?>
	<?php include 'navbar.php'; ?>
	<div class="container">
		<?php  
			if (isset($_POST['insert'])) {
				$json_string = $_POST['json_string'];
				$data_string = json_decode($json_string, true);

				foreach ($data_string as $item) {
					$query = "INSERT INTO student VALUES('".$item['id']."','".$item['name']."','".$item['year']."','".$item['age']."','".$item['email']."','".$item['avg_cgpa']."')";
					if (mysqli_query($connection, $query)) {
						header('Location: index.php');
					}else{
						die('query failed: '.mysqli_error($connection));
					}
				}
			}
		?>
		<br>
		<form action="" method="post">
			<label>Enter JSON string:</label>
			<textarea class="form-control" rows=5 required name="json_string"></textarea><br>
			<input type="submit" class="btn btn-primary" name="insert" value="insert">
		</form>
	</div>
</body>
</html>
