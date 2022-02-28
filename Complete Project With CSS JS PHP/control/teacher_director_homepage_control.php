<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $select=$_REQUEST["step"];
    
    if($select[0]=='1')
    {
        header("Location:../view/teacher_director_request_view.php"); 
    }
    else
    {
        header("Location:../view/teacher_director_assign_view.php");
    }
}
?>