
<?php

include 'database.php';
//Define the query
extract($_POST);
$query = "DELETE FROM USER_FORUM WHERE USER_FORUM_ID = '$name'";

//sends the query to delete the entry
mysqli_query ($conn,$query);
header("Location: adminManage.php"); 
?>

