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

  $login = $_SESSION['user']['login'];
  $avatar = $_SESSION['user']['avatar'];
  $name = $_SESSION['user']['name'];
  $email = $_SESSION['user']['email'];
  
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
  <header class="header">
    <a class="header_link" href="/">News portal ✧</a>
    
    <div class="user">
      <h3><?= $login ?></h3>
      <a class="user_link" href="vendor/logout.php">LOG OUT</a>
    </div>
  </header>
  
  <div class="main main-content main--profile">
    <div class="news-board">
      <form class="post" action="vendor/add_comment.php?id=<?= $post_id ?>" method="post">
        <div class="post-container">
          <span class="post_text">Add comment...</span>
          
          <div class="post-controller">
            <button class="post-controller_button">✔</button>
          </div>
        </div>
        <textarea
          class="post_textarea"
          name="comment"
          cols="100"
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
                if ($_SESSION['user']['id'] === $comment[2]) {
                  ?>
                  <div class="news-list_icons">
                    <a class="news-list_link" href="post.php?id=<?= $comment[0] ?>">✎</a>
                    <a class="news-list_link" href="vendor/delete_post.php?id=<?= $comment[0] ?>">✖</a>
                  </div>
                  <?php
                }?>
            </li>
            <?php
          }
        ?>
      </ul>
    </div>
    
    <ul class="profile-list">
      <li class="profile-list_item">
        <h2 class="profile-list_title">Hello, <?= $name ?>!</h2>
      </li>
      
      <li class="profile-list_item">
        <img class="profile-list_image" src="<?= $avatar ?>" alt="user_avatar">
      </li>
      
      <li class="profile-list_item">
        <span class="profile-list_text"><?= $email ?></span>
      </li>
    </ul>
  </div>
  
  <footer class="footer">
    <h3>News portal ©</h3>
  </footer>
</div>
</body>
</html>
