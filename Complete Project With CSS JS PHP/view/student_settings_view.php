<?php

include "../control/student_settings_control.php";

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
<!DOCTYPE html>
<head>
    <title>Student/Settings</title>
    <td> <a href="../view/student_homepage_view.php">Home</a></td>
    <h5> <a href="../control/student_viewprofile_control.php"> View Profile</a></h5>
</head>
<body>
 <table>
 
 <form action="" method="post">
   
  
    <h1>Change Password</h2><hr/>

    <tr>
        <td>Current Password</td></tr>
        <td><input type="password" name="cpass"></td>
       
       
       

<tr>  
    <tr>
        <td>New Password</td></tr>
        <td><input type="password" name="npass"></td>
      
       
       

<tr> 
    
<tr>
        <td>Confirm New Password</td></tr>
        <td><input type="password" name="conpass"></td>
      
   
       

<tr>
     <tr><td><?php echo  $msg1; ?><br></td></tr>
<td>
                            <input type="submit" value="Change Password">
                         
                           
</form>
</table>
</body>
<html>

    
    
<tr> <td><br><a href="../control/student_logout_control.php">Logout</a></td></yr>

</html>