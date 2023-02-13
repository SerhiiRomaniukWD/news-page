<?php
  
  session_start();
  $connect = require_once 'vendor/connect.php';
  $post_id = $_GET['id'];
  
  $_SESSION['post'] = ["id" =>  $post_id];
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
  
  $login = $_SESSION['user']['login'];
  $avatar = $_SESSION['user']['avatar'];
  $name = $_SESSION['user']['name'];
  $email = $_SESSION['user']['email'];
  
  $check_post = mysqli_query($connect, "
    SELECT *
    FROM `posts`
    WHERE `id` = '$post_id'
  ");
  $post = mysqli_fetch_assoc($check_post);

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
      <form class="post" action="vendor/change_post.php" method="post">
        <div class="post-container">
          <span class="post_text">Change post...</span>
          
          <div class="post-controller">
            <button class="post-controller_button">✔</button>
            
            <a class="post-controller_link" href="vendor/delete_post.php">✖</a>
          </div>
        </div>
        <textarea
          class="post_textarea"
          name="post"
          cols="100"
          rows="4"
          required
        ><?= $post['post'] ?></textarea>
      </form>
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
  