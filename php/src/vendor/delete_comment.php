<?php
  session_start();
  $connect = require_once 'connect.php';
  $comment_id = $_GET['id'];
  
  mysqli_query($connect, "DELETE FROM `comments` WHERE `comments`.`id` = '$comment_id'");
  
  header('Location: ../comments.php');