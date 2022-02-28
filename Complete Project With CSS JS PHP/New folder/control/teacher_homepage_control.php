<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $select=$_REQUEST["step"];
    
    if($select[0]=='1')
    {
        header("Location:../view/teacher_assignresult_view.php"); 
    }
    else if($select[0]=='2')
    {
        header("Location:../view/teacher_droprequest_view.php");
    }
    else if($select[0]=='3')
    {
        header("Location:../view/teacher_leaverequest_view.php");
    }
    else
    {
        header("Location:../view/teacher_postassignment_view.php");
    }
}
?>