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
    <title>Student/Courses and Results</title>
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
$var="Courses and Results:";
echo "<h4><u>".$var."</u></h4>";
echo "<table><tr><th>|Course|</th><th>|written|</th><th>|quiz|</th><th>|attendence_performance|</th><th>|total|</th><th>|grade|</th></tr>";
$sql=$connectionstring->query("SELECT * FROM ac WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="AC";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td><td>".$row["written"]."</td><td>".$row["quiz"]."</td><td>".$row["attendence_performance"]."</td><td>".$row["total"]."</td><td>".$row["grade"]."</td></tr>";
    
}
$sql=$connectionstring->query("SELECT * FROM accounting WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Accounting";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td><td>".$row["written"]."</td><td>".$row["quiz"]."</td><td>".$row["attendence_performance"]."</td><td>".$row["total"]."</td><td>".$row["grade"]."</td></tr>";
    
}
$sql=$connectionstring->query("SELECT * FROM algorithms WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Algorithms";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td><td>".$row["written"]."</td><td>".$row["quiz"]."</td><td>".$row["attendence_performance"]."</td><td>".$row["total"]."</td><td>".$row["grade"]."</td></tr>";
    
}
$sql=$connectionstring->query("SELECT * FROM compiler_design WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Compiler Design";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td><td>".$row["written"]."</td><td>".$row["quiz"]."</td><td>".$row["attendence_performance"]."</td><td>".$row["total"]."</td><td>".$row["grade"]."</td></tr>";
}
$sql=$connectionstring->query("SELECT * FROM data_structure WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Data Structure";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td><td>".$row["written"]."</td><td>".$row["quiz"]."</td><td>".$row["attendence_performance"]."</td><td>".$row["total"]."</td><td>".$row["grade"]."</td></tr>";
    
}
$sql=$connectionstring->query("SELECT * FROM dc WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="DC";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td><td>".$row["written"]."</td><td>".$row["quiz"]."</td><td>".$row["attendence_performance"]."</td><td>".$row["total"]."</td><td>".$row["grade"]."</td></tr>";
    
}
$sql=$connectionstring->query("SELECT * FROM economics WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="Economics";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td><td>".$row["written"]."</td><td>".$row["quiz"]."</td><td>".$row["attendence_performance"]."</td><td>".$row["total"]."</td><td>".$row["grade"]."</td></tr>";
    
}

$sql=$connectionstring->query("SELECT * FROM web_technologies WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Web Technologies";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td><td>".$row["written"]."</td><td>".$row["quiz"]."</td><td>".$row["attendence_performance"]."</td><td>".$row["total"]."</td><td>".$row["grade"]."</td></tr>";
    
}













$connectionstring->close();
?>
<html>

    
    
   <tr> <td><br><a href="../control/student_logout_control.php">Logout</a></td></yr>

</html>