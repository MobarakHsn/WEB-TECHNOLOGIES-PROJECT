<?php
include "../model/db_model.php";
session_start();
$validatefname="";
$validatelname="";
$validategender="";
$access_status="pending";
$validateusername="";
$validatepassword="";
$validateemail="";
$validatemobile="";
$validatedob="";
$validaterole="";
$cnt=0;
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $cnt1=0;
    $fname=$_REQUEST["fname"];
    $lname=$_REQUEST["lname"];
    $gender="";
    $dob="";
    $username=$_REQUEST["username"];
    $password=$_REQUEST["password"];
    $image="";
    $email=$_REQUEST["email"];
    $mobile=$_REQUEST["mobile"];
    $role="";

    if(empty($fname))
    {
        $validatefname="<h4>Please enter first name.<h4>";
    }
    else
    {
        if(ctype_alpha($fname))
        {
            if(strlen($fname)<3)
            {
                $validatefname="<h4>Atleast 3 alphabet required.<h4>";
            }
            else
            {
                $cnt1=$cnt1+1;
            }

        }
        else
        {
            $validatefname="<h4>Please enter only alphabet.<h4>";
        }   
    }

    if(empty($lname))
    {
        $validatelname="<h4>Please enter last name.<h4>";
    }
    else
    {
        if(ctype_alpha($lname))
        {
            if(strlen($lname)<3)
            {
                $validatelname="<h4>Atleast 3 alphabet required.<h4>";
            }
            else
            {
                $cnt1=$cnt1+1;
            }

        }
        else
        {
            $validatelname="<h4>Please enter only alphabet.<h4>";
        }   
    }

    if(isset($_REQUEST["gender"]))
    {
        $cnt1=$cnt1+1;
        $gender=$_REQUEST["gender"];
    }
    else
    {
        $validategender="<h4>Must choose 1 option<h4>";
    }

    if(empty($username))
    {
        $validateusername="<h4>Please enter username.<h4>";
    }
    else
    {
        if(strlen($username)<5)
        {
            $validateusername="<h4>Atleast 5 character required.<h4>";
        }
        else
        {
            $connection=new db();
            $connobj=$connection->OpenCon();
            if($connection->admin_check_uniqueusrname($connobj,"users",$username)===0)
            {
                $cnt1=$cnt1+1;
            }
            else
            {
                $validateusername="<h4>Username already exists<h4>";
            }
            $connection->CloseCon($connobj);
        }
    }

    if(empty($password))
    {
        $validatepassword="<h4>Please enter password.<h4>";
    }
    else
    {
        if(strlen($password)<8)
        {
            $validatepassword="<h4>Atleast 8 character required.<h4>";
        }
        else
        {
            $cnt1=$cnt1+1;
        }
    }

    if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
    {
        $validateemail="<h4>Enter a valid email address.<h4>";
    }
    else
    {
        $cnt1=$cnt1+1;
    }

    if(empty($mobile) || !preg_match('/^[0-9]{11}+$/', $mobile))
    {
        $validatemobile="<h4>Please enter a mobile number.<h4>";
    }
    else
    {
        $cnt1=$cnt1+1;
    }

    if($_REQUEST["dob"]!="")
    {
        $dob=$_REQUEST["dob"];
        if($dob<"2001-00-00")
        {
            $cnt1=$cnt1+1;
        }
        else
        {
            $validatedob="<h4>Birth year must be greater than 2001<h4>";
        }
    }
    else
    {
        $validatedob="<h4>Please select date of birth.<h4>";
    }

    if(isset($_REQUEST["role"]))
    {
        $cnt1=$cnt1+1;
        $role=$_REQUEST["role"];
    }
    else
    {
        $validaterole="<h4>Please select a role.<h4>";
    }
    
    if($cnt1===9)
    {
        $connection=new db();
        $connobj=$connection->OpenCon();
        $connection->admin_insert_user($connobj,$username,$password,"admin");
        $query=$connection->admin_check_user($connobj,"users",$username,$password);
        if($query->num_rows > 0)
        {
            $row=$query->fetch_assoc();
            $id=$row['id'];
            $res=$connection->admin_insert_admin($connobj,$id,$fname,$lname,$gender,"pending",$username,$password,$email,$mobile,$dob,$role);
            if($res===TRUE)
            {
                
                echo "Your registration is completed wait for your account to be active";
            }
            else
            {
                echo "There was and error please try again.";
            }
        }
        else
        {
            echo "There was an error please try again";
        }
        $connection->CloseCon($connobj);
    }
}

?>