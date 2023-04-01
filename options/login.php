<?php

$db=mysqli_connect("localhost","root","","truecar(web)");

if(!$db)
{
    echo "error".mysqli_error();
}

if(isset($_POST['login']))
{
    $UName=$_POST["username"];
    $Upass=$_POST["password"];
    $query="select * from users where username='$UName'";
    $result=mysqli_query($db,$query);

    if($row=mysqli_fetch_assoc($result))
    {
        $db_password=$row['password'];

        if(md5($Upass)==$db_password)
        {
            $_SESSION['username'] = $UName;
            $_SESSION['password'] = $Upass;
            header("location:home.php");
        }

        else
        {
            $incorrectPassword = "Please check your password and try again";
            echo "<script type='text/javascript'> alert('$incorrectPassword'); </script>";
            include('options/ignore_access.php');
        }
    }

    else
    {
        $usernameNotExsist = "User name you entered not exsist";
        echo "<script type='text/javascript'> alert('$usernameNotExsist'); </script>";
        include('options/ignore_access.php');
    }
}
?>