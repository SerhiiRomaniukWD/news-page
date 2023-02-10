<?php
  session_start();
  $connect = require_once 'vendor/connect.php';
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
  
  $posts = mysqli_query($connect, "SELECT * FROM `posts`");
  $posts = mysqli_fetch_all($posts);
  
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
        <a class="user_link" href="vendor/logout.php">LOG OUT</a>
      </div>
    </header>

    <div class="main main-content main--profile">
      <div class="news-board">
        <form class="post" action="./vendor/post.php" method="post">
          <div class="post-container">
            <span class="post_text">Create new post...</span>

            <button class="post_button">✔</button>
          </div>
          <textarea
            class="post_textarea"
            name="post"
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
          <?php
            foreach ($posts as $post) {
              ?>
                <span class="news-list_creator">by <?= $post[2] ?>:</span>
                <li class="news-list_item">
                  <span><?= $post[3] ?></span>
  
                  <?php
                    if ($id === $post[1]) {
                      ?>
                        <div class="news-list_icons">
                          <a class="news-list_link" href="vendor/delete_post.php?id=<?= $post[0] ?>">✎</a>
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
