<?php
include "../model/student_db_model.php";
if($_SERVER["REQUEST_METHOD"]=="GET")
{
if(isset($_REQUEST["menuoption"]))
{
    if($_REQUEST["menuoption"]=="selectcourse")
    {
      header ("location:../view/student_selectcourse_view.php");
    }
    else if($_REQUEST["menuoption"]=="dropcourse")
    {
        header("Location:../view/student_dropapplication_view.php");
    }

    else if($_REQUEST["menuoption"]=="mycourses")
    {
        header("Location:../view/student_coursesandresult_view.php");
    }
    else if($_REQUEST["menuoption"]=="registeredcourses")
    {
        header("Location:../view/student_registeredcourses_view.php");
    }
    else if($_REQUEST["menuoption"]=="financial")
    {
        header("Location:../control/student_financial_control.php");
    } 
    else if($_REQUEST["menuoption"]=="offeredcourses")
    {
        header("Location:../control/student_offeredcourses_control.php");
    }
    else if($_REQUEST["menuoption"]=="submitassignment")
    {
        header("Location:../view/student_submitassignment_view.php");
    }
    else
    {

    }
}}
?>
