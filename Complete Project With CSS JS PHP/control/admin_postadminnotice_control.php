<?php
session_start();
include "../model/db_model.php";
$_SESSION["notice"]="admin";
header("Location:../view/admin_postnotice_view.php");
?>