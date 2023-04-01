<?php

session_start();

if(isset($_SESSION['username'])==false)
{
    include('options/ignore_access.php');
}

include('options/update.php');

?>

<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="styleCss/edit.css">
        <title>TRUEcar -Edit username-</title>
        
    </head>

    <bady>

        <form class="box" action="edit.php" method="POST">

            <!--form title-->

            <p class="title">Edit username</p>

            <!--form content-->

            <input type="text" name="username" placeholder="Username" maxlength="20" value="<?php echo $_SESSION['username'];?>" required>

            <input type="password" name="password" placeholder="Password" minlength="8" maxlength="22" value="" required>

            <button type="submit" name="save" class="button">Save</button>

            <!--update password link-->

            <a href="update_pass.php">Change your password !</a>

        </form>

    </bady>
</html>
