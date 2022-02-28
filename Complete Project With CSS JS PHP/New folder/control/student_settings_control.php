<?php
session_start(); 
include "../model/student_db_model.php";
$table="students"; $msg1=""; $msg2=""; $msg3="";$count=0; $c=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if(empty($_REQUEST["cpass"])){
        $msg1="You must enter password"."<br>";
        
      }
      if(($_REQUEST["cpass"])==$_SESSION["password"]){ 
        $count=$count+1;
      if(empty($_REQUEST["npass"])){
        $msg1="You must enter password"."<br>";
        
      }
      else{
        if((strlen($_REQUEST["npass"])) <8){
      
          $msg1="Password should be at least 8 characters in length."."<br>";
      
        }
        else{ 
            if(($_REQUEST["npass"])==$_REQUEST["conpass"]){
                $count=$count+1;
             
      }
    else{
        $msg1="New Password and Confirm Password does not match "."<br>"; 
    }
    
    
    
    
    }}}
      else{
        $msg1="Courrent Password is wrong"."<br>"; 
      }}
      if($count==2)
    {
        $table="students";

$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$username=$_SESSION["username"];
$newpass=$_REQUEST["conpass"];
$sql=$connectionstring->query("SELECT * FROM $table WHERE username='$username'");
if($sql->num_rows > 0)
{
    $sql2="UPDATE $table SET password='$newpass' WHERE username='$username'" ;
    if($connectionstring->query($sql2)==TRUE)
      {
        $sql3="UPDATE users SET password='$newpass' WHERE username='$username'" ;
        if($connectionstring->query($sql3)==TRUE)
        { 
          header("Location:../view/student_login_view.php");
       
      }}
      else{
        $msg1="ERROR! ";
      }
    
  }
  
  

  $connectionstring->close();


    }

      ?>
  