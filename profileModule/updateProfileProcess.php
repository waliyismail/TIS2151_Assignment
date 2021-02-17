
<?php 
    include('signinProcess.php');
?>


<?php
    include 'database.php';
    
    if(isset($_POST['update']))
    {
        extract($_POST);
        $id = $_SESSION["ID"];
        if(!($user_name == NULL)){
            $sql=mysqli_query($conn,"UPDATE USER_FORUM SET USER_FORUM_NAME='$user_name' WHERE USER_FORUM_ID = '$id'");
        }

        if(!($email == NULL))
        {
            $sql=mysqli_query($conn,"UPDATE USER_FORUM SET USER_FORUM_EMAIL='$email' WHERE USER_FORUM_ID = '$id'");
        }
        if(!($about == NULL))
        {
            $sql=mysqli_query($conn,"UPDATE USER_FORUM SET USER_FORUM_ABOUT='$about' WHERE USER_FORUM_ID = '$id'");
        }
          
            
          
        
        header ("Location: profile.php");
    }

    if(isset($_POST['but_upload']))
    {
        $id = $_SESSION["ID"];
        $name = $_FILES['file']['name'];
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
      
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
      
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
       
           // Insert record
           $query = "UPDATE USER_FORUM SET USER_FORUM_IMAGE = '".$name."' WHERE USER_FORUM_ID = '$id'";
           mysqli_query($conn,$query);
        
           // Upload file
           move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
      
        }

        header ("Location: profile.php");
    }



?>