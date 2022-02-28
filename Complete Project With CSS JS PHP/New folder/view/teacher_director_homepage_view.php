<?php
session_start();
include "../control/teacher_director_homepage_control.php";

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
      
        
        if($_SESSION["designation"]=="Other")
        {
            header("Location:teacher_homepage_view.php");
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
            Director | Home
        </title>
 <h1> XYZ University Portal </h1><br>
 <h3>Welcome   <a href="../control/teacher_viewprofile_control.php"><?php  echo  $_SESSION["username"]; ?> </a> </h3><br>

 <a href="../control/teacher_logout_control.php">Logout</a><br><br><br>


 <form action="" method="POST">
 <table><tr><td>Select a step</td> </tr>
 <tr>
 <td>
    <select id="step" name="step">
    <option value="1.Accept/Reject leave request">1. Accept/Reject leave request</option>
    <option value="2.Assign subject to teacher">2. Assign subject to teacher</option>
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