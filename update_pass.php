<?php

session_start();

if(isset($_SESSION['username'])==false)
{
    include('options/ignore_access.php');
}

include('options/update_pass.php');

?>

<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="styleCss/edit.css">
        <title>TRUEcar -Edit password-</title>
        
    </head>

    <bady>

        <form class="box" action="update_pass.php" method="POST">

            <!--form title-->

            <p class="title">Edit Password</p>

            <!--form content-->
            <input type="password" style="display: none;">

            <input type="password" name="old_password" placeholder="Enter old password" maxlength="22" value="" required>

            <input type="password" name="new_password" placeholder="Enter new password" minlength="8" maxlength="22" value="" required>

            <input type="password" name="confirm_new_password" placeholder="Confirm new password" maxlength="22" value="" required>

            <button type="submit" name="save" class="button">Save</button>

        </form>

    </bady>
</html>
