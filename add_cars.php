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

include('options/add_cars.php');

?>
<!DOCTYPE html>
<html>
<head>

	<title>TRUEcar -Add cars-</title>

	<link rel="icon" type="image/png" href="images/truecar-sl.jpg">
	<link rel="stylesheet" type="text/css" href="styleCss/add_brands.css">
	<link rel="stylesheet" type="text/css" href="styleCss/home.css">

	<!--show selected option in hidden textbox-->

	<script type="text/javascript">
						
		function updateText()
		{
			var combo = document.getElementById("combobox");
			var displaytext = combo.options[combo.selectedIndex].text;
			document.getElementById("select_text").value = displaytext;
		}

	</script>

</head>
<body>

	<!--navbar-->

    <?php include('navbar.php');?>

	<!--content-->

	<div class="content">

		<form method="post" action="" enctype="multipart/form-data">

			<a href="control.php" class="link">View, edit and delete cars</a>

			<input type="hidden" name="size" value="1000000">

			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<div>
				<label>Brand</label><br><hr>

				<select id="combobox" name="combobox" onchange="updateText();"> 

					<option disabled="brand" selected>Brand</option>

					<?php
						$results = mysqli_query($db, "SELECT * FROM brands ORDER BY name ASC");
						while($row = mysqli_fetch_array($results)) { 
					?>

						<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>

					<?php } ?>

				</select>

				<input id="select_text" type="hidden" name="select_text" value="" />
			</div>

			<div>
				<label>Upload bacground</label><br><hr>
				<input type="file" name="bg" required>
			</div>

			<div class="input-group">
				<label>Car name</label><br><hr>
				<input class="text" type="text" name="carname" maxlength="25" required>
			</div>

			<div class="input-group">
				<label>Car rental price</label><br><hr>
				<input class="text" type="text" name="rentalprice" maxlength="15" required>
			</div>

			<div class="input-group">
				<label>Write about car</label><br><hr>
				<textarea class="text" maxlength="2000" name="car_text" style="resize:none; width: 98%; height: 100px" placeholder="Enter car details. . ." required ></textarea>
			</div>

			<div>
				<label>Upload small bacground</label><br><hr>
				<input type="file" name="sub_bg" required>
			</div>

			<div>
				<label>Upload formal image</label><br><hr>
				<input type="file" name="formal_img" required>
			</div>

			<div>
				<label>Upload img1</label><br><hr>
				<input type="file" name="img1" required>
			</div>

			<div>
				<label>Upload img2</label><br><hr>
				<input type="file" name="img2" required>
			</div>

			<div>
				<label>Upload img3</label><br><hr>
				<input type="file" name="img3" required>
			</div>

			<div>
				<label>Upload img4</label><br><hr>
				<input type="file" name="img4" required>
			</div>

			<div>
				<label>Upload img5</label><br><hr>
				<input type="file" name="img5" required>
			</div>

			<div>
				<label>Upload img6</label><br><hr>
				<input type="file" name="img6" required>
			</div>

			<div>
				<label>Upload img7</label><br><hr>
				<input type="file" name="img7" required>
			</div>

			<div>
				<label>Upload img8</label><br><hr>
				<input type="file" name="img8" required>
			</div>

			<div>
				<label>Upload img9</label><br><hr>
				<input type="file" name="img9" required>
			</div>

			<div>
				<label>Upload img10</label><br><hr>
				<input type="file" name="img10" required>
			</div>

			<div>
				<label>Upload img11</label><br><hr>
				<input type="file" name="img11" required>
			</div>

			<div>
				<label>Upload img12</label><br><hr>
				<input type="file" name="img12" required>
			</div>

			<div>

				<button type="submit" name="save" class="btn">Add</button>

			</div>

			<br>

		</form>

</body>
</html>