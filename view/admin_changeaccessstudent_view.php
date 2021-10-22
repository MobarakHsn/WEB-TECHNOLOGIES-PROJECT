<?php
include "admin_header_view.php";
session_start();
include "../control/admin_changeaccessstudent_control.php";
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
            XYZ University Portal | Admin | Change access
        </title>
        <strong><a href="admin_homepage_view.php">Home</a> | <a href="../control/admin_logout_control.php">Logout</a></strong> 
        <hr>
        <body>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>
                            <h3>Active Students:</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php admin_showstudents("active");?>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            Enter a id from the above table to block a student:
                        </td>
                        <td>
                            <input type="text" name="blockid">
                        </td>
                        <td>
                            <input type="submit" name="block" value="Block Access">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $validateblock; ?>
                        </td>
                    </tr>
                </table>
                <br><br><br>
                <table>
                    <tr>
                        <td>
                            <h3>Blocked Students:</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php admin_showstudents("blocked");?>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            Enter a id from the above table to active a student:
                        </td>
                        <td>
                            <input type="text" name="activeid">
                        </td>
                        <td>
                            <input type="submit" name="active" value="Active Access">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $validateactive; ?>
                        </td>
                    </tr>
                </table>
            </form>
        </body>
    </head>
</html>
<?php include "admin_footer_view.php"; ?>