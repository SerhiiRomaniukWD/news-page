<?php
  
  session_start();
  $connect = require_once 'connect.php';
  
  $id = $_SESSION['user']['id'];
  $text = $_POST['post'];
  
  $name = mysqli_query($connect, "SELECT `name` FROM `users` WHERE `id` = '$id'");
  $name = mysqli_fetch_array($name)['name'];
  
  mysqli_query($connect, "
    INSERT INTO `posts` (`id`, `user_id`, `user_name`, `post`)
    VALUES (NULL, '$id', '$name', '$text')
  ");

  header('Location: ../profile.php');
  