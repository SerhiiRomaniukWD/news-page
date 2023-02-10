<?php
  
  session_start();
  $connect = require_once 'connect.php';
  $id = $_GET['id'];
  
  mysqli_query($connect, "DELETE FROM `posts` WHERE `posts`.`id` = '$id'");
  
  header('Location: ../profile.php');