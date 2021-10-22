<?php
include "../control/create_account_control.php";
include "admin_header_view.php";
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
    <head>
        <title>
            XYZ University Portal | Create account
        </title>
        <body>
            <h1>
                Create account
                <hr>
            </h1>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td><h3>Choose an user type:<h3></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="usertype" value="Admin">
                            <label for="usertype">Admin</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="usertype" value="Teacher">
                            <label for="usertype">Teacher</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="usertype" value="Librarian">
                            <label for="usertype">Librarian</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="usertype" value="Student">
                            <label for="usertype">Student</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $validateusertype; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="submit">
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
    </head>
</html>
<?php include "admin_footer_view.php"; ?>