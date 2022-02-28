<?php
include("../model/student_db_model.php");

$coursename="";
$username="";
$count=0;
$msg="";
$table1="";
$department="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $coursename=$_REQUEST["courselist"];
 
   $username=$_SESSION["username"];
    if($_REQUEST["courselist"]=="Web_Technologies")
    {
       $table1="web_technologies";
    }
    else if($_REQUEST["courselist"]=="Economics")
    {
       $table1="economics";
    }
    else if($_REQUEST["courselist"]=="DC")
    {
       $table1="dc";
    }
   else  if($_REQUEST["courselist"]=="AC")
    {
       $table1="ac";
    }
   else  if($_REQUEST["courselist"]=="Data_Structure")
    {
       $table1="data_structure";
    }
   else  if($_REQUEST["courselist"]=="Compiler_Design")
    {
       $table1="compiler_design";
    }
  else   if($_REQUEST["courselist"]=="Algorithms")
    {
       $table1="algorithms";
    }
   else  if($_REQUEST["courselist"]=="Accounting")
    {
       $table1="accounting";
    }



    $mydata=new db();
    $connectionstring=$mydata ->OpenCon();
    $table="subjects";
    
    $sql=$connectionstring->query("SELECT * FROM $table WHERE course_name='$coursename'");
    if($sql->num_rows > 0)
      {
          $row=$sql->fetch_assoc();
          $department=$row["department"];
          $count=$row['student_count'];
          $teacher=$row["course_teacher"];
        
          if($teacher==NULL)
          {
              $msg="Teacher is not selected for this subject";
          }
          
          else if($department!=$_SESSION["department"])
          {  
              $msg="You do not belong to this course department";
          }
          else if($count==40)
          {
              $msg="Course seat is full";
          }

          else
          {

             $sql1=$connectionstring->query("SELECT * FROM $table1 WHERE username='$username'");
             if($sql1->num_rows > 0)
             {
                 $msg="Course is already taken";
             }
             else
             {
                 $count=$count+1;
                 $sql2=$connectionstring->query("UPDATE subjects SET student_count=$count WHERE course_name='".$_REQUEST["courselist"]."'");
                if($sql2)
                  {
                      $empty="";
                      $sql3="INSERT INTO $table1( username, written , quiz, attendence_performance, total,grade) VALUES('$username',0,0,0,0,'$empty')";
                      if($connectionstring->query($sql3)==TRUE)
                        {
                        
                           $msg= "Course registered";
                            
                        }
                    
                  }
                 else
                 {
                     echo "Error: ".$sql."<br>".$connectionstring-->error;
                 }

             }




          }


        



          
      } 
       $connectionstring->close();  
      }
      ?>