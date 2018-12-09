<?php  
	$servername = "localhost";
	$username = "root";
	$password = "";

	$connection = mysqli_connect($servername, $username, $password);
	if (!$connection) {
		echo "connection failed".mysqli_connect_error();
	}else{
		// echo "Connection successful";
	}

	$create_db = "CREATE DATABASE IF NOT EXISTS Students";
	if (mysqli_query($connection, $create_db)) {
		// echo "Database created";
	}else{
		echo "DB creation error: ".mysqli_error($connection);
	}

	$connection = mysqli_connect($servername, $username, $password, 'Students');
	$create_table = "CREATE TABLE IF NOT EXISTS student(id int, name varchar(255), year varchar(255), age int, email varchar(255), avg_cgpa varchar(255))";
	if (mysqli_query($connection, $create_table)) {
		// echo "Table created";
	}else{
		echo "Table error: ".mysqli_error($connection);
	}
?>