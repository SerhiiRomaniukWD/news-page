<?php
  session_start();
  
  if (!isset($_SESSION['user'])) {
    header('Location: /');
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>News-page</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <main class="main">
    <h1 class="title">Hello <?=  $_SESSION['user']['login'] ?>!</h1>
    
    <img src="<?=  $_SESSION['user']['avatar'] ?>" alt="user_avatar">
    
    <p>User name: <?=  $_SESSION['user']['name'] ?></p>
    
    <p>User email: <?=  $_SESSION['user']['email'] ?></p>

    <a href="./vendor/logout.php">Exit</a>
  </main>
</body>
</html>
