<?php
include "../view/student_registeredcourses_view.php";


$table="students";
$course="";
$msg="";
$mydata=new db();
$connectionstring=$mydata ->OpenCon();
$username=$_SESSION["username"];
$department=$_SESSION["department"];
$course="";

$capacity="40";
$status="Open";



$var="Offered Courses:";
$ct=0;
$arrlength = count($courses);
echo "<h4><u>".$var."</u></h4>";
echo "<table><tr><th>|Course|</th><th>|Status|</th><th>|Capacity|</th><th>|Student Count|</th><th>|Department|</th></tr>";
for($x = 0; $x < $arrlength; $x++) {
  $course=$courses[$x];
 
  $sql=$connectionstring->query("SELECT * FROM subjects WHERE course_name= '$course' AND department='$department'");
  if($sql->num_rows > 0)
  {
   
     $ct=$ct+1; 
      $row=$sql->fetch_assoc();
     
      echo "<tr><td>".$course."</td><td>".$status."</td><td>".$capacity."</td><td>".$row["student_count"]."</td><td>".$department."</td></tr>";
      echo "<br>";
}}

if($ct==0){
  echo "No course is available";
}
  
  


  

















$connectionstring->close();
?>
