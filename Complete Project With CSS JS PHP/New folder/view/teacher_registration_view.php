<?php include "../control/Teacher_registrationvalidation_control.php"; 

session_start();

if(!isset($_SESSION['usertype']) || $_SESSION['usertype']!="Teacher")
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
<html>
<body>
<title>
           Teacher | Registration
        </title>
 <table>
    <form action="" method="POST">
    <h1>Registration For Teacher</h2><hr/>
    <tr>
        <td>First Name:</td>
        <td><input type="text" name="fname"></td>
        <td><?php echo  $vfname; ?><br><br></td>
    </tr>
    <tr>
        <td>Last Name:</td>
        <td><input type="text" name="lname"></td>
        <td><?php echo  $vlname; ?><br><br></td>
    </tr>
    <tr>
        <td>Username:</td>
        <td><input type="text" name="username"></td>
        <td><?php echo  $vusername; ?><br><br></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><input type="email" name="email"></td>
        <td><?php echo  $vemail; ?><br><br></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input type="password" name="password"></td>
        <td><?php echo  $vpassword; ?><br><br></td>
    </tr>
    <tr>
      <td> Gender:</td>
      <td> 
      <input type="radio" name="gender" value="Male"> Male
      <input type="radio" name="gender" value="Female"> Female
      <td><?php echo  $vgender; ?><br><br></td>
      </td>
    </tr> 
    <tr>
        <td>Mobile No:</td>
        <td><input type="text" name="mobile"></td>
        <td><?php echo  $vmobile; ?><br><br></td>
    </tr>  

    <tr>
        <td>Date of Birth:</td>
        <td><input type="date" name="date"></td>
        <td><?php echo  $vdate; ?><br><br></td>

    </tr>
    <tr>
    <td>Designation:</td>
    <td>
    <select id="designation" name="designation">
    <option value="Director">Director</option>
    <option value="Professor">Professor</option>
    <option value="Assistant Professor">Assistant Professor</option>
    <option value="Associate Professor">Associate  Professor</option>
    <option value="Lecturer">Lecturer</option>
    <td><?php echo  $vdesignation; ?><br><br></td>
   </select>
   </td>
  </tr>
<tr>
<td>
<input type="submit" value="Insert Data">
</td>
</tr>
</table>
</form>
</body>
</html>