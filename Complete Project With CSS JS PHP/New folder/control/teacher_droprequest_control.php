<?php
include("../model/teacher_db_model.php");
$ok=true;
$vusername="";
$msg="";
$myusername= $_SESSION["username"];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_REQUEST["username"];
    $vp=$_REQUEST["step"];

    if(empty($username)){
        $vusername="You must enter username"."<br>";
        $ok=false;
      }
    

    if($vp[0]=='1' && $ok==true)
    {
       
        $table="drop_request";
        $status="pending";

        $mydata=new db();
        $connectionstring=$mydata ->OpenCon();
        $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND status='".$status."'");
        if($sql->num_rows > 0)
        {
            $row=$sql->fetch_assoc();
            $position=$row["course"];
            $table1="subjects";

            $sql100=$connectionstring->query("SELECT * FROM ".$table1." WHERE course_teacher='".$myusername."' AND course_name='".$position."'");
            if($sql100->num_rows > 0)
            {

                $row=$sql100->fetch_assoc();
                $count=$row["student_count"];
                $count= $count-1;

                $sql0=$connectionstring->query("UPDATE $table SET status='Dropped' WHERE username='$username'");
                $sql000=$connectionstring->query("UPDATE subjects SET  student_count=$count WHERE course_name='$position'");


                if($position=="Web_Technologies")
                {
                   $table100="web_technologies";
                }
                else if($position=="Economics")
                {
                   $table100="economics";
                }
                else if($position=="DC")
                {
                   $table100="dc";
                }
               else  if($position=="AC")
                {
                   $table100="ac";
                }
               else  if($position=="Data_Structure")
                {
                   $table100="data_structure";
                }
               else  if($position=="Compiler_Design")
                {
                   $table100="compiler_design";
                }
              else   if($position=="Algorithms")
                {
                   $table100="algorithms";
                }
               else  if($position=="Accounting")
                {
                   $table100="accounting";
                }


                $sql3=$connectionstring->query("DELETE FROM $table100 WHERE username='$username'");

               
                if($sql3 && $sql0 && $sql000)
                 {
                     $msg="Student Drop Request approved";
                             
                 }
                 else{
                    $msg="Drop request error";
                 }


            }
            else
            {
                $msg="You are not the teacher of this section";
              
            }

       
        }
        else{
            $msg="No Student found";
        }

        $mydata->CloseCon($connectionstring);
    }


        else if($vp[0]=='2' && $ok==true)
        {
            $msg="Student drop request rejected";
    
        }
         

    }
   


?>