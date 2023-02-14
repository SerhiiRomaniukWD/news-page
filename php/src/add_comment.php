<?php
  session_start();
  $connect = require_once 'vendor/connect.php';
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
  
  $comment_id = $_GET['id'];
  $_SESSION['comment'] = ["id" =>  $comment_id];
  
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
    <?php require_once 'components/header.php' ?>

    <main class="main">
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
      
      <?php require_once 'components/profile.php' ?>
    </main>
    
    <?php require_once 'components/footer.php' ?>
  </div>
</body>
</html>
