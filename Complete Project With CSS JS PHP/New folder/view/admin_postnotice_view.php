<?php
session_start();
include "admin_header_view.php";
include "../control/admin_postnotice_control.php";
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
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>
                            Enter notice for <?php echo  $_SESSION["notice"];?>s:
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="notice_text" rows="10" cols="50"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" class="submitBtn" name="post" value="post" id="post">
                        </td>
                    </tr>
                </table> 
                <?php echo $validatenotice;?>                    
            </form>
            <script src="../js/jquery.min.js"></script>
            <script src="../js/admin/admin_js.js"></script>
        </body>
</html>
<?php include "admin_footer_view.php"; ?>