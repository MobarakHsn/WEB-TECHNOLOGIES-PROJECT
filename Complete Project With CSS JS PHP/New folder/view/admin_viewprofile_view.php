<?php
include "admin_header_view.php";
include "../control/admin_viewprofile_control.php";
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
            XYZ University Portal | Admin | Profile
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
        <div id="slideshow1">
        <center>
        <fieldset class="fieldSetBorder" >
            <legend> <b style="color:blue;"> PROFILE </b> </legend>
            <?php $row=$userprofileinfo->fetch_assoc(); ?>
            <table border="0">
                <tr>
                    <td>
                        <b>First Name:</b>
                    </td>
                    <td colspan="2"> <?php echo $row['first_name'] ?></td>
                    <td rowspan="5">&nbsp &nbsp &nbsp &nbsp &nbsp</td>
                    <td>
                        <?php 
                                $path = '../files/images/'.$_SESSION['user_image']; 
                                echo '&nbsp &nbsp &nbsp &nbsp <img src="'.$path .'" alt="No Profile Picture" height="200px" width="200px" />';
                        ?>
					</td>
                </tr>
                <tr> <td colspan="2"> <hr> </td> </tr>
                <tr>
                    <td>
                        <b>ID:</b>
                    </td>
                    <td colspan="2">
                        <?php echo $row['id']; ?>
                    </td>
                </tr>
                <tr> <td colspan="2"> <hr> </td> </tr>
                <tr>
                    <td>
                        <b>Last Name:</b>
                    </td>
                    <td colspan="2">
                        <?php echo $row['last_name']; ?>
                    </td>
                </tr>
                <tr> <td colspan="2"> <hr> </td> </tr>
                <tr>
                    <td>
                        <b>Gender:</b>
                    </td>
                    <td colspan="2">
                        <?php echo $row['gender']; ?>
                    </td>
                </tr>
                <tr> <td colspan="2"> <hr> </td> </tr>
                <tr>
                    <td>
                        <b>Username:</b>
                    </td>
                    <td colspan="2">
                        <?php echo $row['username']; ?>
                    </td>
                </tr>
                <tr> <td colspan="2"> <hr> </td> </tr>
                <tr>
                    <td>
                        <b>Email:</b>
                    </td>
                    <td colspan="2">
                        <?php echo $row['email']; ?>
                    </td>
                </tr>
                <tr> <td colspan="2"> <hr> </td> </tr>
                <tr>
                    <td>
                        <b>Phone:</b>
                    </td>
                    <td colspan="2">
                        <?php echo $row['phone']; ?>
                    </td>
                </tr>
                <tr> <td colspan="2"> <hr> </td> </tr>
                <tr>
                    <td>
                        <b>Date of Birth:</b>
                    </td>
                    <td colspan="2">
                        <?php echo $row['dob']; ?>
                    </td>
                </tr>
                <tr> <td colspan="2"> <hr> </td> </tr>
                <tr>
                    <td>
                        <b>Role:</b>
                    </td>
                    <td colspan="2">
                        <?php echo $row['role']; ?>
                    </td>
                </tr>
                <tr> <td colspan="2"> <hr> </td> </tr>
                <tr>
                    <td colspan="2">  
                        <center> <a href="admin_useredit_view.php" class="linkBtn submitBtn" style="padding: 5px 20px"> Edit Profile </a> </center>
                    </td>
                </tr>
            </table>
        </fieldset>
        </center>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/admin/admin_js.js"></script>
    </body>
</html>
<?php include "admin_footer_view.php"; ?>
