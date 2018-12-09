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
	<div class="container">
		<br>
		<?php 
			$count = 0; 
			$query = "SELECT * FROM images";
			$query_result = mysqli_query($connection, $query);
			if (!$query_result){
				die('Query failed'. mysqli_error($connection));
			}else{
				$count = 0;
				while($query_rows = mysqli_fetch_assoc($query_result)){
					$name = $query_rows['name'];
					$date = $query_rows['date'];
					$description = $query_rows['description'];
					$image_path = $query_rows['image_path'];
					if($count % 4 == 0){
						$count++;
		?>
						<div class="row">
					<?php }?>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" style="border-style: solid;">
							<div class="thumbnail">
								<img style="height: 300px; width: 200px;" src="<?php echo $image_path ?>">
								<div class="caption">
									<p><?php echo $name; ?></p>
									<p><?php echo $date; ?></p>
									<p><?php echo $description; ?></p>
								</div>
							</div>
						</div><br>
					<?php }?>
				<?php }?>
		</div><br>
	</div>
</body>
</html>