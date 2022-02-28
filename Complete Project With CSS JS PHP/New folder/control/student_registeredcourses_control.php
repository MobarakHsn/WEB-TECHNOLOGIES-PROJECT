<?php 
include "../model/student_db_model.php";
$table="students";
$course="";
$msg="";
$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$username=$_SESSION["username"];

$courses; $p=-1;
$sql=$connectionstring->query("SELECT * FROM ac WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="AC";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
    
}
else{
    $p=$p+1;
    $courses[$p]="AC";
}
$sql=$connectionstring->query("SELECT * FROM accounting WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Accounting";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
    
}
else{
    $p=$p+1;
    $courses[$p]="Accounting";
}
$sql=$connectionstring->query("SELECT * FROM algorithms WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Algorithms";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
    
}
else{
    $p=$p+1;
    $courses[$p]="Algorithms";
}
$sql=$connectionstring->query("SELECT * FROM compiler_design WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Compiler_Design";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
}
else{
    $p=$p+1;
    $courses[$p]="Compiler_Design";
}
$sql=$connectionstring->query("SELECT * FROM data_structure WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Data_Structure";
    $row=$sql->fetch_assoc();
    echo "<tr><td>".$course."</td></tr><br>";
    
}
else{
    $p=$p+1;
    $courses[$p]="Data_Structure";
}
$sql=$connectionstring->query("SELECT * FROM dc WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="DC";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
    
}
else{
    $p=$p+1;
    $courses[$p]="DC";
}
$sql=$connectionstring->query("SELECT * FROM economics WHERE username='$username'");

if($sql->num_rows > 0)
{
    $course="Economics";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
}
else{
    $p=$p+1;
    $courses[$p]="Economics";
}

$sql=$connectionstring->query("SELECT * FROM web_technologies WHERE username='$username'");

if($sql->num_rows > 0)
{
 
    $course="Web_Technologies";
    $row=$sql->fetch_assoc();
   
    echo "<tr><td>".$course."</td></tr><br>";
    
}
else{
    $p=$p+1;
    $courses[$p]="Web_Technologies";
}














$connectionstring->close();
?>
