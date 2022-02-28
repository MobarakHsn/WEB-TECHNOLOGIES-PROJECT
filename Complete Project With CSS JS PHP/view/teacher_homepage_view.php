<?php
session_start();
include "../control/teacher_homepage_control.php";
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
 <table><tr><td>Select a step</td> </tr>
 <tr>
 <td>
    <select id="step" name="step">
    <option value="1.Give Result ">1. Assign Result </option>
    <option value="2.Accept/Reject Drop Request">2. Accept/Reject Drop Request</option>
    <option value="3.Apply for leave application">3. Apply for leave application</option>
    <option value="4.Post Assignment to student">4. Post Assignment to student</option>
    </select>
 </td>
</tr>

<tr>
    <td>
    <input type="submit" value="Choose">
    </td>
</tr>
</form>
</body>
</html>