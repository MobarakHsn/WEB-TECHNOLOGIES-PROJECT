<?php
include "../model/db_model.php";

$connection=new db();
$connobj=$connection->OpenCon();
$result=$connection->admin_showalladmins($connobj,"active");
$connection->CloseCon($connobj);

?>