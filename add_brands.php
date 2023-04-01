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

include('options/add_brands.php');

?>
<!DOCTYPE html>
<html>
<head>

	<title>TRUEcar -Add brands-</title>

	<link rel="icon" type="image/png" href="images/truecar-sl.jpg">
	<link rel="stylesheet" type="text/css" href="styleCss/add_brands.css">
	<link rel="stylesheet" type="text/css" href="styleCss/home.css">

</head>
<body>

	<!--navbar-->

    <?php include('navbar.php');?>

	<!--content-->

	<div class="content">

		<form method="post" action="" enctype="multipart/form-data">

			<a class="link" href="control.php">View and delete brands</a>

			<input type="hidden" name="size" value="1000000">

			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<div>
				<label>Upload brand logo</label><br><hr>
				<input type="file" name="image" value="<?php echo $image; ?>" required>
			</div>

			<div class="input-group">
				<label>Brand name</label><br><hr>
				<input class="text" type="text" name="name" maxlength="20" value="<?php echo $name; ?>" required>
			</div>

			<div>
				<label>Upload HD img</label><br><hr>
				<input type="file" name="background" value="<?php echo $image; ?>" required>
			</div>

			<div>

				<button type="submit" name="save" class="btn">Add</button>

			</div>
		</form>
	</div>
	
</body>
</html>