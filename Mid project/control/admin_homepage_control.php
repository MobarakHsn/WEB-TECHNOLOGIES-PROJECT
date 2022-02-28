<?php
session_start();
include "../model/db_model.php";
$validatenotice="";
$validatepending="";
$validatecheck="";
$validatechangeaccess="";
$validatedue="";

function admin_pendingtable()
{
    $connection=new db();
    $connobj=$connection->OpenCon();
    $connection->admin_showtotalpendings($connobj,"pending");
    $connection->CloseCon($connobj);
}

if($_SERVER["REQUEST_METHOD"]=="GET")
{
    if(isset($_REQUEST["submit_due"]))
    {
        if($_REQUEST["due"]==="due_fees")
        {
            header("Location:../view/admin_duefees_view.php");
        }
        else if($_REQUEST["due"]==="due_salary")
        {
            header("Location:../view/admin_duesalary_view.php");
        }
    }
    if(isset($_REQUEST["change_access_submit"])  && isset($_REQUEST["change_access_list"]))
    {
        if($_REQUEST["change_access_list"]=="admin")
        {
            if($_SESSION["role"]!="super_admin")
            {
                $validatechangeaccess="<h4>You must be super admin to access this.<h4>";
            }
            else
                header("Location:../view/admin_changeaccessadmin_view.php");
        }
        else if($_REQUEST["change_access_list"]=="teacher")
        {
            header("Location:../view/admin_changeaccessteacher_view.php");
        }
        else if($_REQUEST["change_access_list"]=="student")
        {
            header("Location:../view/admin_changeaccessstudent_view.php");
        }
        else if($_REQUEST["change_access_list"]=="librarian")
        {

        }
    }

    if(isset($_REQUEST["check"]))
    {
        if(empty($_REQUEST["checkstatus"]))
        {
            $validatecheck="<h4>Please enter an id</h4>";
        }
        else if(!is_numeric($_REQUEST["checkstatus"]))
        {
            $validatecheck="<h4>Please enter valid id</h4>";
        }
        else
        {
            $connection=new db();
            $connobj=$connection->OpenCon();
            $res=$connection->admin_getuserbyid($connobj,"users",$_REQUEST["checkstatus"]);
            if($res->num_rows>0)
            {
                $row=$res->fetch_assoc();
                $validatecheck="<h4>"."Id ".$_REQUEST["checkstatus"]." is ".$row["access_status"]."<h4>";
            }
            else
            {
                $validatecheck="<h4>No matched id found<h4>";
            }
            $connection->CloseCon($connobj);
        }
        
    }

    if(isset($_REQUEST["pending_options_registration"])  && isset($_REQUEST["pending_registration_submit"]))
    {
        if($_REQUEST["pending_options_registration"]=="all_pendings")
        {
            
        }
        else if($_REQUEST["pending_options_registration"]=="admin_pendings")
        {
            if($_SESSION["role"]!="super_admin")
            {
                $validatepending="<h4>You must be suprt admin to access this.<h4>";
            }
            else
                header("Location:../view/admin_pendingadmins_view.php");
        }
        else if($_REQUEST["pending_options_registration"]=="teacher_pendings")
        {
            header("Location:../view/admin_pendingteachers_view.php");
        }
        else if($_REQUEST["pending_options_registration"]=="student_pendings")
        {
            header("Location:../view/admin_pendingstudents_view.php");
        }
        else
        {

        }
    }

    if(isset($_REQUEST["notice"])  && isset($_REQUEST["submit_notice"]))
    {
        if($_REQUEST["notice"]=="post_admin_notice")
        {
            $_SESSION["notice"]="admin";
            header("Location:../view/admin_postnotice_view.php");
        }
        else if($_REQUEST["notice"]=="post_teacher_notice")
        {
            $_SESSION["notice"]="teacher";
            header("Location:../view/admin_postnotice_view.php");
        }
        else if($_REQUEST["notice"]=="post_student_notice")
        {
            $_SESSION["notice"]="student";
            header("Location:../view/admin_postnotice_view.php");
        }
        else if($_REQUEST["notice"]=="post_librarian_notice")
        {
            $_SESSION["notice"]="librairan";
            header("Location:../view/admin_postnotice_view.php");
        }
    }
}

?>