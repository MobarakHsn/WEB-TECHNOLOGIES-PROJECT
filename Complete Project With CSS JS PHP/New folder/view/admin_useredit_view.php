<?php
include "admin_header_view.php";
include "../control/admin_useredit_control.php";

if(!isset($_SESSION["user_type"]))
{
    header("Location:login_view.php");
}
else if(!isset($_SESSION["username"]) || !isset($_SESSION["password"]))
{
    header("Location:login_view.php");
}
else
{
    if($_SESSION["user_type"]=="teacher")
    {
        header("Location:teacher_homepage_view.php");
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
    <head>
        <link rel="stylesheet" type="text/css" href="../css/admin/admin_css.css">
        <title>
            XYZ University Portal | Admin | Edit Profile
        </title>
    </head>
    <body>
        <div class="sticky">
            <div class="topnav">
                <a href="admin_homepage_view.php">Home</a>
                <a href="../control/admin_logout_control.php" class="logoutcolor">Logout</a>
            </div>
        </div>
        <br><br>
        <center>
            <form method="post" onsubmit="return validateedit()"  enctype="multipart/form-data">
                <fieldset class="fieldSetBorder" >
                    <legend> <b style="color:#c746c7;">EDIT PROFILE </b> </legend>
                    <?php $row=$userprofileinfo->fetch_assoc(); ?>
                    <table border="0">
                        <tr>
                            <td>
                                <b>First Name:</b>
                            </td>
                            <td colspan="2"><input type="text" name="fname"  id="fname" value="<?php echo $row['first_name']; ?>"></td>
                            <td id="validatefname" class="error"></td>
                            <td rowspan="5">&nbsp &nbsp &nbsp &nbsp &nbsp</td>
                            <td>
                                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <b> Upload Photo</b>
                                <br><br>
                                <?php 
                                        $path = '../files/images/'.$_SESSION['user_image']; 
                                        echo '&nbsp &nbsp &nbsp &nbsp <img src="'.$path .'" alt="No Profile Picture" height="200px" width="200px" />';
                                ?>
                                <br> <br>
								&nbsp &nbsp &nbsp &nbsp &nbsp <input type="file" name="pic1">
                            </td>
                        </tr>
                        <tr> <td colspan="2"> <hr> </td> </tr>
                        <tr>
                            <td>
                                <b>Last Name:</b>
                            </td>
                            <td colspan="2"><input type="text" name="lname"  id="lname" value="<?php echo $row['last_name']; ?>"></td>
                            <td id="validatelname" class="error"></td>
                        </tr>
                        <tr> <td colspan="2"> <hr> </td> </tr>
                        <tr>
                            <td>
                                <b>Password:</b>
                            </td>
                            <td colspan="2"><input type="password" name="password"  id="password" value="<?php echo $row['password']; ?>"></td>
                            <td id="validatepassword" class="error"></td>
                        </tr>
                        <tr> <td colspan="2"> <hr> </td> </tr>
                        <tr>
                            <td>
                                <b>Gender:</b>
                            </td>
                            <td colspan="2">
                                <?php $male=$female=""; ?>
                                <?php if($row['gender']=='Male') $male="checked"; ?>
                                <?php if($row['gender']=='Female') $female="checked"; ?>
                                <input type='radio' id="gender" name='gender' value='Male'<?php echo $male; ?>>Male
                                <input type='radio' id="gender" name='gender' value='Female' <?php echo $female; ?> >Female
                            </td>
                        </tr>
                        <tr> <td colspan="2"> <hr> </td> </tr>
                        <tr>
                            <td>
                                <b>Email:</b>
                            </td>
                            <td colspan="2"><input type="text" name="email"  id="email" value="<?php echo $row['email']; ?>"></td>
                            <td id="validateemail" class="error"></td>
                        </tr>
                        <tr> <td colspan="2"> <hr> </td> </tr>
                        <tr>
                            <td>
                                <b>Phone:</b>
                            </td>
                            <td colspan="2"><input type="text" name="mobile"  id="mobile" value="<?php echo $row['phone']; ?>"></td>
                            <td id="validatemobile" class="error"></td>
                        </tr>
                        <tr> <td colspan="2"> <hr> </td> </tr>
                        <tr>
                            <td>
                                <b>Date of Birth:</b>
                            </td>
                            <td colspan="2"><input type="date" name="dob"  id="dob" value="<?php echo $row['dob']; ?>"></td>
                            <td id="validatedob" class="error"></td>
                        </tr>
                        <tr> <td colspan="2"> <hr> </td> </tr>
                        <tr>
                            <td colspan="2">  
                                <center> <input type="submit" name="update" value="Update" class="submitBtn" style="padding: 5px 20px"></center>
                            </td>
                        </tr>

                    </table>

                </fieldset>
            </center>
        </form>
        <script src="../js/admin/admin_js.js"></script>
    </body>
</html>
<?php include "admin_footer_view.php"; ?>