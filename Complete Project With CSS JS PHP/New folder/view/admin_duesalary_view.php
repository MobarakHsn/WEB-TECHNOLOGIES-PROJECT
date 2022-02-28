<?php
include "admin_header_view.php";
session_start();
include "../control/admin_duesalary_control.php";
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
            XYZ University Portal | Admin | Dues Salary
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
                        Show teachers with salary greater than or equal:
                    </td>
                    <td>
                        <input type="number" name="salary">
                    </td>
                    <td>
                        <input type="submit" name="show_salary" class="submitBtn" value="Show">
                    </td>
                </tr>
            </table>
            <?php if($flag===1 && $validatesalary!="") admin_duesalary($validatesalary); ?>
        </form>
    </body>
</html>
<?php include "admin_footer_view.php"; ?>