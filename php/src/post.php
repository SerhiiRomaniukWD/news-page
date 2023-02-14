<?php
  session_start();
  $connect = require_once 'vendor/connect.php';
  $post_id = $_GET['id'];
  
  $_SESSION['post'] = ["id" =>  $post_id];
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
  
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
    <?php require_once 'components/header.php' ?>
  
    <main class="main">
      <div class="news-board">
        <form class="post" action="vendor/change_post.php" method="post">
          <div class="post-container">
            <span class="post_text">Change post...</span>
  
            <div class="post-controller">
              <button class="post-controller_button">✔</button>
  
              <a class="post-controller_link" href="vendor/delete_post.php?id=<?= $post_id ?>">✖</a>
            </div>
          </div>
          <textarea
            class="post_textarea"
            name="post"
            cols="1"
            rows="4"
            required
          ><?= $post['post'] ?></textarea>
        </form>
      </div>
      
      <?php require_once 'components/profile.php' ?>
    </main>
    
    <?php require_once 'components/footer.php' ?>
  </div>
</body>
</html>
  