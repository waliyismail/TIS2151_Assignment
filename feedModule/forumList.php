<?php
$forum_list = getForumList();
if(empty($forum_list)){
  echo "<p> no forum yet.. </p>";
}else {        ?>
<ul class="ulprof">
    <?php foreach ($forum_list as $forum) {
        // echo var_dump($forum_list);
        // echo "           "?>

      <li class="liprof"><a href="/feedModule/forum.php?forumid=<?php echo $forum["0"];?>"><?php echo $forum["1"]; ?></a></li>
    <?php } ?>

</ul>
<?php } ?>
