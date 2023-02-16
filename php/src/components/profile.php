<?php
  $connect = require 'vendor/connect.php';
  
  $id = $_SESSION['user']['id'];
  $avatar = $_SESSION['user']['avatar'];
  $login = $_SESSION['user']['login'];
  $email = $_SESSION['user']['email'];
  
  $posts = mysqli_query($connect, "
    SELECT * FROM `posts` WHERE `user_id` = $id
  ");
  
  $comments = mysqli_query($connect, "
    SELECT * FROM `comments` WHERE `user_id` = $id
  ");
  
  $posts_counter = mysqli_num_rows($posts);
  $comments_counter = mysqli_num_rows($comments);
?>

<div class="profile">
  <ul class="profile-list">
    <li class="profile-list_item">
      <h2 class="profile-list_title"><?= $login ?></h2>
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
      <img class="profile-list_icon" src="assets/icons/news.svg" alt="news">

      <p class="profile-list_text"><?= $posts_counter ?></p>
    </li>

    <li class="profile-list_item">
      <img class="profile-list_icon" src="assets/icons/comments.svg" alt="news">

      <p class="profile-list_text"><?= $comments_counter ?></p>
    </li>
  </ul>
</div>