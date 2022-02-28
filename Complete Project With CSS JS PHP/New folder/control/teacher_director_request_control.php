<?php
include("../model/teacher_db_model.php");
$ok=true;
$vusername="";
$msg="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_REQUEST["username"];
    $vp=$_REQUEST["step"];

    if(empty($username)){
        $vusername="You must enter username"."<br>";
        $ok=false;
      }
    

    if($vp[0]=='1' && $ok==true)
    {
       
        $table="leave_applications";
        $status="pending";

        $mydata=new db();
        $connectionstring=$mydata ->OpenCon();
        $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND status='".$status."'");
        if($sql->num_rows > 0)
        {

        
        $sql0=$connectionstring->query("UPDATE $table SET status='Dropped' WHERE username='$username'");
        $sql1=$connectionstring->query("UPDATE users SET access_status='Dropped' WHERE username='$username'");
        $sql2=$connectionstring->query("UPDATE teachers SET access_status='Dropped' WHERE username='$username'");
        if($sql1 && $sql2 && $sql0)
         {
             $msg="Teacher leave application approved";
                     
         }
         else{
            $msg="Leave application error";
         }
        }
        else{
            $msg="No teacher found";
        }

        $mydata->CloseCon($connectionstring);
    }


        else if($vp[0]=='2' && $ok==true)
        {
            $msg="Teacher leave application rejected";
    
        }
         

    }
   


?>