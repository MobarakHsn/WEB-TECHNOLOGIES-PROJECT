<?php
session_start(); 

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
    <title>Student/Financial</title>
    <td> <a href="../view/student_homepage_view.php">Home</a></td>
    <?php echo "<h2>Welcome ".$_SESSION["username"]."</h2>";?>
<h5> <a href="../control/student_viewprofile_control.php"> View Profile</a></h5>
<h4><a href="../view/student_settings_view.php">Settings </a></h4>
</head>
</html>
<?php 
include "../model/student_db_model.php";
$table="students";
$course="";
$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$username=$_SESSION["username"];
$var="Financial Status:"; 
$var2="Due Fees: ";
$sql=$connectionstring->query("SELECT * FROM students WHERE username='$username'");
echo "<h4><u>".$var."</u></h4>";

if($sql->num_rows > 0)
{
  
    $row=$sql->fetch_assoc();
    echo "<h4>".$var2.$row["due_fees"]."</h4>";   
}

$connectionstring->close();
?>
<html>

    
    
   <tr> <td><br><a href="../control/student_logout_control.php">Logout</a></td></tr>

</html>



