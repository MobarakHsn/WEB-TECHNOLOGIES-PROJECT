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
            XYZ University Portal | Admin | Notice
        </title>
        <body>
            <strong><a href="admin_homepage_view.php">Home</a> | <a href="../control/admin_logout_control.php">Logout</a></strong> 
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
                            <input type="submit" name="post" value="post">
                        </td>
                    </tr>
                </table> 
                <?php echo $validatenotice;?>                       
            </form>
        </body>
    </head>
</html>
<?php include "admin_footer_view.php"; ?>