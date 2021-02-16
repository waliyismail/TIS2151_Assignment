<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM register where Email='$userid' and Password='md5($pass)'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['USER_FORUM_ID'];
        $_SESSION["USERNAME"]=$row['USER_FORUM_NAME'];
        $_SESSION["USER_EMAIL"]=$row['USER_FORUM_EMAIL'];
        header("Location: profile.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>