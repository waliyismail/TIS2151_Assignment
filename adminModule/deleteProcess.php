
<?php

include 'database.php';
//Define the query
extract($_POST);


$query = "DELETE FROM SUBSCRIPTION WHERE USER_FORUM_ID = '$name'";

//sends the query to delete the entry
mysqli_query ($conn,$query);

$query = "DELETE FROM POST_UPVOTE_DOWNVOTE WHERE USER_FORUM_ID = '$name'";

//sends the query to delete the entry
mysqli_query ($conn,$query);

$query = "DELETE FROM COMMENT WHERE USER_FORUM_ID = '$name'";

//sends the query to delete the entry
mysqli_query ($conn,$query);
$query = "DELETE FROM POST WHERE USER_FORUM_ID = '$name'";

//sends the query to delete the entry
mysqli_query ($conn,$query);
$query = "DELETE FROM USER_FORUM WHERE USER_FORUM_ID = '$name'";

//sends the query to delete the entry
mysqli_query ($conn,$query);
header("Location: adminManage.php"); 
?>

