<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/post.css" />
    <title>Create a post</title>
  </head>
  <body>
    <?php if (isset($_POST['submit_post']))
      echo 'Your OPnion has been posted'
      $sql = "INSERT INTO POST (post_title, post_content, post_image, user_forum_id)
      values ($_POST['post_title'],$_POST['post_content'], $_POST['post_image'], $_POST['user_forum_id']);
      $res = mysqli_query($conn, $sql);

    ?>

    <<?php else ?>
    <h4>Create a post</h4>
    <form class="create-post" action="action.php" method="post">
      <!-- include post in database -->
      <textarea name="post_title" placeholder="Title" maxlength="300"></textarea><br>
      <textarea name="post_content" rows="5" cols="40"placeholder="Whats your OPnion?"></textarea><br>
      <input type="file" name="post_image">
      <input type="hidden" name=<?php echo $USER_FORUM_ID?>>

      <input type="submit" name="submit_post" value="Post">
    </form>
  <?php endif; ?>
  </body>
</html>
