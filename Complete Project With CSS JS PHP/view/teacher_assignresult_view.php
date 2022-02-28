<?php
session_start();
include "../control/teacher_assignresult_control.php";
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
            Teacher | Assign Result
        </title>
 <h1> XYZ University Portal </h1><br>
 <h3>Welcome   <a href="../control/teacher_viewprofile_control.php"><?php  echo  $_SESSION["username"]; ?> </a> </h3><br>

 <a href="../control/teacher_logout_control.php">Logout</a><br><br><br>


 <form action="" method="POST">
 <table>
 <tr>
 <td>Select a subject which you want to assign a result</td>
 <td>
    <select id="step" name="step">
    <option value="Algorithms">1.Algorithms</option>
    <option value="Data_Structure">2.Data Structure</option>
    <option value="Compiler_Design">3.Compiler Design</option>
    <option value="Web_Technologies">4.Web Technologies</option>
    <option value="DC">5.DC</option>
    <option value="AC">6.AC</option>
    <option value="Accounting">7.Accounting</option>
    <option value="Economics">8.Economics</option>
    </select>
 </td>
 <td> <?php echo $msg; ?> </td>
</tr>


<tr>
    <td>
    <input type="submit" value="Go">
    </td>
</tr>
</form>
</body>
</html>