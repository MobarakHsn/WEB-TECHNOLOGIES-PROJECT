<?php
session_start();
include "../control/teacher_postassignment_control.php";
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
 <body>
 <title>
            Teacher | Home
        </title>
 <h1> XYZ University Portal </h1><br>
 <h3>Welcome   <a href="../control/teacher_viewprofile_control.php"><?php  echo  $_SESSION["username"]; ?> </a> </h3><br>

 <a href="../control/teacher_logout_control.php">Logout</a><br><br><br>


 <form action="" method="POST">
 <table>
 <tr>
 <td>
 <textarea name="assignment" rows="20" cols="60"></textarea>
 </td>
 <td> <?php echo $notice; ?> </td>
</tr>

<tr>
    <td>
    <input type="submit" value="post">
    </td>
</tr>
</form>
</body>
</html>