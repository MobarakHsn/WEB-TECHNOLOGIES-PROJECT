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
    <title>Student/View Profile</title>
    <td> <a href="../view/student_homepage_view.php">Home</a></td>
   

</head>
</html>
<?php
include "../model/student_db_model.php";
$table="students";

$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$_SESSION["username"]."' AND password='".$_SESSION["password"]."'");
if($sql->num_rows > 0)
{
 
    $row=$sql->fetch_assoc();
     echo "<h2>".$_SESSION["username"]." 's Profile</h2>";
    echo "<tr><td>Student Id :<tr> <td>".$row["id"]."</td></tr><br>";
    echo "<tr><td>Name :<tr> <td>".$row["first_name"]." ".$row["last_name"]."</td></tr><br>";
    echo "<tr><td>Gender :<tr> <td>".$row["gender"]."</td></tr><br>";
    echo "<tr><td>Access Status :<tr> <td>".$row["access_status"]."</td></tr><br>";
    echo "<tr><td>Username :<tr> <td>".$row["username"]."</td></tr><br>";
    echo "<tr><td>Verified Email :<tr> <td>".$row["email"]."</td></tr><br>";
    echo "<tr><td>Verified Contact :<tr> <td>".$row["phone"]."</td></tr><br>";
    echo "<tr><td>Date Of Birth :<tr> <td>".$row["dob"]."</td></tr><br>";
    echo "<tr><td>Due Fees :<tr> <td>".$row["due_fees"]."</td></tr><br>";
    echo "<tr><td>Department :<tr> <td>".$row["department"]."</td></tr><br>";
    echo "<tr><td>Program :<tr> <td>".$row["program"]."</td></tr><br>";
    
}
$connectionstring->close();
?>
<html>

    
    
<tr> <td><br><a href="../control/student_logout_control.php">Logout</a></td></yr>

</html>