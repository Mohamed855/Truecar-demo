<?php

	// initialize variables

	$image = "";
	$name = "";
	$id = 0;

	// conect to database

	$db = mysqli_connect('localhost', 'root', '', 'truecar(web)');

	// add new 

	if(isset($_POST['save']))
	{

		// check if brand exist

		$Bname = $_POST['name'];

		$check_exist = mysqli_query($db,"SELECT name from brands where name='$Bname'");

		if (mysqli_num_rows($check_exist)>=1) 
		{
			$already_exist = $Bname." already exists";
			echo "<script type='text/javascript'> alert('$already_exist'); </script>";
            include('options/ignore_access.php');
		}
		else
		{
			// the path to store uploaded img
		
			$target = "brands/logos/".basename($_FILES['image']['name']);

			$target2 = "brands/backgrounds/".basename($_FILES['background']['name']);

			// get all the submitted data from the form
			
			$image = $_FILES['image']['name'];
			$bg = $_FILES['background']['name'];
			$name = $_POST['name'];

			$query = "INSERT INTO brands (image, name, bg) VALUES ('$image', '$name', '$bg')";

			// send data to brands table

			if (mysqli_query($db, $query)) 
			{	
				// sql database of a brand cars

				$create_brands_tabels = "CREATE TABLE $name (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			     bg VARCHAR(100) NOT NULL,
				 carname VARCHAR(50) NOT NULL,
				 rentalprice Float(50) NOT NULL,
				 car_text VARCHAR(3000) NOT NULL,
				 sub_bg VARCHAR(100) NOT NULL,
				 formal_img VARCHAR(100) NOT NULL,
				 img1 VARCHAR(100) NOT NULL,
				 img2 VARCHAR(100) NOT NULL,
				 img3 VARCHAR(100) NOT NULL,
				 img4 VARCHAR(100) NOT NULL,
				 img5 VARCHAR(100) NOT NULL,
				 img6 VARCHAR(100) NOT NULL,
				 img7 VARCHAR(100) NOT NULL,
				 img8 VARCHAR(100) NOT NULL,
				 img9 VARCHAR(100) NOT NULL,
				 img10 VARCHAR(100) NOT NULL,
				 img11 VARCHAR(100) NOT NULL,
				 img12 VARCHAR(100) NOT NULL
				)";

				// create table 

				mysqli_query($db, $create_brands_tabels);

				// move imgs to folder
				
				move_uploaded_file($_FILES['image']['tmp_name'], $target) && move_uploaded_file($_FILES['background']['tmp_name'], $target2);

				// create a page for each brand

				$file = fopen("brands/".$name."page.php", "w");

				// text to be written in php file 
				
				$txt = "<?php $"."thisbrandname = '".$name."'; include('master.php');?>";

				// add masterpage to php file

				fwrite($file, $txt);

				$successful_add = $name." added successfully";
				echo "<script type='text/javascript'> alert('$successful_add'); </script>";
            	include('options/ignore_access.php');
			}
		}
		
	}

	// retrive records

	$results = mysqli_query($db, "SELECT * FROM brands ORDER BY name ASC");
?>