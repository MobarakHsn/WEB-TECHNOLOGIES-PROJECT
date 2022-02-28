<?php
include "../model/db_model.php";
$validatefees="";
$flag=0;
function admin_duefees($value)
{
    $connection=new db();
    $connobj=$connection->OpenCon();
    $connection->admin_showduefees($connobj,$value);
    $connection->CloseCon($connobj);
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_REQUEST["show_fees"]))
    {
        $flag=1;
        $validatefees=$_REQUEST["fees"];
    }
}

?>