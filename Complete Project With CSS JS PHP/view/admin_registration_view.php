<?php include "../control/admin_registration_control.php";
include "admin_header_view.php";
if(!isset($_SESSION['usertype']) || $_SESSION['usertype']!="Admin")
{
    echo $_SESSION['usertype'];
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
    </head>
    <body>
        <h1 style="color:blue;">Please fill up the form</h1>
        <hr>
        <center>
        <form action="" onsubmit="return validateregistration()" method="post" enctype="multipart/form-data">
            <table id="table2">
                <tr>
                    <td>First Name:</td>
                    <td><div class="lg">
                        <input type="text" placeholder="Enter First Name" name="fname" id="fname">
                        </div>
                    </td>
                    <td id="validatefname" class="error"></td>
                    <?php if($validatefname!="") { ?>
                    <td class="error">
                        <?php echo $validatefname;?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><div class="lg">
                        <input type="text" placeholder="Enter Last Name" name="lname" id="lname">
                        </div>
                    </td>
                    <td id="validatelname" class="error"></td>
                    <?php if($validatelname!="") { ?>
                    <td class="error">
                        <?php echo $validatelname;?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="Male" id="gender">
                        <label for="gender">Male</label>
                        <input type="radio" name="gender" value="Female" id="gender">
                        <label for="gender">Female</label>
                    </td> 
                    <td id="validategender" class="error"></td>
                    <?php if($validategender!="") { ?>
                    <td class="error">
                        <?php echo $validategender;?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><div class="lg">
                        <input type="text" placeholder="Username" name="username" id="username">
                        </div>
                    </td>
                    <td id="validateusername" class="error"></td>
                    <?php if($validateusername!="") { ?>
                    <td class="error">
                        <?php echo $validateusername;?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><div class="lg">
                        <input type="password" placeholder="Password" name="password" id="password">
                        </div>
                    </td>
                    <td id="validatepassword" class="error"></td>
                    <?php if($validatepassword!="") { ?>
                    <td class="error">
                        <?php echo $validatepassword;?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><div class="lg">
                        <input type="text" placeholder="Enter Email" name="email" id="email">
                        </div>
                    </td>
                    <td id="validateemail" class="error"></td>
                    <?php if($validateemail!="") { ?>
                    <td class="error">
                        <?php echo $validateemail;?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Mobile No:</td>
                    <td><div class="lg">
                        <input type="text" placeholder="Mobile No" name="mobile" id="mobile">
                        </div>
                    </td>
                    <td id="validatemobile" class="error"></td>
                    <?php if($validatemobile!="") { ?>
                    <td class="error">
                        <?php echo $validatemobile;?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td>
                        <input type="date" name="dob" id="dob">
                    </td> 
                    <td id="validatedob" class="error"></td>
                    <?php if($validatedob!="") { ?>
                    <td class="error">
                        <?php echo $validatedob;?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td><label for="role">Choose role:</label></td>
                    <td>
                        <select name="role">
                            <option value="admin">Admin</option>
                            <option value="super_admin">Super Admin</option>
                        </select>
                    </td>
                    <?php if($validaterole!="") { ?>
                    <td class="error">
                        <?php echo $validaterole;?>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Please choose a picture:</td>
                    <td>
                        <input type="file" name="pic" id="pic">
                    </td>
                    <?php if($validatepic!=""){  ?>
                    <td class="error">
                           <?php echo $validatepic; ?>
                    </td>
                    <?php } ?>
                    <td id="validatepic" class="error"></td>
                </tr>
                <tr>
                    <td>
                        <input class="button1 reset" type="reset">
                    </td>
                    <td>
                        <input class="button1" type="submit" value="Submit" id="submit">
                    </td>
                </tr>
            </table>
                <tr>
                    <td>
                        <b>Already have an account?<b>
                    </td>
                    <td>
                        <a href="login_view.php" class="linkBtn submitBtn" > Login </a>
                    </td>
                </tr>
            </table>
        </form>
        </center>
        <script src="../js/admin/admin_js.js"></script>
    </body>
</html>
<?php include "admin_footer_view.php"; ?>