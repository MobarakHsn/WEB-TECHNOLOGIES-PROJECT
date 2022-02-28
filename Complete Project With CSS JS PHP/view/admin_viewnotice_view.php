<?php
session_start();
include "admin_header_view.php";
include "../control/admin_viewnotice_control.php";
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
        header("Location:teacher_homepage_view.php");
    }
    else if($_SESSION["user_type"]=="student")
    {
        header("Location:student_homepage_view.php");
    }
    else if($_SESSION["user_type"]=="librarian")
    {

    }
}
?>
<html>
    <head>
        <title>
            XYZ University Portal | Admin | Notice
        </title>
        <link rel="stylesheet" type="text/css" href="../css/admin/admin_css.css">
    </head>
    <body>
        <div class="sticky">
            <div class="topnav">
                <a href="admin_homepage_view.php">Home</a>
                <a href="../control/admin_logout_control.php" class="logoutcolor">Logout</a>
            </div>
        </div>
        <hr>
        <h3>Notice for admins:<h3>
        <textarea name="notice_text" rows="10" cols="50" ><?php echo $msg; ?></textarea>
        <?php //shownotice();?>
    </body>
</html>
<?php include "admin_footer_view.php"; ?>