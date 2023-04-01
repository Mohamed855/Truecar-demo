<?php

$db = mysqli_connect('localhost', 'root', '', 'truecar(web)');

// delete brand

	if (isset($_GET['del_b'])) 
	{
		$id = $_GET['del_b'];

		// feach data from database

		$rec = mysqli_query($db, "SELECT name FROM brands WHERE id=$id");
		$record = mysqli_fetch_array($rec);

		$name = $record['name'];

		// delete models files and folders

		$rec_models_names = mysqli_query($db, "SELECT carname FROM $name");

		while($row=mysqli_fetch_array($rec_models_names)) 
		{
			// delete car folder

			array_map('unlink', glob("../models/".$name."-".$row['carname']."/*.*"));

			rmdir("../models/".$name."-".$row['carname']);

			// files path

			$files = "../models/".$name."-".$row['carname'].".php";

			// delete files

			unlink($files);
		}
		
		// file path

		$file = "../brands/".$name."page.php";

		// delete file

		unlink($file);

		// drop table after delete brand

		mysqli_query($db, "Drop TABLE ".$name);

		// delete col query from brand table in database

		mysqli_query($db, "DELETE FROM brands WHERE id=$id");

		// reload same page

		include('ignore_access.php');
	}

?>