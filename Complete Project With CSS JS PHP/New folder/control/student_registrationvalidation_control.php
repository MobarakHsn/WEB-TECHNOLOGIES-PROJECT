<?php
include('../model/student_db_model.php'); 
$validatename="";   $validatelname=""; $validateuname=""; $validatedob=""; $validateradio="";$password=""; $validateemail=""; $validatephone="";$validateprogram="";$validatedept="";
$check=0;   $username="";
$vvalidatename="";   $vvalidatelname=""; $vvalidateuname=""; $vvalidatedob=""; $vvalidateradio="";$vpassword=""; $vvalidateemail=""; $vvalidatephone="";$vvalidateprogram="";$vvalidatedept="";
 $vusername="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $fname=$_REQUEST["fname"];
    $lname=$_REQUEST["lname"];
    if(empty($_REQUEST["fname"]))
{
    $vvalidatename= "You must enter your First Name";

}
    else if (!preg_match("/^[a-zA-Z ]*$/",$fname)){
    $vvalidatename= "First Name should be alphabet"; 
}
else
{
    $validatename=$_REQUEST["fname"];
    $check=$check+1;
}

if(empty($_REQUEST["lname"]))
{
    $vvalidatelname= "You must enter your Last Name";

}
else if (!preg_match("/^[a-zA-Z ]*$/",$lname)){
    $vvalidatelname= "Last Name should be alphabet"; 
}
else
{
    $validatelname=$_REQUEST["lname"];
    $check=$check+1;
}

if(empty($_REQUEST["uname"])){
    $vusername="You must enter username"."<br>";
  }

  else{

    if (is_numeric($_REQUEST["uname"])){
        $vusername="Invalid username"; 
    }
    else{
          $table="users";
          $access_status="active";
          $mydata=new db();
          $connectionstring=$mydata ->OpenCon();
          $username= $_REQUEST["uname"]; 
          $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND access_status='".$access_status."'");
          if($sql->num_rows > 0)
           {
               $vusername="Username is already taken try another one";   
             
           }
           else{   $check=$check+1;}
    }
    

  }

if(empty($_REQUEST["date_of_birth"]))
{
    $vvalidatedob= "You must enter your Date Of Birth";

}
else{
    $validatedob=$_REQUEST["date_of_birth"];
    $check=$check+1;
}
if(isset($_REQUEST["gender"]))
{
    $validateradio= $_REQUEST["gender"];
    $check=$check+1;
}
else{
    $vvalidateradio= "  Please select your Gender";
}

if(empty($_REQUEST["password"])){
    $vpassword="You must enter password"."<br>";
    
  }
  else{
    if((strlen($_REQUEST["password"])) <8){
  
      $vpassword="Password should be at least 8 characters in length."."<br>";
  
    }
    else{ 
           $password=$_REQUEST["password"];
           $check=$check+1;}
  }

  if(empty($_REQUEST["email"])){
    $vvalidateemail="You must enter Email";
  } 
  else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_REQUEST["email"]))
  {
      $vvalidateemail="Email is not valid";
  }
  else{
      $validateemail= $_REQUEST["email"];
      $check=$check+1;
  }

  if(empty($_REQUEST["phone"])){
    $vvalidatephone="You must enter your Phone Number";
}
else if(!is_numeric($_REQUEST["phone"])) {
    $vvalidatephone="Phone Number should be numeric";
}
else {
    $validatephone=$_REQUEST["phone"];
    $check=$check+1;
}

if(isset($_REQUEST["program"]))
{
    $validateprogram= $_REQUEST["program"];     $check=$check+1;
}
else{
    $vvalidateprogram= "Please select a Program";
}
if(isset($_REQUEST["department"]))
{
    $validatedept= $_REQUEST["department"];    $check=$check+1;
}


if($check==10)
    {

        $table="users";
        $mydata=new db();
        $connectionstring=$mydata ->OpenCon();
        $sql="INSERT INTO users(access_status,user_type,username,password) VALUES('pending','student','$username','$password')";
       if($connectionstring->query($sql)===TRUE)
       {
          $sql=$connectionstring->query("SELECT * FROM ".$table." WHERE username='".$username."' AND password='".$password."'");
  
          if($sql->num_rows > 0)
            {
                $row=$sql->fetch_assoc();
                $id=$row['id'];
                $sql="INSERT INTO students(	id, first_name, last_name, gender, access_status, username, password, email, phone, dob, due_fees, department, program) VALUES($id,'$validatename','$validatelname','$validateradio','pending','$username','$password','$validateemail','$validatephone','$validatedob',0,'$validatedept','$validateprogram')";
               if($connectionstring->query($sql)===TRUE)
                 {
                  
                        header("Location:../view/login_view.php");
                   
                 }
                else
                {
                    echo "Error: ".$sql."<br>".$connectionstring->error;
                }
            }
  
  
       }
          else
          {
            echo "Error: ".$sql."<br>".$connectionstring->error;
          }
          $connectionstring->close();
    
      }


    }
    ?>