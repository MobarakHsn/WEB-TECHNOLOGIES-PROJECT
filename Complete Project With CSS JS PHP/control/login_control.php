<?php
include "../model/db_model.php";
session_start();

function admin_fillpassword()
{
    if(isset($_COOKIE["username"]))
    {
        $connection=new db();
        $connobj=$connection->OpenCon();
        $userquery=$connection->admin_getuserbyusername($connobj,"users",$_COOKIE["username"]);
        if($userquery->num_rows > 0)
        {
            $row=$userquery->fetch_assoc();
            if($row["access_status"]=="active")
            {
                $connection->CloseCon($connobj);
                return $row["password"];
            }
        }
        $connection->CloseCon($connobj);
        return "";
    }
}


$validateusername="";
$validatepassword="";
$error="";
$cnt=0;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username="";
    $password="";
    if(empty($_REQUEST["username"]))
    {
        $validateusername="<h4>Please input username.<h4>";
    }
    else if(empty($_REQUEST["password"]))
    {
        $validatepassword="<h4>Please input password.<h4>";
    }
    else
    {
        $cnt=2;
        $username=$_REQUEST["username"];
        $password=$_REQUEST["password"];
        $connection=new db();
        $connobj=$connection->OpenCon();
        $userquery=$connection->admin_check_user($connobj,"users",$username,$password);
        if($userquery->num_rows > 0)
        {
            $row=$userquery->fetch_assoc();
            if($row["access_status"]=="active")
            {
                $_SESSION["username"]=$username;
                $_SESSION["password"]=$password;
                $_SESSION["user_type"]=$row["user_type"];
                $_SESSION["id"]=$row["id"];
                $_SESSION["access_status"]=$row["access_status"];
                if($_SESSION["user_type"]=="admin")
                {
                    $query=$connection->admin_getuserbyid($connobj,"admins",$_SESSION["id"]);
                    if($query->num_rows > 0)
                    {
                        $row=$query->fetch_assoc();
                        $_SESSION["first_name"]=$row["first_name"];
                        $_SESSION["last_name"]=$row["last_name"];
                        $_SESSION["role"]=$row["role"];
                        $_SESSION["user_image"]=$row["image"];
                    }
                    $connection->CloseCon($connobj);
                    if(isset($_REQUEST["cookies"]))
                    {
                        $cookie_name = "username";
                        $cookie_value = $username;
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                    }
                    header("Location:../view/admin_homepage_view.php");
                }
                else if($_SESSION["user_type"]=="teacher")
                {
                    $table="teachers";
                    $mydata=new db();
                    $connectionstring=$mydata ->OpenCon();
                    $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND password='".$password."'");
                    if($sql->num_rows > 0)
                    {
                        $row=$sql->fetch_assoc();
                        $designation =$row["designation"];

                        
                        if($designation=="Director")
                        {
							$connectionstring->close();
                            $_SESSION["designation"]="Director";
                            header("Location:../view/teacher_director_homepage_view.php");
                        }
                        else
                        {
							$connectionstring->close();
                            $_SESSION["designation"]="Other";
                            header("Location:../view/teacher_homepage_view.php");
                        }
                    }
                }
                else if($_SESSION["user_type"]=="student")
                {
					$table="students";
					$mydata=new db();
					$connectionstring=$mydata ->OpenCon();

					$sql=$connectionstring->query("SELECT * FROM $table WHERE username='$username' AND password='$password'");
					if($sql->num_rows > 0)
					{
						$row=$sql->fetch_assoc();
					
						$_SESSION["department"]=$row["department"];
					}
					$connectionstring->close();
					header("Location:../view/student_homepage_view.php");  
                }
                else if($_SESSION["user_type"]=="librarian")
                {

                }
            }
            else
            {
                $error="<h4>Your access permission  is blocked<h4>";
            }

        }
        else
        {
            $error="<h4>Invalid username or password<h4>";
        }
        $connection->CloseCon($connobj);
    }
}
?>