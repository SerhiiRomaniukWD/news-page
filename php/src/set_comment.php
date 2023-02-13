<?php
  
  session_start();
  $connect = require_once 'vendor/connect.php';
  $comment_id = $_GET['id'];
  
  $_SESSION['comment'] = ["id" =>  $comment_id];
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
  
  $login = $_SESSION['user']['login'];
  $avatar = $_SESSION['user']['avatar'];
  $name = $_SESSION['user']['name'];
  $email = $_SESSION['user']['email'];
  
  $posts_by_user = $_SESSION['statistic']['posts'];
  $comments_by_user = $_SESSION['statistic']['comments'];
  
  $check_comment = mysqli_query($connect, "
    SELECT *
    FROM `comments`
    WHERE `id` = '$comment_id'
  ");
  $comment = mysqli_fetch_assoc($check_comment);
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
      <form class="post" action="vendor/change_comment.php" method="post">
        <div class="post-container">
          <span class="post_text">Change comment...</span>
          
          <div class="post-controller">
            <button class="post-controller_button">✔</button>
            
            <a class="post-controller_link" href="vendor/delete_comment.php?id=<?= $comment_id ?>">✖</a>
          </div>
        </div>
        <textarea
          class="post_textarea"
          name="comment"
          cols="1"
          rows="4"
          required
        ><?= $comment['text'] ?></textarea>
      </form>
    </div>
    
    <div class="profile">
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
      
      <ul class="profile-list">
        <li class="profile-list_item">
          <img class="profile-list_icon" src="./assets/icons/news.svg" alt="news">
          
          <p class="profile-list_text"><?= $posts_by_user ?></p>
        </li>
        
        <li class="profile-list_item">
          <img class="profile-list_icon" src="./assets/icons/comments.svg" alt="news">
          
          <p class="profile-list_text"><?= $comments_by_user ?></p>
        </li>
      </ul>
    </div>
  </div>
  
  <footer class="footer">
    <h3>News portal ©</h3>
  </footer>
</div>
</body>
</html>
