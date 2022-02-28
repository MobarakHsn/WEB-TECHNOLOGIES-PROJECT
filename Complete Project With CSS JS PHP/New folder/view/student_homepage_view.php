<?php 

session_start(); 
include "../control/student_homepage_control.php";


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
<form action="" method="GET">
<body>
 
 
<?php echo "<h2>Welcome ".$_SESSION["username"]."</h2>";?>
<h3> <a href="../control/student_viewprofile_control.php">View Profile</a></h3>
<h4><a href="../view/student_settings_view.php">Settings </a></h4>
 

 
<tr>

<td>

  <select id="option" name="menuoption">

    <option value="selectcourse">Select a Course </option>
    <option value="dropcourse">Drop a Course</option>
    <option value="submitassignment">Submit Assignment</option>
    <option value="returnbook">Return a Book</option>
    <option value="mycourses">Courses and Results</option>
    <option value="registeredcourses">Registered Courses</option>
    <option value="financial">Financial</option>
    <option value="offeredcourses">Offered Courses</option>
    
  </select>
</td>
</tr>
<tr>
                        <td>
                            <input type="submit" value="proceed">
                        </td>
                    </tr>

 
 
                    
 
 
 
 
 
 
                    <html>

    
                   
<tr> <td><br><br><a href="../control/student_logout_control.php">Logout</a></td></tr>

</html>
 

</form>
</body>
</html>







 

      
  
