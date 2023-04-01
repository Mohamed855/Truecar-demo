<?php

session_start();

if(isset($_SESSION['username'])) 
{
    include('options/ignore_access.php');
}

include('options/signup.php');

?>

<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="styleCss/login.css">
        <link rel="icon" type="image/png" href="images/truecar-sl.jpg">
        
        <title>TRUEcar -Signup-</title>
        
    </head>

    <bady>

        <form class="box" action="signup.php" method="POST">

            <!--form logo-->
            <img src="images/TRUECAR.png" width="300px" height="113px">

            <!--form content-->
            <input type="text" name="username" placeholder="username" maxlength="20" required >
            <input type="password"name="password" placeholder="Password" maxlength="22" minlength="8" required>
            <input type="password" name="confirmpass" placeholder="Confirm password" maxlength="22" minlength="8" required>
            <input class="button" type="submit" value="Sign up" name="signup" >

            <!--login page link-->
            <a href="login.php">Already have an account</a>

        </form>

    </bady>
</html>
