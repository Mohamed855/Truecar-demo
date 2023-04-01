<?php

//database connection

$db=mysqli_connect("localhost","root","","truecar(web)");

//errors

if(!$db)
{
  echo "error".mysqli_error();
}

if(isset($_POST['signup']))
{
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $confirmpass=mysqli_real_escape_string($db,$_POST['confirmpass']);

    $usernameCheck = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($usernameCheck)>=1)
    {
        $usernameAlreadyTacken = "Username already exist";
        echo "<script type='text/javascript'> alert('$usernameAlreadyTacken'); </script>";
        include('options/ignore_access.php');
    }
    else 
    {
        if($password==$confirmpass)
        {
            $password=md5($password);
            $sql="INSERT INTO users(username,password) VALUES('$username','$password')";

            if(mysqli_query($db,$sql))
            {
                $_SESSION['username']=$username;
                include('options/ignore_access.php');
            }

            //redirct to home page

            header('location:home.php');
        }

        else
        {
            $confirmPassword = "Please confirm your password";
            echo "<script type='text/javascript'> alert('$confirmPassword'); </script>";
            include('options/ignore_access.php');
        }
    }
}
?>