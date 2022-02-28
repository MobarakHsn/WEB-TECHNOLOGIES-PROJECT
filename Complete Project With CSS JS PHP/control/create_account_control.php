<?php
session_start();
$validateusertype="";
$cnt=0;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(!isset($_REQUEST["usertype"]))
    {
        $validateusertype="<h3>Please select an user type<h3>";
    }
    else
    {
        $cnt=1;
        $validateusertype=$_REQUEST["usertype"];
        if($validateusertype=="Admin")
        {
            $_SESSION["usertype"]="Admin";
            header("Location:../view/admin_registration_view.php");
        }
        else if($validateusertype=="Teacher")
        {
            $_SESSION["usertype"]="Teacher";
            header("Location:../view/teacher_registration_view.php");
        }
        else if($validateusertype=="Librarian")
        {
            $_SESSION["usertype"]="Librarian";
            //header("Location:../view/librarian_registration_view.php");
        }
        else
        {
            $_SESSION["usertype"]="Student";
            header("Location:../view/student_registration_view.php");
        }
    }
}

?>