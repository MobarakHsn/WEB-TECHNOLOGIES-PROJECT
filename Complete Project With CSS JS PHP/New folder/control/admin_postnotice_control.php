<?php
$validatenotice="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_REQUEST["notice_text"]))
    {
        $validatenotice="<h4>Notice is empty.<h4>";
    }
    else if(isset($_SESSION["notice"]))
    {
        $adminnotice="";
        $studentnotice="";
        $teachernotice="";
        $librariannotice="";
        
        $data=file_get_contents("../files/notices.json");
        $normal_data=json_decode($data);

        if($_SESSION["notice"]=="admin")
        {
            $adminnotice=$_REQUEST["notice_text"];
            $teachernotice=$normal_data->teacher;
            $studentnotice=$normal_data->student;
            $librariannotice=$normal_data->librarian;
        }
        else if($_SESSION["notice"]=="teacher")
        {
            $teachernotice=$_REQUEST["notice_text"];
            $studentnotice=$normal_data->student;
            $librariannotice=$normal_data->librarian;
            $adminnotice=$normal_data->admin;
        }
        else if($_SESSION["notice"]=="student")
        {
            $studentnotice=$_REQUEST["notice_text"];
            $teachernotice=$normal_data->teacher;
            $librariannotice=$normal_data->librarian;
            $adminnotice=$normal_data->admin;
        }
        else
        {
            $librariannotice=$_REQUEST["notice_text"];
            $teachernotice=$normal_data->teacher;
            $studentnotice=$normal_data->student;
            $adminnotice=$normal_data->admin;
        }

        $formdata=array(
            "admin"=>$adminnotice,
            "teacher"=>$teachernotice,
            "librarian"=>$librariannotice,
            "student"=>$studentnotice
        );

        $jsondata=json_encode($formdata,JSON_PRETTY_PRINT);
        if(file_put_contents("../files/notices.json",$jsondata))
        {
            $validatenotice="<h4>Notice successfully posted<h4>";
        }
        else
        {
            $validatenotice="<h4>Sorry, notice can not be posted at this moment<h4>";
        }
    }
}
?>