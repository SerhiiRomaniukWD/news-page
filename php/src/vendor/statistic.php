<?php
  session_start();
  $connect = require 'connect.php';
  $id = $_SESSION['user']['id'];
  
  $posts = mysqli_query($connect, "
    SELECT * FROM `posts` WHERE `user_id` = $id
  ");
  
  $comments = mysqli_query($connect, "
    SELECT * FROM `comments` WHERE `user_id` = $id
  ");
  
  $posts_counter = mysqli_num_rows($posts);
  $comments_counter = mysqli_num_rows($comments);
  
  return [$posts_counter, $comments_counter];
  