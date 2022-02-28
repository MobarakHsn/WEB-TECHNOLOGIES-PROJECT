<?php
function shownotice()
{
    $data=file_get_contents("../files/notices.json");
    $normal_data=json_decode($data);
    if($_SESSION["user_type"]=="admin")
    {
        if(isset($normal_data->admin))
        {
            echo "<table border><tr><td>".$normal_data->admin."<br><br><br><br><br><br><br><br><br><br></td></tr></table>";
        }
    }
    else if($_SESSION["user_type"]=="teacher")
    {
        if(isset($normal_data->teacher))
            echo $normal_data->admin;
    }
    else if($_SESSION["user_type"]=="student")
    {
        if(isset($normal_data->student))
            echo $normal_data->admin;
    }
    else if($_SESSION["user_type"]=="librarian")
    {
        if(isset($normal_data->librarian))
            echo $normal_data->admin;
    }
    
}
?>