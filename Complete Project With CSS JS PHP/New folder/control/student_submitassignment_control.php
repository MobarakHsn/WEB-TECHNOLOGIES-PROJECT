<?php
$validatemsg="";
$username=$_SESSION["username"];
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_REQUEST["myassignment"]))
    {
        $validatemsg="Submit a assignment";
    }
    else 
    {
        $formdata=array(
            $username=>$_REQUEST["myassignment"]
        );

        $jsondata=json_encode($formdata,JSON_PRETTY_PRINT);
        if(file_put_contents("../files/student_assignment.json",$jsondata))
        {
            $validatemsg="Assignment Submitted";
        }
        else
        {
            $validatemsg="Error";
        }
    }
}
?>