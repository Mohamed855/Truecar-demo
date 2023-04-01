<?php

	// initialize variables

	$id = 0;

	// conect to database

	$db = mysqli_connect('localhost', 'root', '', 'truecar(web)');

	// add new 

	if(isset($_POST['save']))
	{
		// get combobox selected brand

		$seleted_brand = $_POST['select_text'];

		// feach brands names

		$brand_table = mysqli_query($db, "SELECT * FROM brands ORDER BY name ASC");

		while ($row_brands = mysqli_fetch_array($brand_table)) 
		{
			$brand_name = $row_brands['name'];

			$carname = $_POST['carname'];

			$check_exist = mysqli_query($db,"SELECT carname from $brand_name where carname='$carname'");

			if (mysqli_num_rows($check_exist)>=1) 
			{
				$already_exist = $seleted_brand." ".$carname." already exists";
				echo "<script type='text/javascript'> alert('$already_exist'); </script>";
            	include('options/ignore_access.php');
			}
			else
			{

				if ($brand_name == $seleted_brand) 
				{
					// create a folder

					mkdir("models/".$brand_name."-".$_POST['carname']);

					// the path to store uploaded img

					$target_bg = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['bg']['name']);
					$target_sub_bg = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['sub_bg']['name']);
					$target_formal_img = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['formal_img']['name']);
					$target_img1 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img1']['name']);
					$target_img2 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img2']['name']);
					$target_img3 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img3']['name']);
					$target_img4 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img4']['name']);
					$target_img5 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img5']['name']);
					$target_img6 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img6']['name']);
					$target_img7 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img7']['name']);
					$target_img8 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img8']['name']);
					$target_img9 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img9']['name']);
					$target_img10 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img10']['name']);
					$target_img11 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img11']['name']);
					$target_img12 = "models/".$brand_name."-".$_POST['carname']."/".basename($_FILES['img12']['name']);

					// get data entered into form

					$bg = $_FILES['bg']['name'];
					$carname = $_POST['carname'];
					$rentalprice = $_POST['rentalprice'];
					$car_text = $_POST['car_text'];
					$sub_bg = $_FILES['sub_bg']['name'];
					$formal_img = $_FILES['formal_img']['name'];
					$img1 = $_FILES['img1']['name'];
					$img2 = $_FILES['img2']['name'];
					$img3 = $_FILES['img3']['name'];
					$img4 = $_FILES['img4']['name'];
					$img5 = $_FILES['img5']['name'];
					$img6 = $_FILES['img6']['name'];
					$img7 = $_FILES['img7']['name'];
					$img8 = $_FILES['img8']['name'];
					$img9 = $_FILES['img9']['name'];
					$img10 = $_FILES['img10']['name'];
					$img11 = $_FILES['img11']['name'];
					$img12 = $_FILES['img12']['name'];

					// insert data into database

					$query = "INSERT INTO $brand_name (bg, carname, rentalprice, car_text, sub_bg, formal_img, img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, img11, img12) VALUES ('$bg', '$carname', '$rentalprice', '$car_text', '$sub_bg', '$formal_img', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$img7', '$img8', '$img9', '$img10', '$img11', '$img12')";

					

					// if images moved to location

					if (mysqli_query($db, $query))
					{

						move_uploaded_file($_FILES['bg']['tmp_name'], $target_bg);
						move_uploaded_file($_FILES['sub_bg']['tmp_name'], $target_sub_bg);
						move_uploaded_file($_FILES['formal_img']['tmp_name'], $target_formal_img);
						move_uploaded_file($_FILES['img1']['tmp_name'], $target_img1);
						move_uploaded_file($_FILES['img2']['tmp_name'], $target_img2);
						move_uploaded_file($_FILES['img3']['tmp_name'], $target_img3);
						move_uploaded_file($_FILES['img4']['tmp_name'], $target_img4);
						move_uploaded_file($_FILES['img5']['tmp_name'], $target_img5);
						move_uploaded_file($_FILES['img6']['tmp_name'], $target_img6);
						move_uploaded_file($_FILES['img7']['tmp_name'], $target_img7);
						move_uploaded_file($_FILES['img8']['tmp_name'], $target_img8);
						move_uploaded_file($_FILES['img9']['tmp_name'], $target_img9);
						move_uploaded_file($_FILES['img10']['tmp_name'], $target_img10);
						move_uploaded_file($_FILES['img11']['tmp_name'], $target_img11);
						move_uploaded_file($_FILES['img12']['tmp_name'], $target_img12);
						// create a page for each model

						$file = fopen("models/".$brand_name."-".$_POST['carname'].".php", "w");

						// text to be written in php file 
						
						$txt = "<?php $"."thisbrandname = '".$seleted_brand."'; $"."thismodelname = '".$carname."'; include('master.php');?>";

						// add masterpage to php file

						fwrite($file, $txt);

						// reload same page

						$successful_add = $seleted_brand." ".$carname." added successfully";
						echo "<script type='text/javascript'> alert('$successful_add'); </script>";
            			include('options/ignore_access.php');

					}

				}

			}
		}
	}
	
	// retrive records

	$results = mysqli_query($db, "SELECT * FROM brands ORDER BY name ASC");
?>