<?php
include "../control/login_control.php";
include "admin_header_view.php";
if(isset($_SESSION["username"])  && isset($_SESSION["password"]))
{
    if($_SESSION["user_type"]=='admin')
    {
        header("Location:admin_homepage_view.php");
    }
    else if($_SESSION["user_type"]=='teacher')
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
    else
    {

    }
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/admin/admin_css.css">
        <title>
            XYZ University Portal | login
        </title>
    </head>
    <body>
        <h1 style="color:blue;">
            &nbsp Login
        </h1>
        <!-- <a href="create_account_view.php">Create an account.</a> -->
        <a href="create_account_view.php" class="linkBtn gobackBtn">Create an account </a>
        <hr>
        <form action="" onsubmit="return validatelogin()" method="post">
            <div class="box1">
                    <?php //$error=""; ?>
                    <div class="lg"><input id="loginUserName" type="text" name="username" placeholder="User Name"></div>
                    <?php
                        //echo $validateusername;
                    ?>
                    <h4 id="validateLoginUserName"></h4>
                    <div class="lg"><?php $autofil=admin_fillpassword();?><input type="password" id="loginPassword" name="password" placeholder="Password" value=<?php echo $autofil; ?>></div>
                    <?php
                       // echo $validatepassword;
                    ?>
                    <h4 id="validateLoginPassword"></h4>
                    <?php
                        echo $error;
                    ?>
                    <button class="button1" type="submit" name="login">Login</button>
                    <label>
                        <input type="checkbox"  name="cookies"> Remember me
                    </label>
            </div>
        </form>
        <script src="../js/admin/admin_js.js"></script>
    </body>
</html>
<?php include "admin_footer_view.php"; ?>