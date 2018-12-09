<?php include 'dbconn.php'; ?>
<?php  
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM student WHERE id=$id";
		if (!mysqli_query($connection, $query)) {
			die('query failed'.mysqli_error($connection));
		}else{
			header('Location: ./index.php');
		}
	}
?>