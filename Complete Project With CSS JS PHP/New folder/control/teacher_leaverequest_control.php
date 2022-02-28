<?php

$msg="";
include("../model/teacher_db_model.php");

$username=$_SESSION["username"];

if($_SERVER["REQUEST_METHOD"]=="POST"){
 
 

      $table="leave_applications";
      $mydata=new db();
      $connectionstring=$mydata ->OpenCon();
      $sql="INSERT INTO $table(username,status) VALUES('$username','pending')";
     if($connectionstring->query($sql)===TRUE)
     {
        
         $msg="Request sent";

     }
        else
        {
          echo "Error: ".$sql."<br>".$connectionstring-->error;
        }
  
    
        $mydata->CloseCon($connectionstring);
}
?>