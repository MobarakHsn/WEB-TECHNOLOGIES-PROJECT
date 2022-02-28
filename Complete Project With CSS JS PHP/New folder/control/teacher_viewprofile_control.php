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
      

    }
    else if($_SESSION["user_type"]=="student")
    {
		header("Location:student_homepage_view.php");
    }
    else
    {

    }
}


include "../model/teacher_db_model.php";
$table="teachers";

$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$_SESSION["username"]."' AND password='".$_SESSION["password"]."'");
if($sql->num_rows > 0)
{
 
    $row=$sql->fetch_assoc();
    echo "<tr><td>Teacher  Id : <tr> <td>".$row["id"]."</td></tr><br>";
    echo "<tr><td>Name : <tr> <td>".$row["first_name"]." ".$row["last_name"]."</td></tr><br>";
    echo "<tr><td>Gender : <tr> <td>".$row["gender"]."</td></tr><br>";
    echo "<tr><td>Access Status : <tr> <td>".$row["access_status"]."</td></tr><br>";
    echo "<tr><td>Username : <tr> <td>".$row["username"]."</td></tr><br>";
    echo "<tr><td>Email : <tr> <td>".$row["email"]."</td></tr><br>";
    echo "<tr><td> Contact : <tr> <td>".$row["phone"]."</td></tr><br>";
    echo "<tr><td>DOB : <tr> <td>".$row["dob"]."</td></tr><br>";
    echo "<tr><td>Designation : <tr> <td>".$row["designation"]."</td></tr><br>";
}
$mydata->CloseCon($connectionstring);
?>