<?php

//database connection

$db=mysqli_connect("localhost","root","","truecar(web)");

$user = $_SESSION['username'];

$results = mysqli_query($db, "SELECT * FROM users WHERE username='$user'");

if ($row = mysqli_fetch_array($results)) 
{
	// initialize variables

	$username = $row['username'];
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
	
	$Uname = $_POST['username'];
	$Upassword = $_POST['password'];

	$usernameCheck = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($usernameCheck)>=1)
    {
        $usernameAlreadyTacken = "Username already exist";
        echo "<script type='text/javascript'> alert('$usernameAlreadyTacken'); </script>";
        include('options/ignore_access.php');
    }
    else 
    {

		if (md5($Upassword)==$password) {
			
			$query_update = mysqli_query($db, "UPDATE users SET username='$Uname' WHERE id=$id");

			if ($query_update)
			{
				$_SESSION['username'] = $Uname;

				$successful = "Username changed successfully";
		        echo "<script type='text/javascript'> alert('$successful'); </script>";
		        include('options/ignore_access.php');
			}
		}
		else
	    {
	        $wrongPassword = "Check password and try again later";
	        echo "<script type='text/javascript'> alert('$wrongPassword'); </script>";
	        include('options/ignore_access.php');
	    }
	}
}

?>