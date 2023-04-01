<?php

session_start();

if(isset($_SESSION['username'])) 
{
	if ($_SESSION['username'] != "admin") 
    {
    	include('options/ignore_access.php');
    }
}
else
{
    include('options/ignore_access.php');
}

include('options/control.php');

?>
<!DOCTYPE html>
<html>
<head>

	<title>TRUEcar -Exist cars-</title>

	<link rel="icon" type="image/png" href="images/truecar-sl.jpg">
	<link rel="stylesheet" type="text/css" href="styleCss/home.css">
	<link rel="stylesheet" type="text/css" href="styleCss/control.css">

</head>
<body>

	<!--navbar-->

    <?php include('navbar.php');?>

	<!--content-->
		
	<div class="content">

		<div class="link_container">	
		
			<a class="link" href="add_brands.php">Add new brand</a>

			<br><br>

			<a class="link" href="add_cars.php">Add new car</a>

		</div>

		<?php $result_brands = mysqli_query($db,"SELECT * FROM brands ORDER BY name ASC"); ?>

		<?php while($row_brands = mysqli_fetch_array($result_brands)) { ?>
		
			<li class="brand"> 
				<ul>
					<a href="brands/<?php echo $row_brands['name'];?>page.php" class="brand-name"><?php echo $row_brands['name'];?></a> 
					<a href='options/control.php?del_b=<?php echo $row_brands['id'];?>' class="btn del">delete</a>
				</ul>
				<hr>

				<?php 

					$brand_name = $row_brands['name'];
					$result_models = mysqli_query($db,"SELECT * FROM $brand_name ORDER BY carname ASC");

				?>

				<?php while($row_models = mysqli_fetch_array($result_models)) { ?>

					<li class="models">
						<ul>
							<a href="models/<?php echo $brand_name.'-'.$row_models['carname'];?>.php" class="model-name"><?php echo $row_models['carname'];?></a>
							<a href='control.php?del_m=<?php echo $row_models['id'];?>' class="btn del">delete</a>
							<a href='' class="btn edit">Edit</a>
						</ul>
					</li>

					<?php 

					// delete model

					if (isset($_GET['del_m'])) 
					{
						$id = $_GET['del_m'];

						// get model name from database

						$rec = mysqli_query($db, "SELECT carname FROM $brand_name WHERE id=$id");
						$record = mysqli_fetch_array($rec);

						$model = $record['carname'];

						// delete car folder

						array_map('unlink', glob("models/".$brand_name."-".$model."/*.*"));

						rmdir("models/".$brand_name."-".$model);
						
						// file path

						$file = "models/".$brand_name."-".$model.".php";

						// delete file

						unlink($file);

						// delete model from brand table database

						mysqli_query($db, "DELETE FROM $brand_name WHERE id=$id");

						// reload same page

						include('options/ignore_access.php');
					}

					?>

				<?php } ?>

			</li>

		<?php } ?>

	</div>

</body>
</html>