<?php
include "../model/db_model.php";
$validatesalary="";
$flag=0;
function admin_duesalary($value)
{
    $connection=new db();
    $connobj=$connection->OpenCon();
    $connection->admin_showduesalary($connobj,$value);
    $connection->CloseCon($connobj);
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_REQUEST["show_salary"]))
    {
        $flag=1;
        $validatesalary=$_REQUEST["salary"];
    }
}

?>