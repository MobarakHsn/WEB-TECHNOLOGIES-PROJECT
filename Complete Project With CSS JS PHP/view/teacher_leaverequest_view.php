<?php
session_start();
include "../control/teacher_leaverequest_control.php";
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
            Teacher | Leave request
        </title>
 <h1> XYZ University Portal </h1><br>
 <h3>Welcome   <a href="../control/teacher_viewprofile_control.php"><?php  echo  $_SESSION["username"]; ?> </a> </h3><br>

 <a href="../control/teacher_logout_control.php">Logout</a><br><br><br>




 Do you want to apply for leave application?
 <br><br>
 <form action="" method="POST">

 
<tr>
    <td>
    <input type="submit" value="Yes">
    </td>
    <td>
    <?php echo $msg; ?>
    </td>
   
</tr>
</form>
</body>
</html>