<?php
include "admin_header_view.php";
include "../control/admin_viewprofile_control.php";
if(!isset($_SESSION["user_type"]))
{
    header("Location:login_view.php");
}
else if(!isset($_SESSION["username"]) || !isset($_SESSION["password"]))
{
    header("Location:login_view.php");
}
else
{
    if($_SESSION["user_type"]=="teacher")
    {

    }
    else if($_SESSION["user_type"]=="student")
    {
        
    }
    else if($_SESSION["user_type"]=="librarian")
    {

    }
}
?>



<html>
    <head>
        <title>
            XYZ University Portal | Admin | Profile
        </title>
        <strong><a href="admin_homepage_view.php">Home</a> | <a href="../control/admin_logout_control.php">Logout</a></strong> 
        <hr>
        <body>
            <?php admin_showprofile();?>
        </body>
    </head>
</html>
<?php include "admin_footer_view.php"; ?>
