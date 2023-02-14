<?php
  session_start();
  $connect = require_once 'connect.php';
  $comment_id = $_GET['id'];
  $user_id = $_SESSION['user']['id'];
  
  mysqli_query($connect, "DELETE FROM `comments` WHERE `comments`.`id` = '$comment_id'");
  
  header('Location: ../comments.php');