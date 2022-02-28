<?php
session_start();
include "../model/db_model.php";
function admin_showprofile()
{
    $connection=new db();
    $connobj=$connection->OpenCon();
    $userquery=$connection->admin_getuserbyid($connobj,"admins",$_SESSION["id"]);
    if($userquery->num_rows > 0)
    {
        $row=$userquery->fetch_assoc();
        echo "<table border><tr><td><h4>Id: </h4></td><td>".$row["id"]."</td></tr>";
        echo "<tr><td><h4>First Name: </h4></td><td>".$row["first_name"]."</td></tr>";
        echo "<tr><td><h4>Last Name: </h4></td><td>".$row["last_name"]."</td></tr>";
        echo "<tr><td><h4>Gender: </h4></td><td>".$row["gender"]."</td></tr>";
        echo "<tr><td><h4>Access Status: </h4></td><td>".$row["access_status"]."</td></tr>";
        echo "<tr><td><h4>Username: </h4></td><td>".$row["username"]."</td></tr>";
        echo "<tr><td><h4>Email: </h4></td><td>".$row["email"]."</td></tr>";
        echo "<tr><td><h4>Phone: </h4></td><td>".$row["phone"]."</td></tr>";
        echo "<tr><td><h4>Date of Birth: </h4></td><td>".$row["dob"]."</td></tr>";
        echo "<tr><td><h4>Role: </h4></td><td>".$row["role"]."</td></tr></table>";
    }
    $connection->CloseCon($connobj);
}

?>