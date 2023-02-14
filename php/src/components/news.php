<?php
  $connect = require 'vendor/connect.php';
  $id = $_SESSION['user']['id'];
  
  $posts = mysqli_query($connect, "SELECT * FROM `posts`");
  $posts = mysqli_fetch_all($posts);
?>

<div class="news-board">
  <form class="post" action="vendor/create_post.php" method="post">
    <div class="post-container">
      <span class="post_text">Create new post...</span>
      
      <div class="post-controller">
        <button class="post-controller_button">✔</button>
      </div>
    </div>
    <textarea
      class="post_textarea"
      name="post"
      cols="1"
      rows="4"
      required
    ></textarea>
  </form>
  
  <div class="news-board_header">
    <span class="news-board_title">ᐁ</span>
    <h2 class="news-board_title">What about news?</h2>
  </div>
  
  <ul class="news-list">
    <?php
      foreach ($posts as $post) {
        $comments_counter = mysqli_query($connect, "
          SELECT *
          FROM `comments`
          WHERE `post_id` = '$post[0]'
        ");
    ?>
        <div class="news-info">
          <span class="news-info_item">post by <strong><?= $post[2] ?></strong></span>
          
          <a class="news-info_item news-info_item--link" href="comments.php?id=<?= $post[0] ?>">
            <strong><?= mysqli_num_rows($comments_counter) ?>&nbsp;</strong>
            
            <img class="news-info_item--image" src="assets/icons/comments.svg" alt="comments">
          </a>
        </div>
        <li class="news-list_item">
          <span><?= $post[3] ?></span>
          <?php
            if ($id === $post[1] || (int)$id === 14) {
              ?>
              <div class="news-list_icons">
                <a class="news-list_link" href="post.php?id=<?= $post[0] ?>">✎</a>
                
                <a class="news-list_link" href="vendor/delete_post.php?id=<?= $post[0] ?>">✖</a>
              </div>
              <?php
            }?>
        </li>
        <?php
      }
    ?>
  </ul>
</div>
