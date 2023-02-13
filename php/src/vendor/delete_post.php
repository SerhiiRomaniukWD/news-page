<?php
  
  session_start();
  $connect = require_once 'connect.php';
  $post_id = $_GET['id'];
  
  mysqli_query($connect, "DELETE FROM `posts` WHERE `posts`.`id` = '$post_id'");
  
  header('Location: ../profile.php');