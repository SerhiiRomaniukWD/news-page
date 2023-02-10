<?php
  
  session_start();
  $connect = require_once 'connect.php';
  $user_id = $_GET['id'];
  
  mysqli_query($connect, "DELETE FROM `posts` WHERE `posts`.`id` = '$user_id'");
  
  header('Location: ../profile.php');