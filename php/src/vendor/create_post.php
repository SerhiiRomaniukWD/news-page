<?php
  
  session_start();
  $connect = require_once 'connect.php';
  
  $id = $_SESSION['user']['id'];
  $text = $_POST['post'];
  
  $login = mysqli_query($connect, "SELECT `login` FROM `users` WHERE `id` = '$id'");
  $login = mysqli_fetch_array($login)['login'];
  
  mysqli_query($connect, "
    INSERT INTO `posts` (`id`, `user_id`, `user_name`, `post`)
    VALUES (NULL, '$id', '$login', '$text')
  ");

  header('Location: ../main.php');
  