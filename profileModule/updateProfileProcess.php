<?php
    include 'database.php';
    
    if(isset($_POST['update']))
    {
        extract($_POST);
        $id = $_SESSION["ID"];
        if(!is_null($username)){
            $sql=mysqli_query($conn,"UPDATE USER_FORUM SET USER_FORUM_NAME='$username' WHERE USER_FORUM_ID = '$id'");
        }

        if(!is_null($email))
        {
            $sql=mysqli_query($conn,"UPDATE USER_FORUM SET USER_FORUM_EMAIL='$email' WHERE USER_FORUM_ID = '$id'");
        }
        if(!is_null($about))
        {
            $sql=mysqli_query($conn,"UPDATE USER_FORUM SET USER_FORUM_EMAIL='$about' WHERE USER_FORUM_ID = '$id'");
        }
        if(!is_null($image))
        {
              	// Get image name
  	            $image = $_FILES['image']['name'];

  	            // image file directory
  	            $target = "images/".basename($image);

            	$sql = "UPDATE USER_FORUM SET USER_FORUM_IMAGE = '$image' WHERE USER_FORUM_ID = '$id'";
  	            // execute query
  	            mysqli_query($conn, $sql);

            	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		        $msg = "Image uploaded successfully";
            	}else{
  		            $msg = "Failed to upload image";
  	            }
        }
        header ("Location: profile.php");
    }



?>