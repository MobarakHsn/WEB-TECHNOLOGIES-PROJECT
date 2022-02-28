<?php
include("../model/teacher_db_model.php");
$ok=true;
$vfname=""; 
$vlname="";
$vusername="";
$vemail="";
$vpassword="";
$vgender=""; 
$vmobile="";
$vdate="";
$vdesignation="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name1=$_REQUEST["fname"];
 
if(empty($name1))
{
    $vfname= "Please enter your first name";
    $ok=false;

}
else if (!preg_match("/^[a-zA-Z ]*$/",$name1)){
    $vfname="First name should be alphabet"; 
    $ok=false;
}

$name2=$_REQUEST["lname"];
if(empty($name2))
{
    $vlname= "Please enter your last name";
    $ok=false;

}
else if (!preg_match("/^[a-zA-Z ]*$/",$name2)){
    $vlname= "Last name should be alphabet"; 
    $ok=false;
}


$email=$_REQUEST["email"];
if(empty($email)){
    $vemail="Email can not be empty";
    $ok=false;
  } 
else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   
  } else {
    echo("$email is not a valid email address");
    $ok=false;
  }

$password=$_REQUEST["password"];
if(empty($password)){
  $vpassword="You must enter password"."<br>";
  $ok=false;
}
else{
  if((strlen($password)) <8){

    $vpassword="Password should be at least 8 characters"."<br>";
    $ok=false;
  }
 
}

$username=$_REQUEST["username"];

if(empty($username)){
    $vusername="You must enter username"."<br>";
    $ok=false;
  }

  else{

    if (is_numeric($username)){
        $vusername="Invalid username"; 
        $ok=false;
    }
    else{
          $table="users";
          $access_status="active";
          $mydata=new db();
          $connectionstring=$mydata ->OpenCon();
          $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND access_status='".$access_status."'");
          if($sql->num_rows > 0)
           {
               $vusername="Username is already taken try another one";
               $ok=false;
           }
           $mydata->CloseCon($connectionstring);
    }
    

  }

$mobile=$_REQUEST["mobile"];

if(empty($mobile)){
    $vmobile="You must enter mobile no."."<br>";
    $ok=false;
  }
  else
  {
       
     if(!is_numeric($mobile)) {
        $vmobile="Mobile number should be collection of digit";
        $ok=false;
    }

    else if(strlen($mobile)!=11)
    {
        $vmobile="Mobile number should be 11 digit";
        $ok=false;

    }

    else if($mobile[0]!='0' || $mobile[1]!='1')
    {
        $vmobile="First two digit of mobile number should be 01";
        $ok=false;
    }
    else if($mobile[2]=='0' || $mobile[2]=='1' || $mobile[2]=='2' )
    {
        $vmobile="Your mobile number's 3rd digit  does not represent a valid operator";
        $ok=false;
    }


  }

  $date=$_REQUEST["date"];
  if(empty($date)){
    $vdate="You must enter birth date"."<br>";
    $ok=false;
  }

  $designation=$_REQUEST["designation"];
  if(empty($designation)){
    $vdesignation="You must enter designation"."<br>";
    $ok=false;
  }

  if(isset($_REQUEST["gender"]))
  {
    $gender=$_REQUEST["gender"];
  }


  if(!isset($_REQUEST["gender"])){
    $vgender="You must enter your gender"."<br>";
    $ok=false;
  }



if($ok==true)
    {
      $table="users";
      $mydata=new db();
      $connectionstring=$mydata ->OpenCon();
      $sql="INSERT INTO users(access_status,user_type,username,password) VALUES('pending','teacher','$username','$password')";
     if($connectionstring->query($sql)===TRUE)
     {
        $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND password='".$password."'");

        if($sql->num_rows > 0)
          {
              $row=$sql->fetch_assoc();
              $id=$row['id'];
              $sql="INSERT INTO teachers(id,first_name,last_name,gender,access_status,username,password,email,phone,dob,due_salary,designation) VALUES($id,'$name1','$name2','$gender','pending','$username','$password','$email','$mobile','$date',0,'$designation')";
             if($connectionstring->query($sql)===TRUE)
               {
                   echo "Account created successfully";
                   header("Location:../view/login_view.php");
               }
              else
              {
                  echo "Error: ".$sql."<br>".$connectionstring-->error;
              }
          }


     }
        else
        {
          echo "Error: ".$sql."<br>".$connectionstring-->error;
        }
        $mydata->CloseCon($connectionstring);
    }

}
?>