<?php
session_start();
include "../model/db_model.php";
$userprofileinfo;

    $connection=new db();
    $connobj=$connection->OpenCon();
    $userquery=$connection->admin_getuserbyid($connobj,"admins",$_SESSION["id"]);
    $userprofileinfo=$userquery;
    $connection->CloseCon($connobj);

    if(isset($_REQUEST["update"]))
    {
        $imnage="";
        $username=$_SESSION["username"];
        if(isset($_FILES["pic1"])  && $_FILES["pic1"]["name"]!="")
        {
            //echo "are eikhaneo to aise";
            $target_file=$_FILES["pic1"]["tmp_name"];
            $allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
            $name=$_FILES["pic1"]["name"];
            $ext=pathinfo($name, PATHINFO_EXTENSION);
            //echo $ext;

            if(!in_array($ext,$allowed) ) {
                    echo "<h4>Please insert an image file</h4>";
                }
            else
            {
                $imnage=$username.".".$ext;
                $_FILES["pic1"]["name"]=$imnage;
                $target_file="../files/images/".$_FILES["pic1"]["name"];
                if(move_uploaded_file($_FILES["pic1"]["tmp_name"],$target_file))
                {
                    //$validatepic="<h4>Image uploaded successfully</h4>";
                    $_SESSION["password"]=$_REQUEST["password"];
                    $_SESSION["first_name"]=$_REQUEST["fname"];
                    $_SESSION["last_name"]=$_REQUEST["lname"];
                    $_SESSION["user_image"]=$imnage;
                    $connection=new db();
                    $connobj=$connection->OpenCon();
                    $qr=$connection->admin_updateprofile($connobj,$_SESSION['id'],$_REQUEST["fname"],$_REQUEST["lname"],$_REQUEST["password"],$_REQUEST["gender"],$_REQUEST["email"],$_REQUEST["mobile"],$_REQUEST["dob"],$imnage);
                    $connection->CloseCon($connobj);

                }
            }
        }
        else
        {
            $imnage=$_SESSION["user_image"];
            $_SESSION["password"]=$_REQUEST["password"];
            $_SESSION["first_name"]=$_REQUEST["fname"];
            $_SESSION["last_name"]=$_REQUEST["lname"];
            $_SESSION["user_image"]=$imnage;
            $connection=new db();
            $connobj=$connection->OpenCon();
            $qr=$connection->admin_updateprofile($connobj,$_SESSION['id'],$_REQUEST["fname"],$_REQUEST["lname"],$_REQUEST["password"],$_REQUEST["gender"],$_REQUEST["email"],$_REQUEST["mobile"],$_REQUEST["dob"],$imnage);
            $connection->CloseCon($connobj);
        }
    }
?>