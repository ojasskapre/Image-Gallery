<?php  
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'image_gallery';

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if (!($connection)) {
		die('database connection failed'. mysqli_connect_error());
	}else{
		# echo "Connection successful";
	}
	// $create_db = "CREATE DATABASE IF NOT EXISTS image_gallery";
	// if (mysqli_query($connection, $create_db)) {
	// 	echo "Databse Created";
	// }else{
	// 	die('create db failed'. mysqli_error($connection));
	// }

	// $create_table = "CREATE TABLE IF NOT EXISTS image(name VARCHAR(255),date date, decription VARCHAR(255), image_path VARCHAR(255))";
	// if (mysqli_query($connection, $create_table)) {
	// 	echo "Table created";
	// }else{
	// 	die('create table failed'. mysqli_error($connection));
	// }
?>