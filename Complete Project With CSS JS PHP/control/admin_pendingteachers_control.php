<?php
include "../model/db_model.php";

$connection=new db();
$connobj=$connection->OpenCon();
$result=$connection->admin_showpendingteachers($connobj,"pending");
$connection->CloseCon($connobj);


$validateaccept="";
$validatereject="";
$id="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_REQUEST["acceptid"]) && isset($_REQUEST["accept"]))
    {
        if(empty($_REQUEST["acceptid"]))
        {
            $validateaccept="<h4>Please enter an id</h4>";
        }
        else if(is_numeric($_REQUEST["acceptid"]))
        {
            $connection=new db();
            $connobj=$connection->OpenCon();
            $result=$connection->admin_getuserbyid($connobj,"teachers",$_REQUEST["acceptid"]);
            if($result->num_rows>0)
            {
                $row=$result->fetch_assoc();
                $id=$row["id"];
                if($row["access_status"]!="pending")
                {
                    $validateaccept="<h4>User is not pending<h4>";
                }
                else
                {
                    if($connection->admin_updateUserStatus($connobj,"users",$id,"active") && $connection->admin_updateUserStatus($connobj,"teachers",$id,"active"))
                    {
                        $validateaccept="<h4>User successfully accepted<h4>";
                    }
                    else
                    {
                        $validateaccept="<h4>Request unsuccessful<h4>";
                    }
                }
                
            }
            else
            {
                $validateaccept="<h4>Invalid Id.<h4>";
            }
            $connection->CloseCon($connobj);
        }
        else
        {
            $validateaccept="<h4>Please enter only numbers<h4>";
        }
    }

    if(isset($_REQUEST["rejectid"]) && isset($_REQUEST["reject"]))
    {
        if(empty($_REQUEST["rejectid"]))
        {
            $validatereject="<h4>Please enter an id</h4>";
        }
        else if(is_numeric($_REQUEST["rejectid"]))
        {
            $connection=new db();
            $connobj=$connection->OpenCon();
            $result=$connection->admin_getuserbyid($connobj,"teachers",$_REQUEST["rejectid"]);
            if($result->num_rows>0)
            {
                $row=$result->fetch_assoc();
                $id=$row["id"];
                if($row["access_status"]!="pending")
                {
                    $validatereject="<h4>User is not pending<h4>";
                }
                else
                {
                    if($connection->admin_updateUserStatus($connobj,"users",$id,"rejected") && $connection->admin_updateUserStatus($connobj,"teachers",$id,"rejected"))
                    {
                        $validatereject="<h4>User successfully rejected<h4>";
                    }
                    else
                    {
                        $validateaccept="<h4>Request unsuccessful<h4>";
                    }
                }
                
            }
            else
            {
                $validatereject="<h4>Invalid Id.<h4>";
            }
            $connection->CloseCon($connobj);
        }
        else
        {
            $validatereject="<h4>Please enter only numbers<h4>";
        }
    }
    $connection=new db();
    $connobj=$connection->OpenCon();
    $result=$connection->admin_showpendingteachers($connobj,"pending");
    $connection->CloseCon($connobj);

}

?>