<?php
$notice="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_REQUEST["assignment"]))
    {
        $notice="Assignment Cannot be empty";
    }
    else 
    {
        $formdata=array(
            'Assignment no **:'=>$_REQUEST["assignment"]
        );

        $jsondata=json_encode($formdata,JSON_PRETTY_PRINT);
        if(file_put_contents("../files/Assignment.json",$jsondata))
        {
            $notice="Assignment Posted";
        }
        else
        {
            $notice="Assignment posted error";
        }
    }
}
?>