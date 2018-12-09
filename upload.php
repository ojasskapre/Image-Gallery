<!DOCTYPE html>
<html>
<head>
	<title>Image Gallery</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php include "./dbconn.php"?>
	<?php include "./navbar.php"?>
	<?php  
		if (isset($_POST['upload'])) {
			$name = $_POST['name'];
			$date = date('Y-m-d');
			$description = $_POST['description'];
			$target_dir = "images/";
			$target_file = $target_dir.basename($_FILES["image_upload"]["name"]);
			$img_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			if ($img_file_type == 'jpg' || $img_file_type == 'jpeg' || $img_file_type == 'png') {
				move_uploaded_file($_FILES['image_upload']['tmp_name'], $target_file);
				$query = "INSERT INTO images VALUES('$name', '$date', '$description', '$target_file')";
				$query_result = mysqli_query($connection, $query);
				if (!$query_result) {
					die('Query Failed: '. mysqli_error($connection));
				}else{
					# header('Location: index.php');
				}
			}
		}
	?>
	<div class="container">
		<form action="" method="post" enctype="multipart/form-data">
			<label>Name:</label>
			<input type="text" class="form-control" name="name" placeholder="Enter your name" required><br>
			<label>Description:</label>
			<input type="text" class="form-control" name="description" placeholder="Give details" required><br>
			<label>Upload Image</label>
			<input type="file" class="form-control" name="image_upload" required><br>
			<input type="submit" class="btn btn-primary" name="upload" value="Upload">
		</form>
	</div>
</body>
</html>