<?php
session_start();
include "../control/student_registrationvalidation_control.php";
if(!isset($_SESSION['usertype']) || $_SESSION['usertype']!="Student")
{
    
    header("Location:login_view.php");
}

if(isset($_SESSION["username"])  && isset($_SESSION["password"]))
{
    if($_SESSION["user_type"]=='admin')
    {
        header("Location:admin_homepage_view.php");
    }
    else if($_SESSION["user_type"]=="teacher")
    {
        if($_SESSION["designation"]=="Director")
        {
            header("Location:teacher_director_homepage_view.php");
        }
        else 
        {
            header("Location:teacher_homepage_view.php");
        }
    }
    else if($_SESSION["user_type"]=="student")
    {
        header("Location:student_homepage_view.php");
    }
    else if($_SESSION["user_type"]=="librarian")
    {

    }
}



?>
<!DOCTYPE html>
<head>
    <title>Form</title>
</head>
<body>
 <table>
 
 <form action="" method="post">
   
  
    <h1>Create a new account</h2><hr/>

    <tr>
        <td>First Name:</td></tr>
        <td><input type="text" name="fname" placeholder="First name"></td>
        <td><?php echo  $vvalidatename; ?><br></td>
       
       

<tr>
        <td>Last Name:</td></tr>
        <td><input type="text" name="lname" placeholder="Last name" ></td>
    
        <td><?php echo  $vvalidatelname; ?><br></td>
       


<tr>
        <td>Username:</td></tr>
        <td><input type="text" name="uname" placeholder="Username"></td>    
        <td><?php echo   $vusername; ?><br></td> 

        <tr>
        <td>Date of Birth:</td></tr>
        <td><input type="date" name="date_of_birth"></td>
        <td><?php echo  $vvalidatedob; ?><br></td> 
        <tr>
    <td> Gender:</td> </tr>  
    <td> 
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <td><?php echo  $vvalidateradio; ?><br></td> 
</td>
   
       

<tr>
        

        <td>Password:</td></tr>
        <td><input type="password" name="password" placeholder="Password"></td>
        
        <td><?php echo  $vpassword; ?><br></td> 


<tr>
        <td>Email:</td></tr>
        <td><input type="email" name="email" placeholder="Email"></td>
        <td><?php echo  $vvalidateemail; ?><br></td> 

<tr>
        <td>Phone:</td></tr>
        <td><input type="phone" name="phone" placeholder="Phone Number"></td>
        <td><?php echo  $vvalidatephone; ?><br></td> 
<tr>
<td>Select a Department:</td></tr>
<td>
  <select id="department" name="department">
    <option value="cse">CSE</option>
    <option value="eee">EEE</option>
    <option value="bba">BBA</option>
    <td><?php echo  $vvalidatedept ?></td> 
  </select>
</td>

<tr>
    <td>Select a Program:</td></tr>  
    <td> 
    <input type="radio" name="program" value="Graduate"> Graduate
    <input type="radio" name="program" value="Undergraduate"> Undergraduate</td>
    <td><?php echo  $vvalidateprogram; ?><br></td> 
  
   
  
   


  
<tr><td><br><input type="submit" value="             Create              "></td></tr>

                          
 







</table>
            </form>
        </body>
    
</html>