<?php
  
  session_start();
  $connect = require_once 'connect.php';
  
  $login = filter_var($_POST['login'], FILTER_SANITIZE_ENCODED);
  $password = md5($_POST['password']);
  
  $check_user = mysqli_query($connect, "
    SELECT *
    FROM `users`
    WHERE `login` = '$login' AND `password` = '$password'
  ");
  
  if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
  
    $_SESSION['user'] = [
      "id" =>  $user['id'],
      "login" =>  $user['login'],
      "avatar" => $user['image'],
      "email" => $user['email']
    ];
  
    header('Location: ../main.php');
  } else {
    $_SESSION['warning'] = 'Login or password is not correct!';
    header('Location: ../index.php');
  }
