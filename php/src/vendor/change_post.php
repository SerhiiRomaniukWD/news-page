<?php
  
  session_start();
  $connect = require_once 'connect.php';
  
  $id = $_SESSION['post']['id'];
  $post = $_POST['post'];
  
  mysqli_query($connect, "
    UPDATE `posts` SET `post` = '$post' WHERE `posts`.`id` = '$id'
  ");
  
  header('Location: ../main.php');