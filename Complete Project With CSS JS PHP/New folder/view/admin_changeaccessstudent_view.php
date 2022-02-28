<?php
include "admin_header_view.php";
session_start();
include "../control/admin_changeaccessstudent_control.php";
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
            XYZ University Portal | Admin | Change access
        </title>
    </head>
    <body>
        <div class="sticky">
            <div class="topnav">
                <a href="admin_homepage_view.php">Home</a>
                <a href="../control/admin_logout_control.php" class="logoutcolor">Logout</a>
            </div>
        </div>
        <hr>
        <form action="" method="POST">
            <h4>Active Students<h4>
            <table id="table1">
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Access Status</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Due Fees</th>
                    <th>Department</th>
                    <th>Program</th>
                </tr>
                    <?php if($active->num_rows>0){ ?>
                    <?php while($row=$active->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["first_name"]; ?></td>
                            <td><?php echo $row["last_name"]; ?></td>
                            <td><?php echo $row["gender"]; ?></td>
                            <td><?php echo $row["access_status"]; ?></td>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["phone"]; ?></td>
                            <td><?php echo $row["dob"]; ?></td>
                            <td><?php echo $row["due_fees"]; ?></td>
                            <td><?php echo $row["department"]; ?></td>
                            <td><?php echo $row["program"]; ?></td>
                        </tr>
                    <?php }} ?>
            </table>
            <table>
                <tr>
                    <td>
                        Enter an id from the above table to block a student:
                    </td>
                    <td>
                        <input type="text" name="blockid">
                    </td>
                    <td>
                        <input type="submit" class="rejectBtn" name="block" value="Block Access">
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $validateblock; ?>
                    </td>
                </tr>
            </table>
            <br><br><br>
            <h4>Blocked Students<h4>
            <table id="table1">
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Access Status</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Due Fees</th>
                    <th>Department</th>
                    <th>Program</th>
                </tr>
                    <?php if($blocked->num_rows>0){ ?>
                    <?php while($row=$blocked->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["first_name"]; ?></td>
                            <td><?php echo $row["last_name"]; ?></td>
                            <td><?php echo $row["gender"]; ?></td>
                            <td><?php echo $row["access_status"]; ?></td>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["phone"]; ?></td>
                            <td><?php echo $row["dob"]; ?></td>
                            <td><?php echo $row["due_fees"]; ?></td>
                            <td><?php echo $row["department"]; ?></td>
                            <td><?php echo $row["program"]; ?></td>
                        </tr>
                    <?php }} ?>
            </table>
            <table>
                <tr>
                    <td>
                        Enter an id from the above table to active a student:
                    </td>
                    <td>
                        <input type="text" name="activeid">
                    </td>
                    <td>
                        <input type="submit" class="submitBtn" name="active" value="Active Access">
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $validateactive; ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php include "admin_footer_view.php"; ?>