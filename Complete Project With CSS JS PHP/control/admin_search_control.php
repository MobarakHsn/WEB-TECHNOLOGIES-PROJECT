<?php
    include "../model/db_model.php";
    $id=$name="";
    $id=$_POST["id"];
    $name=$_POST["name"];
    $connection=new db();
    $connobj=$connection->OpenCon();
    // echo $id;
    // echo $name;
    $result=$connection->Search($connobj,$id,$name);
    $connection->CloseCon($connobj);
    
    if($result->num_rows>0)
    {
        echo "<table><tr style='background-color:rgb(230, 227, 227);'><th>Id</th><th>First Name</th>
        <th>Last Name</th><th>Gender</th><th>Access status</th>
        <th>Username</th><th>Password</th><td>Email</th>
        <th>Phone</th><th>Date of Birth</th><th>Due Fees</th>
        <th>Department</th><th>Program</th></tr>";
        while($row=$result->fetch_assoc())
        {
            echo "<tr style='background-color:rgba(190, 233, 213, 0.959);'><td>".$row["id"]."</td><td>".$row["first_name"]."</td>
            <td>".$row["last_name"]."</td><td>".$row["gender"]."</td>
            <td>".$row["access_status"]."</td><td>".$row["username"]."</td>
            <td>".$row["password"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td>
            <td>".$row["dob"]."</td><td>".$row["due_fees"]."</td><td>".$row["department"]."</td><td>".$row["program"]."</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<b>0 result found<b>";
    }
?>