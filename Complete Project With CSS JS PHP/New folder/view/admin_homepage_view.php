<?php
include "../control/admin_homepage_control.php";
include "admin_homepageheader_view.php";
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
            XYZ University Portal | Admin | Home
        </title>
    </head>
        <body>
            <div class="sticky">
            <div class="navbar">
                <a href="admin_homepage_view.php">Home</a>
                <a href="admin_viewnotice_view.php">View Notice</a>
                <a href="admin_viewprofile_view.php">Profile</a>
                    <div class="dropdown">
                        <button class="dropbtn">View All </button>
                        <div class="dropdown-content">
                        <a href="admin_viewadmins_view.php">Admins</a>
                        <a href="admin_viewteachers_view.php">Teachers</a>
                        <a href="admin_viewstudents_view.php">Students</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Pending Requests</button>
                        <div class="dropdown-content">
                        <a href="admin_pendingadmins_view.php">Admins Pending Requests</a>
                        <a href="admin_pendingteachers_view.php">Teachers Pending Requests</a>
                        <a href="admin_pendingstudents_view.php">Students Pending Requests</a>
                        </div>
                    </div> 
                    <div class="dropdown">
                        <button class="dropbtn">Change Access</button>
                        <div class="dropdown-content">
                        <a href="admin_changeaccessadmin_view.php">Admins</a>
                        <a href="admin_changeaccessteacher_view.php">Teachers</a>
                        <a href="admin_changeaccessstudent_view.php">Students</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Manage Notices</button>
                        <div class="dropdown-content">
                        <a href="../control/admin_postadminnotice_control.php">Post a notice for admins</a>
                        <a href="../control/admin_postteachernotice_control.php">Post a notice for teachers</a>
                        <a href="../control/admin_poststudentnotice_control.php">Post a notice for students</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">View Due</button>
                        <div class="dropdown-content">
                        <a href="admin_duefees_view.php">Fees of Students</a>
                        <a href="admin_duesalary_view.php">Salary of Teachers</a>
                        </div>
                    </div> 
                    <a  class="logoutcolor" href="../control/admin_logout_control.php">Logout</a>
                    </div>
            </div>
            <br>
            <hr class="new">
            <br><br>
            <fieldset class="fieldSetBorder" >
                <legend> <b style="color:#D8000C;"> PENDING REQUESTS </b> </legend>
                <button class="submitBtn" id="show1">Show</button>
                <button class="rejectBtn" id="hide1">Hide</button>
                <center>
                <table id="table1" class="table1">
                    <tr>
                        <th>
                            Pending Requests
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Admin request pendings
                        </td>
                        <td>
                            <?php echo $totalpendingadmins;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Teacher request pendings
                        </td>
                        <td>
                            <?php echo $totalpendingteachers;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Student request pendings
                        </td>
                        <td>
                            <?php echo $totalpendingstudents;?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Total request pendings</h4>
                        </td>
                        <td>
                            <h4><?php echo $total;?></h4>
                        </td>
                    </tr>
            </table>
            </center>
        </fieldset>
        <br><br><br><br>
        <fieldset class="fieldSetBorder1" >
        <legend> <b style="color:#c7468d;">STUDENT ***LIVE SEARCH***</b> </legend>
        <br>
            <form method="post">
                <table>
                    <tr>
                        <td>Enter Id:</td>
                        <td><input type="text" name="id" id="id" onkeyup="showResult()"></td>
                    </tr>
                    <tr>
                        <td>Enter First/Last Name:</td>
                        <td><input type="text" name="name" id="name" onkeyup="showResult()" ></td>
                    </tr>
                </table>
                <p id="msg">Searching..</p>
                <p id="result"></p>
            </from> 
            </body>
        </fieldset>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/admin/admin_js.js"></script>
    </body>
</html>
<?php include "admin_footer_view.php"; ?>