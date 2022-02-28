<?php
session_start();
include "../control/teacher_director_assign_control.php";
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
            Director | Assign
        </title>
 <h1> XYZ University Portal </h1><br>
 <h3>Welcome   <a href="../control/teacher_viewprofile_control.php"><?php  echo  $_SESSION["username"]; ?> </a> </h3><br>

 <a href="../control/teacher_logout_control.php">Logout</a><br><br><br>


 <form action="" method="POST">
 <table>
 <tr>
 <td>Select a subject</td>
 <td>
    <select id="step" name="step">
    <option value="1.Algorithms">1.Algorithms</option>
    <option value="2.Data Structure">2.Data Structure</option>
    <option value="3.Compiler Design">3.Compiler Design</option>
    <option value="4.Web Technologies">4.Web Technologies</option>
    <option value="5.DC">5.DC</option>
    <option value="6.AC">6.AC</option>
    <option value="7.Accounting">7.Accounting</option>
    <option value="8.Economics">8.Economics</option>
    </select>
 </td>
</tr>
<tr>
<td>Teacher username:</td>
        <td><input type="text" name="username"></td>
        <td><?php echo  $vusername; ?><br><br></td>
        <td><?php echo  $vmsg; ?><br><br></td>
     
    
</tr>

<tr>
    <td>
    <input type="submit" value="Assign">
    </td>
</tr>
</form>
</body>
</html>