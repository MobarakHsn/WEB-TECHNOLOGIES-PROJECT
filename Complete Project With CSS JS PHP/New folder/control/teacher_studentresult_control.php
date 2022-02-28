<?php
include("../model/teacher_db_model.php");
$ok=true;
$vusername1=""; 
$vwritten="";
$vquiz="";
$vap="";
$mymsg="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=$_SESSION["username"];
$subject= $_SESSION["resultcourse"];



if($subject=="Web_Technologies")
    {
       $table1="web_technologies";
    }
    else if($subject=="Economics")
    {
       $table1="economics";
    }
    else if($subject=="DC")
    {
       $table1="dc";
    }
   else if($subject=="AC")
    {
       $table1="ac";
    }
   else if($subject=="Data_Structure")
    {
       $table1="data_structure";
    }
   else if($subject=="Compiler_Design")
    {
       $table1="compiler_design";
    }
  else  if($subject=="Algorithms")
    {
       $table1="algorithms";
    }
   else if($subject=="Accounting")
    {
       $table1="accounting";
    }


$username1=$_REQUEST["username1"];
$written=$_REQUEST["written"];
$quiz=$_REQUEST["quiz"];
$ap=$_REQUEST["ap"];


if(empty($written)){
    $vwritten="You must enter written number"."<br>";
    $ok=false;
  }

  else
  {

    if(!is_numeric($written)) {
        $vwritten="Written number should be numeric number";
        $ok=false;
    }

    $int = (int)$written;

    if($int <0 || $int>40)
    {
        $vwritten="Written number should be between 0 to 40";
        $ok=false;
    }

  }


  if(empty($quiz)){
    $vquiz="You must enter quiz number"."<br>";
    $ok=false;
  }

  else
  {

    if(!is_numeric($quiz)) {
        $vquiz="quiz number should be numeric number";
        $ok=false;
    }

    $int1 = (int)$quiz;

    if($int1 <0 || $int1>40)
    {
        $vquiz="quiz number should be between 0 to 40";
        $ok=false;
    }

  }


  if(empty($ap)){
    $vap="You must enter attendence and performance number"."<br>";
    $ok=false;
  }

  else
  {

    if(!is_numeric($ap)) {
        $vap="attendence and performance number should be numeric number";
        $ok=false;
    }

    $int2 = (int)$ap;

    if($int2 <0 || $int2>20)
    {
        $vap="attendence and performance number should be between 0 to 20";
        $ok=false;
    }

  }



  if(empty($username1)){
    $vusername1="You must enter username"."<br>";
    $ok=false;
  }

  else
  {
    
    $mydata=new db();
    $connectionstring=$mydata ->OpenCon();
    $sql=$connectionstring->query("SELECT * FROM ". $table1." WHERE username='". $username1."'");
    if($sql->num_rows > 0)
    {
    }
    else
    {
       $vusername1="There is no student of this username in this course";
       $ok=false;
    }
    $mydata->CloseCon($connectionstring);

  }


if($ok==true)
    {
        $m3 = (int)$ap;
        $m2 = (int)$quiz;
        $m1 = (int)$written;
        $total=$m1+$m2+$m3;
        if($total>=50 && $total<60)
        {
            $grade="D";
        }
        if($total>=60 && $total<65)
        {
            $grade="D+";
        }
        if($total>=65 && $total<70)
        {
            $grade="C";
        }
        if($total>=70 && $total<75)
        {
            $grade="C+";
        }
        if($total>=75 && $total<80)
        {
            $grade="B";
        }
        if($total>=80 && $total<85)
        {
            $grade="B+";
        }
        if($total>=85 && $total<90)
        {
            $grade="A";
        }
        if($total>=90)
        {
            $grade="A+";
        }
        if($total<50)
        {
            $grade="F";
        }

        
        $mydata=new db();
        $connectionstring=$mydata ->OpenCon();
        $sql2=$connectionstring->query("UPDATE $table1 SET  written =$m1,quiz =$m2,attendence_performance =$m3,total=$total,grade='$grade' WHERE username='".$username1."'");
        if($sql2)
        {
            $mymsg="Result assigned";
        }
        else
        {
           $mymsg="Error assigning result";

        }

    }

}
?>