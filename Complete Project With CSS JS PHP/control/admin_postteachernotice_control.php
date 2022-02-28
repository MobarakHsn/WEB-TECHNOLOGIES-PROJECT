<?php
session_start();
include "../model/db_model.php";
$_SESSION["notice"]="teacher";
header("Location:../view/admin_postnotice_view.php");
?>