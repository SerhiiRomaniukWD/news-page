<?php
  session_start();
  $connect = require_once 'connect.php';
  
  $id = $_SESSION['comment']['id'];
  $text = $_POST['comment'];
  
  
  mysqli_query($connect, "
    UPDATE `comments` SET `text` = '$text' WHERE `comments`.`id` = '$id'
  ");
  
  header('Location: ../comments.php');