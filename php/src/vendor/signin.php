<?php
  
  session_start();
  $connect = require_once 'connect.php';
  
  $login = $_POST['login'];
  $password = md5($_POST['password']);
  
  $check_user = mysqli_query($connect, "
    SELECT *
    FROM `users`
    WHERE `login` = '$login' AND `password` = '$password'
  ");
  
  if (mysqli_num_rows($check_user) === 0) {
    $_SESSION['warning'] = 'Login or password is not correct!';
    header('Location: ../index.php');
  }
  
  $user = mysqli_fetch_assoc($check_user);
  
  $_SESSION['user'] = [
    "id" =>  $user['id'],
    "login" =>  $user['login'],
    "name" => $user['name'],
    "avatar" => $user['image'],
    "email" => $user['email']
  ];
  
  header('Location: ../profile.php');
