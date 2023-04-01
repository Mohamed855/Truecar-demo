<?php

session_start();

if(isset($_SESSION['username'])) 
{
    include('options/ignore_access.php');
}

include('options/login.php');

?>

<!DOCTYPE html>
<html>
    <head>

        <title>TRUEcar -Login-</title>

        <link rel="icon" type="image/png" href="images/truecar-sl.jpg">
        <link rel="stylesheet" type="text/css" href="styleCss/login.css">

    </head>

    <bady>

        <form class="box login" action="login.php" method="POST">

        	<!--form logo-->
            <img src="images/TRUECAR.png" width="300px" height="113px">

            <!--form content-->
            <input type="text" placeholder="Username" name="username" maxlength="20" required>
            <input type="password" placeholder="Password" name="password" maxlength="22" required>
            <input class="button" type="submit" value="Login" name="login">

            <!--registeration link-->
            <a href="signup.php">Create new account!</a>

        </form>

    </bady>
</html>
