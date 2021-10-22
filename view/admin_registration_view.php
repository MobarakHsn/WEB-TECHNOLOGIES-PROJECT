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
    else if($_SESSION["user_type"]=='teacher')
    {

    }
    else if($_SESSION["user_type"]=="student")
    {

    }
    else
    {

    }
}
?>
<html>
    <body>
        <h1>Please fill up the form</h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="fname"></td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo $validatefname;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="lname"></td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo $validatelname;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="Male">
                        <label for="gender">Male</label>
                        <input type="radio" name="gender" value="Female">
                        <label for="gender">Female</label>
                    </td> 
                </tr>
                <tr>
                    <td>
                        <?php echo $validategender;?>
                    </td>
                </tr>
                <tr>
                    <td>username:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo $validateusername;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo $validatepassword;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo $validateemail;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Mobile No:</td>
                    <td>
                        <input type="text" name="mobile">
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo $validatemobile;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td>
                        <input type="date" name="dob">
                    </td> 
                </tr>
                <tr>
                    <td>
                        <?php
                            echo $validatedob;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="role">Choose role:</label></td>
                    <td>
                        <select name="role">
                            <option value="admin">Admin</option>
                            <option value="super_admin">Super Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo $validaterole;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Create account">
                    </td>
                </tr>
                <tr>
                    <td>
                        Already have an account?
                    </td>
                    <td>
                        <a href="login_view.php">login</a> 
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php include "admin_footer_view.php"; ?>