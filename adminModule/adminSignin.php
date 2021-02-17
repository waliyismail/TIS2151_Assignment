<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM ADMIN where ADMIN_ID='$adminid' and ADMIN_PASSWORD='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['ADMIN_ID'];
        header("Location: adminMain.php"); 
    }
    else
    {
        echo "Invalid Admin ID/Password";
    }
}
?>