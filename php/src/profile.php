<?php
  session_start();
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
  
  $id = $_SESSION['user']['id'];
  $login = $_SESSION['user']['login'];
  $avatar = $_SESSION['user']['avatar'];
  $name = $_SESSION['user']['name'];
  $email = $_SESSION['user']['email'];
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>News-page</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <h1>News portal ✧</h1>
      
      <div class="user">
        <h3><?= $login ?></h3>
        <a class="user_link" href="./vendor/logout.php">LOG OUT</a>
      </div>
    </header>

    <div class="main main-content">
      <div class="news-board">
        <form class="post" action="/">
          <div class="post-container">
            <span class="post_text">Create new post...</span>

            <button class="post_button">✔</button>
          </div>
          <textarea
            class="post_textarea"
            name="post"
            id="post"
            cols="100"
            rows="4"
            required
          ></textarea>
        </form>
        
        <div class="news-board_header">
          <span class="news-board_title">ᐁ</span>
          <h2 class="news-board_title">What about news?</h2>
        </div>

        <ul class="news-list">
          <li class="news-list_item">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, vero!
          </li>

          <li class="news-list_item">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor est fugit maiores praesentium rerum? Consequuntur fugiat id ipsa laborum repellendus saepe sed unde velit. Commodi dolore iste soluta ut veritatis.
          </li>

          <li class="news-list_item">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, ullam.
          </li>
        </ul>
      </div>

      <ul class="profile-list">
        <li class="profile-list_item">
          <h2 class="profile-list_title">Hello, <?= $name ?> <?= $id ?>!</h2>
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
