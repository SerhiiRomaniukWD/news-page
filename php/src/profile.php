<?php
  session_start();
  $connect = require_once 'vendor/connect.php';
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
  
  $id = $_SESSION['user']['id'];
  $login = $_SESSION['user']['login'];
  $avatar = $_SESSION['user']['avatar'];
  $name = $_SESSION['user']['name'];
  $email = $_SESSION['user']['email'];
  
  $posts = mysqli_query($connect, "SELECT * FROM `posts`");
  $posts = mysqli_fetch_all($posts);
  
  $comments_by_user = mysqli_query($connect, "
    SELECT *
    FROM `comments`
    WHERE `user_id` = '$id'
  ");
  
  $posts_by_user = mysqli_query($connect, "
    SELECT *
    FROM `posts`
    WHERE `user_id` = '$id'
  ");
  
  $_SESSION['statistic'] = [
    "posts" => mysqli_num_rows($posts_by_user),
    "comments" => mysqli_num_rows($comments_by_user)
  ];
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
        <a class="user_link" href="vendor/logout.php">LOG OUT</a>
      </div>
    </header>

    <main class="main">
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
                  if ($id === $post[1]) {
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

      <div class="profile">
        <ul class="profile-list">
          <li class="profile-list_item">
            <h2 class="profile-list_title"><?= $name ?>!</h2>
          </li>

          <li class="profile-list_item">
            <img class="profile-list_image" src="<?= $avatar ?>" alt="user_avatar">
          </li>

          <li class="profile-list_item">
            <img class="profile-list_icon" src="./assets/icons/mail.svg" alt="email">

            <p><?= $email ?></p>
          </li>
        </ul>

        <ul class="profile-list">
          <li class="profile-list_item">
            <img class="profile-list_icon" src="./assets/icons/news.svg" alt="news">

            <p class="profile-list_text"><?= mysqli_num_rows($posts_by_user) ?></p>
          </li>

          <li class="profile-list_item">
            <img class="profile-list_icon" src="./assets/icons/comments.svg" alt="news">

            <p class="profile-list_text"><?= mysqli_num_rows($comments_by_user) ?></p>
          </li>
        </ul>
      </div>
    </main>

    <footer class="footer">
      <h3>News portal ©</h3>
    </footer>
  </div>
</body>
</html>
