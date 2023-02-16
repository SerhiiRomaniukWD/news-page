<?php
  session_start();
  $connect = require_once 'vendor/connect.php';
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
  
  if (!isset($_GET['id'])) {
    $post_id = $_SESSION['post']['id'];
  } else {
    $post_id = $_GET['id'];
  }
  
  $_SESSION['post'] = ["id" => $post_id];

  $id = $_SESSION['user']['id'];
  
  $post = mysqli_query($connect, "SELECT `post` FROM `posts` WHERE `id` = '$post_id'");
  $post = mysqli_fetch_array($post)['post'];
  
  $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `post_id` = '$post_id'");
  $comments = mysqli_fetch_all($comments);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>News-page</title>
  <link rel="stylesheet" href="assets/styles.css?v=<?php echo time(); ?>">
</head>
<body>
  <div class="container">
    <?php require_once 'components/header.php' ?>
  
    <main class="main">
      <div class="news-board">
        <p class="post-box"><?= $post ?></p>
  
        <form class="post" action="vendor/create_comment.php?id=<?= $post_id ?>" method="post">
          <div class="post-container">
            <span class="post_text">Add comment...</span>
  
            <div class="post-controller">
              <button class="post-controller_button">✔</button>
            </div>
          </div>
          <textarea
            class="post_textarea"
            name="comment"
            cols="1"
            rows="2"
            required
          ></textarea>
        </form>
  
        <div class="news-board_header">
          <span class="news-board_title">ᐁ</span>
          <h2 class="news-board_title">Comments</h2>
        </div>
  
        <ul class="news-list">
          <?php
            foreach ($comments as $comment) {
              ?>
              <div class="news-info">
                <span class="news-info_item"><strong><?= $comment[5] ?></strong></span>
  
                <span class="news-info_item"><?= $comment[3] ?></span>
              </div>
  
              <li class="news-list_item">
                <span><?= $comment[4] ?></span>
              
                <?php
                  if ($id === $comment[2]  || (int)$id === 1) {
                    ?>
                    <div class="news-list_icons">
                      <a class="news-list_link" href="add_comment.php?id=<?= $comment[0] ?>">✎</a>
                      <a class="news-list_link" href="vendor/delete_comment.php?id=<?= $comment[0] ?>">✖</a>
                    </div>
                    <?php
                  }?>
              </li>
              <?php
            }
          ?>
        </ul>
      </div>
      
      <?php require_once 'components/profile.php' ?>
    </main>
    
    <?php require_once 'components/footer.php' ?>
  </div>
</body>
</html>
