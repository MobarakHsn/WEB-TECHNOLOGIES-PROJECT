<?php
session_start();
include "../control/student_dropapplication_control.php";


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
        else 
        {
            header("Location:teacher_homepage_view.php");
        }

    }
    else if($_SESSION["user_type"]=="student")
    {
		
    }
    else
    {

    }
}


?>
<html>
<head>
    <title>Student/Drop a Course</title>
    <td> <a href="../view/student_homepage_view.php">Home</a></td>
    <?php echo "<h2>Welcome ".$_SESSION["username"]."</h2>";?>
<h5> <a href="../control/student_viewprofile_control.php"> View Profile</a></h5>
<h4><a href="../view/student_settings_view.php">Settings </a></h4>
</head>
</html>
<html>
<head>
    <title>Student</title>
</head>
<form action="" method="POST">
<body>
 
 


 
 <table>
 <tr>
 <td>Select a subject</td>
 <td>
    <select id="courselist" name="courselist">
    <option value="Algorithms">Algorithms</option>
    <option value="Data_Structure">Data_Structure</option>
    <option value="Compiler_Design">Compiler_Design</option>
    <option value="Web_Technologies">Web_Technologies</option>
    <option value="DC">DC</option>
    <option value="AC">AC</option>
    <option value="Accounting">Accounting</option>
    <option value="Economics">Economics</option>
    </select>
 </td>
 <td> <?php
        echo  $msg2 ;
   ?> 
   </td>
</tr>


    <td>
    <input type="submit" value="Drop">
    </td>
</tr>
<html>

    
    
   <tr> <td><br><a href="../control/student_logout_control.php">Logout</a></td></tr>

</html>
 
</form>
</body>
</html>