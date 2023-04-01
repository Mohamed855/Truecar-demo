<?php

//database connection

$db=mysqli_connect("localhost","root","","truecar(web)");

$user = $_SESSION['username'];

$results = mysqli_query($db, "SELECT * FROM users WHERE username='$user'");

if ($row = mysqli_fetch_array($results)) 
{
	// initialize variables

	$password = $row['password'];
	$id = $row['id'];	

}

//errors

if(!$db)
{
  echo "error".mysqli_error();
}

if (isset($_POST['save'])) 
{
	// get all the submitted data from the form
	
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$confirm_new_password = $_POST['confirm_new_password'];

	if (md5($old_password)==$password) 
	{
		if($new_password==$confirm_new_password)
		{
			$new_password=md5($new_password);
			$query_update = mysqli_query($db, "UPDATE users SET password='$new_password' WHERE id=$id");

			if ($query_update)
			{
				$successful = "Password changed successfully";
		        echo "<script type='text/javascript'> alert('$successful'); </script>";
		        include('options/ignore_access.php');
			}
		}
		else
	    {
	        $confirmPassword = "Please confirm new password";
	        echo "<script type='text/javascript'> alert('$confirmPassword'); </script>";
	        include('options/ignore_access.php');
	    }
	}
	else
    {
        $wrongPassword = "Please check password and try again later";
        echo "<script type='text/javascript'> alert('$wrongPassword'); </script>";
        include('options/ignore_access.php');
    }
}

?>