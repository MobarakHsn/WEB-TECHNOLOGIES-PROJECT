<?php
session_start();
include "../control/teacher_studentresult_control.php";
if(!isset($_SESSION["username"]) || !isset($_SESSION["password"]))
{
    header("Location:login_view.php");
}

if(isset($_SESSION["username"])  && isset($_SESSION["password"]))
{
    if($_SESSION["user_type"]=='admin')
    {
        header("Location:admin_homepage_view.php");
    }
    else if($_SESSION["user_type"]=='teacher')
    {
      
        if($_SESSION["designation"]=="Director")
        {
            header("Location:teacher_director_homepage_view.php");
        }
       

    }
    else if($_SESSION["user_type"]=="student")
    {
		header("Location:student_homepage_view.php");
    }
    else
    {

    }
}


?>
<html>
    <head><link rel="stylesheet" type="text/css" href="../css/admin/admin_css.css"></head>
    <body>
        <title>
            Teacher | Student Result
        </title>
        <h1> XYZ University Portal </h1><br>
        <h3>Welcome   <a href="../control/teacher_viewprofile_control.php"><?php  echo  $_SESSION["username"]; ?> </a> </h3><br>

        <a href="../control/teacher_logout_control.php">Logout</a><br><br><br>


        <form action="" method="POST">
            <table>
                <tr>
                    <td> Student Username:</td>
                    <td><input type="text" name="username1"></td>
                    <td><?php echo  $vusername1; ?><br><br></td>
                </tr>
                <tr>
                    <td>Written:</td>
                    <td><input type="text" name="written"></td>
                    <td><?php echo  $vwritten; ?><br><br></td>
                </tr>
                <tr>
                    <td>Quiz:</td>
                    <td><input type="text" name="quiz"></td>
                    <td><?php echo  $vquiz; ?><br><br></td>
                </tr>
                <tr>
                    <td>Attendence and performance:</td>
                    <td><input type="text" name="ap"></td>
                    <td><?php echo  $vap; ?><br><br></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Assign Result">
                    </td>
                    <td><?php echo  $mymsg; ?><br><br></td>
                </tr>
            </table>
        </form>
    </body>
</html>