<?php
include "../control/admin_homepage_control.php";
include "admin_header_view.php";
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

    }
    else if($_SESSION["user_type"]=="student")
    {
        
    }
    else if($_SESSION["user_type"]=="librarian")
    {

    }
}
?>


<html>
    <head>
        <title>
            XYZ University Portal | Admin | Home
        </title>
        <body>
            <p>
                <?php echo "<h3>Welcome,".$_SESSION["first_name"]." ".$_SESSION["last_name"]."</h3>";?>
            </p>
            <strong><a href="admin_viewnotice_view.php">Notice</a> |<a href="admin_viewprofile_view.php">View Profile</a> | <a href="../control/admin_logout_control.php">Logout</a></strong> 
            <hr>
            <h4>You have these requests to handle:<h4>
            <?php admin_pendingtable();?>
            <form action="" method="GET">
                <table>
                    <br><br>
                    <tr>
                        <td><label for="pending_options_registration">Pending registration requests:</label></td>
                        <td>
                            <select name="pending_options_registration">
                                <option value="none">None-selected</option>
                                <option value="admin_pendings">All admins pending registration requests</option>
                                <option value="teacher_pendings">All teachers pending registration requests</option>
                                <option value="librarian_pendings">All librarians pending registration requests</option>
                                <option value="student_pendings">All students pending registration requests</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="pending_registration_submit" value="Go">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo  $validatepending;?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="change_access_list">Change access:</label></td>
                        <td>
                            <select name="change_access_list">
                                <option value="none">None-selected</option>
                                <option value="admin">Admins</option>
                                <option value="teacher">Teachers</option>
                                <option value="student">Students</option>
                                <option value="librarian">Libraian</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="change_access_submit" value="Go">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo  $validatechangeaccess;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Enter ID to check access status:
                        </td>
                        <td>
                            <input type="text" name="checkstatus">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="check" value="Check"><?php echo $validatecheck; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="notice">Manage notices:</label></td>
                        <td>
                            <select name="notice">
                                <option value="none">None-selected</option>
                                <option value="post_admin_notice">Post a notice for admins</option>
                                <option value="post_teacher_notice">Post a notice for techers</option>
                                <option value="post_student_notice">Post a notice for students</option>
                                <option value="post_librarian_notice">Post a notice for librarians</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $validatenotice;?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit_notice" value="Go">
                        </td>
                    </tr>
                </table>                        
            </form>
            <!-- <br>
            <h4>You have these requests to handle:<h4>
            <?php //admin_pendingtable();?> -->
        </body>
    </head>
</html>
<?php include "admin_footer_view.php"; ?>