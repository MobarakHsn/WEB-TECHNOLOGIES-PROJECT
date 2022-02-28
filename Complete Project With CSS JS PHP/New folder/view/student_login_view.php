<?php
include "../control/login_control.php";

   echo "Password has been changed successfully please login again with your new password";

   if(!isset($_SESSION["username"]) || !isset($_SESSION["password"]))
   {
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
           
       }
       else
       {
   
       }
   }
   
?>
<html>
    <head>
        <title>
            XYZ University Portal | login
        </title>
        <body>
            <h1>
                Login
            </h1>
            <a href="create_account_view.php">Create an account.</a>
            <hr>
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Enter username: </td>
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
                        <td>Enter password: </td>
                        <?php $autofil=admin_fillpassword();?>
                        <td><input type="password" name="password" value=<?php echo $autofil; ?>></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                echo $validatepassword;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                echo $error;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Remember me
                        </td>
                        <td>
                            <input type="checkbox"  name="cookies" value="save">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="submit">
                            <input type="reset" valeue="reset">
                        </td>
                    </tr>
                   
                </table>
            </form>
        </body>
    </head>
</html>