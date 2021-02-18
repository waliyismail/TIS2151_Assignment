<?php
      include 'database.php';
      session_start();

      if(isset($_SESSION["ID"])){
        $currentuserid = $_SESSION["ID"];
              // to be change to be dynamically
      };

      if(isset($_GET['forumid']))
      {
        $currforumid = $_GET['forumid'];
        $postid = $_GET['postid'];
        // get all post from the forum
        $getForum = "SELECT * FROM FORUM WHERE FORUM_ID=$currforumid";
        $forum = mysqli_fetch_array(mysqli_query($conn, $getForum));
        //echo $forum["FORUM_NAME"];
        $GLOBALS['forum_id']= $forum["FORUM_ID"];
        $GLOBALS['forum_name']= $forum["FORUM_NAME"];
        $GLOBALS['forum_about']=$forum["FORUM_ABOUT"];

        $getPost = "SELECT * FROM POST WHERE POST_ID=$postid";
        $post =  mysqli_fetch_array(mysqli_query($conn, $getPost));
        $GLOBALS['postid'] =$post['POST_ID'];
        $GLOBALS['authorid'] =$post['USER_FORUM_ID'];

        $getComments = "SELECT * FROM COMMENT WHERE POST_ID=$postid";
        $GLOBALS['comments'] = mysqli_query($conn, $getComments);

        $getPostAuthor = "SELECT * FROM USER_FORUM WHERE USER_FORUM_ID='$authorid'";
        $author = mysqli_query($conn, $getPostAuthor);
        $GLOBALS['author'] = mysqli_fetch_array($author);
      }

      if (isset($_POST['add_comment'])){
        $comment_text = $_POST["comment_text"];
        $postid = $GLOBALS['postid'];
        if(empty($comment_text)){
          echo "<script> window.alert('Please type something before commenting!!')</script>";
        }else{

          $sql = "INSERT INTO COMMENT(comment_text, post_id, user_forum_id) values ('$comment_text', '$postid', '$currentuserid')";
          $result = mysqli_query($conn, $sql);
          if(!$result) {echo mysqli_error($conn);}
          else {echo "<script> window.alert('Your Comment Has Been Posted!!!')</script>";}
        }
        }
            //deleting comment
         if(isset($_POST["delete_comment"])){

           $comment_id = $_POST["comment_id"];
           $sql = "DELETE FROM COMMENT WHERE COMMENT_ID=$comment_id";
           $result = mysqli_query($conn, $sql);
           if(!$result) {echo mysqli_error($conn);}
           else {echo "<script> window.alert('Your Comment Has Been Deleted!!!');</script>";}
         }
         if(isset($_POST["delete_post"])){

           $post_id = $_POST["post_id"];
           // find associated comment first
           $deletecomment = "DELETE FROM COMMENT WHERE POST_ID=$post_id";
           $result = mysqli_query($conn, $deletecomment);
           if(!$result) {echo mysqli_error($conn);}

           // delete post
           $sql = "DELETE FROM POST WHERE POST_ID=$post_id";
           $result = mysqli_query($conn, $sql);
           if(!$result) {echo mysqli_error($conn);}
           else {echo "<script> window.alert('Your OPnion Has Been Deleted');window.location='/feedModule'</script>";}
         }


  ?>
