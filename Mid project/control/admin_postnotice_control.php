<?php
$validatenotice="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_REQUEST["notice_text"]))
    {
        $validatenotice="<h4>Notice is empty.<h4>";
    }
    else if(isset($_SESSION["notice"]))
    {
        $formdata=array(
            $_SESSION["notice"]=>$_REQUEST["notice_text"]
        );

        $jsondata=json_encode($formdata,JSON_PRETTY_PRINT);
        if(file_put_contents("../files/notices.json",$jsondata))
        {
            $validatenotice="<h4>Notice successfully posted<h4>";
        }
        else
        {
            $validatenotice="<h4>Sorry, notice can not be posted at this moment<h4>";
        }
    }
}
?>