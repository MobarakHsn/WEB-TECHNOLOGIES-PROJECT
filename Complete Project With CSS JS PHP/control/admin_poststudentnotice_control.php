<?php
session_start();
include "../model/db_model.php";
$_SESSION["notice"]="student";
header("Location:../view/admin_postnotice_view.php");
?>