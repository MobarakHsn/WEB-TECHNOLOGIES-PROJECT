<?php
include "../model/db_model.php";

$connection=new db();
$connobj=$connection->OpenCon();
$result=$connection->admin_showallstudents($connobj,"active");
$connection->CloseCon($connobj);

?>