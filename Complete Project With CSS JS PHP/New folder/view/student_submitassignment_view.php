<?php 

session_start(); 
include "../control/student_submitassignment_control.php";


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
    <title>Student/Home</title>
</head>
<form action="" method="POST">
<body>
 
 
<?php echo "<h2>Welcome ".$_SESSION["username"]."</h2>";?>
<h3> <a href="../control/student_viewprofile_control.php">View Profile</a></h3>
<h4><a href="../view/student_settings_view.php">Settings </a></h4>
 

 
<tr>

<td>
 <textarea name="myassignment" rows="10" cols="60"></textarea>
 </td>
 <td> <?php echo $validatemsg; ?> </td>
</tr><br><br>
<tr>
<td> <input type="submit" value="Submit">
</td></tr>

 
 
                    
 
 
 
 
 
 
                    <html>

    
                   
<tr> <td><br><br><a href="../control/student_logout_control.php">Logout</a></td></tr>

</html>
 

</form>
</body>
</html>