<?php
session_start();
include "../model/db_model.php";
$userprofileinfo;

    $connection=new db();
    $connobj=$connection->OpenCon();
    $userquery=$connection->admin_getuserbyid($connobj,"admins",$_SESSION["id"]);
    $userprofileinfo=$userquery;
    $connection->CloseCon($connobj);

?>