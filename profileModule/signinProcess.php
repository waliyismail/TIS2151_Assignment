<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM USER_FORUM where USER_FORUM_ID='$userid' and USER_FORUM_PASSWORD='md5($pass)'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['USER_FORUM_ID'];
        $_SESSION["USERNAME"]=$row['USER_FORUM_NAME'];
        $_SESSION["USER_EMAIL"]=$row['USER_FORUM_EMAIL'];
        $_SESSION["USER_IMAGE"] = $row['USER_FORUM_IMAGE'];
        $_SESSION["ABOUT"] = $row['USER_FORUM_ABOUT'];
        header("Location: profile.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>