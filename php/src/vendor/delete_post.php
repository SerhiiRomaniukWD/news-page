<?php
  
  session_start();
  $connect = require_once 'connect.php';
  $post_id = $_GET['id'];
  
  mysqli_query($connect, "DELETE FROM `posts` WHERE `posts`.`id` = '$post_id'");
  
  $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `post_id` = '$post_id'");
  $comments = mysqli_fetch_all($comments);
  
  foreach ($comments as $comment) {
    mysqli_query($connect, "DELETE FROM `comments` WHERE `comments`.`id` = '$comment[0]'");
  }
  
  header('Location: ../main.php');