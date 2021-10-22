<?php
session_start();
include "admin_header_view.php";
include "../control/admin_pendingteachers_control.php";
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
            XYZ University Portal | Admin
        </title>
        <strong><a href="admin_homepage_view.php">Home</a> | <a href="../control/admin_logout_control.php">Logout</a></strong> 
        <hr>
        <body>
            <table>
                <tr>
                    <td>
                        <h3>Pending Teachers:</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php admin_pendingteachers();?>
                    </td>
                </tr>
            </table>
            <br><br><br>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>
                            Enter a id from the above table to accpet a pending request:
                        </td>
                        <td>
                            <input type="text" name="acceptid">
                        </td>
                        <td>
                            <input type="submit" name="accept" value="Accept">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $validateaccept;?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Enter a id from the above table to reject a pending request:
                        </td>
                        <td>
                            <input type="text" name="rejectid">
                        </td>
                        <td>
                            <input type="submit" name="reject" value="Reject">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $validatereject;?>
                        </td>
                    </tr>
                </table>
            </form>
        </body>
    </head>
</html>