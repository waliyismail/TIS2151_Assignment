<?php
  include "conn.php";
 $getPost = "SELECT * FROM POST WHERE POST_ID=1";
$post = mysqli_query($conn, $getPost);
$post = mysqli_fetch_array($post);
$GLOBALS['variable'] = "something";
echo $GLOBALS['variable'];
?>
