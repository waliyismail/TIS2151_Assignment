<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/post.css" />
    <title>post page</title>
  </head>
  <body>
    <div class="post-page">
      <?php
        $getPost = "SELECT * FROM POST WHERE POST_ID=XXXX";
        $post = mysqli_query($conn, $getPost);
        $post = mysqli_fetch_array($post);

        $getComment = "SELECT * FROM COMMENT WHERE POST_ID=XXXX";
        $comments = mysqli_query($conn, $getComment);

        $getForum = "SELECT * FROM FORUM WHERE FORUM_ID=$post['FORUM_ID']";
        $forum = mysqli_query($conn, $getForum);

        $getPostAuthor = "SELECT * FROM USER_FORUM WHERE USER_FORUM_ID=$post['USER_FORUM_ID']";
        $author = mysqli_query($conn, $getPostAuthor);
      ?>
      <div class="post-content">
        <!-- user id, user avatar, post content -->
        <!-- get post by id then display here -->
        <h4 class="post-title"><?php echo $post["post_title"]; ?></h4>
        <p class="post-text"><?php echo $post["post_content"]; ?></p>
        <p class="post-author">Posted by @<?php echo $author["USER_FORUM_NAME"]; in r/$forum["about"] ?></p>

        <img src="<?php echo $post["post_image"]; ?>" alt="">
        <button type="button">Upvote</button>
        <button type="button">Downvote</button>
        <button type="button" onclick="reportDetails()">Report post</button>
        <!-- if post author this button shows up -->
        <button type="button" onclick="confirmDelete()">Delete post</button>
        <!-- if user is logged in  and user != post author-->
        <div class="user-comment">
          <p>Comment as user</p>
          <form class="comment" action="comment.php" method="post">
            <!-- add comment to database -->
            <textarea name="comment_text" placeholder="what are your thought"></textarea>
            <!-- other info to be added -->
            <input type="hidden" name="commentor_id" value="<?php echo $currentuser['id']; ?>"/>
            <input type="hidden" name="user_forum_id" value="<?php echo $post['USER_FORUM_ID']; ?>"/>
            <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>"/>
            <input type="submit" value="Comment">
          </form>

        </div>
      </div>
      <div class="post-comments">
        <!-- get all the comments from database loop and display here -->
        <?php
          if(mysqli_num_rows($comments) > 0) {

             while ($row = mysqli_fetch_array($comments)) {
                $comment_author = mysqli_query($conn, "SELECT * FROM USER_FORUM WHERE USER_FORUM_ID=$row['USER_FORUM_ID']");
                ?>
                <div class="separated-comment">
                  <p class="comment-author">@<?php $comment_author["USER_FORUM_NAME"] ?></p>
                  <p class="comment-text"><?php row["comment_text"] ?></p>
                  <button type="button">Upvote</button>
                  <button type="button">Downvote</button>
                  <button type="button" onclick="reportDetails()" >Report comment</button>
                </div>
             }
               ?>

        <!-- <div  class="separated-comment">
          <p class="comment-author">@asdsadsas</p>
          <p class="comment-text">post comment here blahh blaahh</p>
          <button type="button">Upvote</button>
          <button type="button">Downvote</button>
          <button type="button">Report comment</button>

        </div>
        <div  class="separated-comment">
          <p class="comment-author">@asdsadas</p>
          <p class="comment-text">post comment here blahh blaahh</p>
          <button type="button">Upvote</button>
          <button type="button">Downvote</button>
          <button type="button">Report comment</button>

        </div> -->
      </div>
    </div>
    <script type="text/javascript">
      function confirmDelete(){
        window.confirm("are you sure you want to delete this?");
        // if yes -> remove from database
      }
      function reportDetails(){
        window.prompt("please state why this post/comment is inappropriate?")
        // add to database
      }
    </script>
  </body>
</html>
