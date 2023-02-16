<?php
  
  session_start();
  $connect = require_once 'connect.php';
  
  $user_id = $_SESSION['user']['id'];
  $user_name = $_SESSION['user']['login'];
  $post_id = $_SESSION['post']['id'];
  $text = $_POST['comment'];
  $date = date('d/m/y h:i');
  
  mysqli_query($connect, "
    INSERT INTO `comments` (`id`, `post_id`, `user_id`, `date`, `user_name`, `text`)
    VALUES (NULL, '$post_id', '$user_id', '$date', '$user_name', '$text')
  ");
  
  header('Location: ../comments.php');