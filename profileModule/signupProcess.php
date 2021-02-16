<?php
extract($_POST);
include("database.php");
$sql=mysqli_query($conn,"SELECT * FROM USER_FORUM where USER_FORUM_EMAIL='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
else{
    if(isset($_POST['save'])){
        $query = "INSERT INTO USER_FORUM(USER_FORUM_ID, USER_FORUM_NAME, USER_FORUM_PASSWORD,USER_FORUM_EMAIL) VALUES ('$userid', '$username', 'md5($pass)', '$email')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: signin.php");
    }
}

?>