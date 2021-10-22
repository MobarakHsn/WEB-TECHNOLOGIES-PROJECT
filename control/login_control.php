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

// if(isset($_COOKIE["username"])  && isset($_REQUEST["username"]) && $_REQUEST["username"]==$_COOKIE["username"])
// {
//     $connection=new db();
//     $connobj=$connection->OpenCon();
//     $userquery=$connection->admin_getuserbyusername($connobj,"users",$_COOKIE["username"]);
//     if($userquery->num_rows > 0)
//     {
//         $row=$userquery->fetch_assoc();
//         // if($row["access_status"]=="active")
//         // {
//         //     $_SESSION["username"]=$row["username"];
//         //     $_SESSION["password"]=$row["password"];
//         //     $_SESSION["user_type"]=$row["user_type"];
//         //     $_SESSION["id"]=$row["id"];
//         //     $_SESSION["access_status"]=$row["access_status"];
//         //     if($_SESSION["user_type"]=="admin")
//         //     {
//         //         $query=$connection->admin_getadminbyid($connobj,"admins",$_SESSION["id"]);
//         //         if($query->num_rows > 0)
//         //         {
//         //             $row=$query->fetch_assoc();
//         //             $_SESSION["first_name"]=$row["first_name"];
//         //             $_SESSION["last_name"]=$row["last_name"];
//         //             $_SESSION["role"]=$row["role"];
//         //         }
//         //         $connection->CloseCon($connobj);
//         //         header("Location:../view/admin_homepage_view.php");
//         //     }
//         //     else if($_SESSION["user_type"]=="teacher")
//         //     {
                
//         //     }
//         //     else if($_SESSION["user_type"]=="student")
//         //     {

//         //     }
//         //     else if($_SESSION["user_type"]=="librarian")
//         //     {

//         //     }
//         // }
//         // else
//         // {
//         //     $error="<h4>Your access permission  is blocked<h4>";
//         // }

//     }
//     $connection->CloseCon($connobj);

// }

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
                    
                }
                else if($_SESSION["user_type"]=="student")
                {

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