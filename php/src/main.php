<?php
  session_start();
  $connect = require 'vendor/connect.php';
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
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
      <?php require_once 'components/news.php' ?>
      
      <?php require_once 'components/profile.php' ?>
    </main>
  
    <?php require_once 'components/footer.php' ?>
  </div>
</body>
</html>
