<?php

session_start();

if(isset($_SESSION['username'])==false)
{
    include('options/ignore_access.php');
}

?>

<!DOCTYPE html>
<html>
    <head>

        <title>TRUEcar -Profile-</title>

        <link rel="icon" type="image/png" href="images/truecar-sl.jpg">
        <link rel="stylesheet" type="text/css" href="styleCss/login.css">

    </head>

    <bady>

        <div class="box">

            <img src="images/TRUECAR.png" width="300px" height="113px">

            <br><br>

        	<label>User Name : <?php echo $_SESSION['username']; ?></label>

        </div>

    </bady>
</html>
