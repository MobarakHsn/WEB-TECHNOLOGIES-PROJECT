<?php
class db{
 
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "portal";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
 }

 function Search($conn,$id,$name)
 {
    $table="students";
    if($id!="" && $name!="")
    {
        $result = $conn->query("SELECT * FROM ". $table." WHERE id=". $id." AND (first_name like '%{$name}%' OR last_name like '%{$name}%')");
        return $result;
    }
    else if($id!="")
    {
        $result = $conn->query("SELECT * FROM ".$table." WHERE id=".$id."");
        return $result;
    }
    else if($name!="")
    {
        $result = $conn->query("SELECT * FROM ". $table." WHERE first_name like '%{$name}%' OR last_name like '%{$name}%'");
        return $result;
    }
 }

 function admin_updateprofile($conn,$id,$fname,$lname,$password,$gender,$email,$phone,$dob,$pic)
 {
    $table="users";
    $sql="UPDATE $table SET password='$password',image='$pic' WHERE id=$id";
    if($conn->query($sql)==TRUE)
    {
        $table="admins";
        $sql="UPDATE $table SET first_name='$fname',last_name='$lname',gender='$gender',password='$password',email='$email',phone='$phone',dob='$dob',image='$pic' WHERE id='$id'";
        if($conn->query($sql)==TRUE)
        {
            echo "updated successfully";
            header("Location:../view/admin_viewprofile_view.php");
            return;
        }
    }
    
 }
 function admin_check_user($conn,$table,$username,$password)
 {
    $result = $conn->query("SELECT * FROM ". $table." WHERE username='". $username."' AND password='". $password."'");
    return $result;
 }

function admin_check_uniqueusrname($conn,$table,$username)
{
    $result = $conn->query("SELECT * FROM ". $table." WHERE username='". $username."'");
    return $result->num_rows;
}

function admin_getuserbyusername($conn,$table,$username)
{
    $result = $conn->query("SELECT * FROM ". $table." WHERE username='". $username."'");
    return $result;
}
function admin_insert_user($conn,$username,$password,$usertype,$image)
{
    $sql="INSERT INTO users(access_status,user_type,username,password,image) VALUES('pending','$usertype','$username','$password','$image')";
    if($conn->query($sql)===TRUE)
    {
        
        //echo "New record created successfully";
    }
    else
    {
        echo "Error: ".$sql."<br>".$conn->error;
    }
}


function admin_insert_admin($conn,$id,$fname,$lname,$gender,$access_status,$username,$password,$email,$phone,$dob,$role,$image)
{
    $sql="INSERT INTO admins(id,first_name,last_name,gender,access_status,username,password,email,phone,dob,role,image) VALUES($id,'$fname','$lname','$gender','$access_status','$username','$password','$email','$phone','$dob','$role','$image')";
    return $conn->query($sql);
}

function admin_getuserbyid($conn,$table,$id)
{
    $result = $conn->query("SELECT * FROM ". $table." WHERE id=". $id."");
    return $result;
}

function admin_showtotalpendings($conn,$status)
{
    $totalpendings=0;
    $table="admins";
    $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    $totaladmins=$result->num_rows;

    $table="students";
    $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    $totalstudents=$result->num_rows;

    $table="teachers";
    $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    $totalteachers=$result->num_rows;

    // $table="librarians";
    // $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    // $totallibrarians=$result->num_rows;
    $totallibrarians=0;
    $totalpendings=$totaladmins+$totalstudents+$totalteachers+$totallibrarians;

    echo "<table border style='background-color:#c1ff33;width:30%;'><tr style='background-color:#ff7b33;'><td><h3>Pending Requests</h3></td><td><h3>Total</h3></td></tr>";
    echo "<tr><td>Admin request pendings</td><td>".$totaladmins."</td></tr>";
    echo "<tr><td>Teacher request pendings</td><td>".$totalteachers."</td></tr>";
    echo "<tr><td>Librarian request pendings</td><td>".$totallibrarians."</td></tr>";
    echo "<tr><td>Student request pendings</td><td>".$totalstudents."</td></tr>";
    echo "<tr style='background-color:#c1ff33;'><td>Total request pendings</td><td>".$totalpendings."</td></tr>";
}

function admin_showalladmins($conn,$status)
{
    $table="admins";
    $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    return $result;
}

function admin_showallteachers($conn,$status)
{
    $table="teachers";
    $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    return $result;
}

function admin_showallstudents($conn,$status)
{
    $table="students";
    $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    return $result;
}

function admin_showpendingadmins($conn,$status)
{
    $table="admins";
    $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    return $result;
}

function admin_showpendingteachers($conn,$status)
{
    $table="teachers";
    $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    return $result;

}


function admin_showpendingstudents($conn,$status)
{
    $table="students";
    $result = $conn->query("SELECT * FROM ". $table." WHERE access_status='". $status."'");
    return $result;

}

function admin_showduefees($conn,$value)
{
    $table="students";
    $result = $conn->query("SELECT * FROM ". $table." WHERE due_fees>='". $value."'");
    echo "<table border>
    <tr>
        <td><h3>ID</h3></td>
        <td><h3>First Name</h3></td>
        <td><h3>Last Name</h3></td>
        <td><h3>Department</h3></td>
        <td><h3>Program</h3></td>
        <td><h3>Email</h3></td>
        <td><h3>Due Fees<h3></td>
    </tr>";
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td>
            <td>".$row["department"]."</td><td>".$row["program"]."</td><td>".$row["email"]."</td><td>".$row["due_fees"]."</td></tr>";
        }
    }
    echo "</table>";
}

function admin_showduesalary($conn,$value)
{
    $table="teachers";
    $result = $conn->query("SELECT * FROM ". $table." WHERE due_salary>='". $value."'");

    echo "<table border>
    <tr>
        <td><h3>ID</h3></td>
        <td><h3>First Name</h3></td>
        <td><h3>Last Name</h3></td>
        <td><h3>Email</h3></td>
        <td><h3>Phone</h3></td>
        <td><h3>Due Salary</h3></td>
        <td><h3>Designation<h3></td>
    </tr>";
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td>
            <td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["due_salary"]."</td><td>".$row["designation"]."</td></tr>";
        }
    }
    echo "</table>";
}


function admin_updateUserStatus($conn,$table,$id,$status)
{
    $sql="UPDATE $table SET access_status='$status' WHERE id=$id";
    if($conn->query($sql)===TRUE)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}


//  function admin_check_uniqueusrname($conn,$table,$username,$password)
//  {
//     $result = $conn->query("SELECT * FROM ". $table." WHERE username='". $username."' AND password='". $password."'");
//     return $result;
//  }

function CloseCon($conn)
{
    $conn -> close();
}
}
?>