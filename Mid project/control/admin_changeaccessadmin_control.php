<?php
include "../model/db_model.php";
function admin_showadmins($status)
{
    $connection=new db();
    $connobj=$connection->OpenCon();
    $connection->admin_showpendingadmins($connobj,$status);
    $connection->CloseCon($connobj);
}

$validateactive="";
$validateblock="";
$id="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{

    if(isset($_REQUEST["activeid"]) && isset($_REQUEST["active"]))
    {
        if(empty($_REQUEST["activeid"]))
        {
            $validateactive="<h4>Please enter an id</h4>";
        }
        else if(is_numeric($_REQUEST["activeid"]))
        {
            $connection=new db();
            $connobj=$connection->OpenCon();
            $result=$connection->admin_getuserbyid($connobj,"admins",$_REQUEST["activeid"]);
            if($result->num_rows>0)
            {
                $row=$result->fetch_assoc();
                $id=$row["id"];
                if($row["access_status"]!="blocked")
                {
                    $validateactive="<h4>User is not blocked<h4>";
                }
                else if($row["id"]===$_SESSION["id"])
                {
                    $validateactive="<h4>You cannot active/block yourself<h4>";
                }
                else
                {
                    if($connection->admin_updateUserStatus($connobj,"users",$id,"active") && $connection->admin_updateUserStatus($connobj,"admins",$id,"active"))
                    {
                        $validateactive="<h4>User successfully been active<h4>";
                    }
                    else
                    {
                        $validateactive="<h4>Request unsuccessful<h4>";
                    }
                }
                
            }
            else
            {
                $validateactive="<h4>Invalid Id.<h4>";
            }
            $connection->CloseCon($connobj);
        }
        else
        {
            $validateactive="<h4>Please enter only numbers<h4>";
        }
    }

    if(isset($_REQUEST["blockid"]) && isset($_REQUEST["block"]))
    {
        if(empty($_REQUEST["blockid"]))
        {
            $validateblock="<h4>Please enter an id</h4>";
        }
        else if(is_numeric($_REQUEST["blockid"]))
        {
            $connection=new db();
            $connobj=$connection->OpenCon();
            $result=$connection->admin_getuserbyid($connobj,"admins",$_REQUEST["blockid"]);
            if($result->num_rows>0)
            {
                $row=$result->fetch_assoc();
                $id=$row["id"];
                if($row["access_status"]!="active")
                {
                    $validateblock="<h4>User is not active<h4>";
                }
                else if($row["id"]===$_SESSION["id"])
                {
                    $validateblock="<h4>You cannot active/block yourself<h4>";
                }
                else
                {
                    if($connection->admin_updateUserStatus($connobj,"users",$id,"blocked") && $connection->admin_updateUserStatus($connobj,"admins",$id,"blocked"))
                    {
                        $validateblock="<h4>User successfully been blocked<h4>";
                    }
                    else
                    {
                        $validateblock="<h4>Request unsuccessful<h4>";
                    }
                }
                
            }
            else
            {
                $validateblock="<h4>Invalid Id.<h4>";
            }
            $connection->CloseCon($connobj);
        }
        else
        {
            $validateblock="<h4>Please enter only numbers<h4>";
        }
    }
}

?>