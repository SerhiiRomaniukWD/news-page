<?php
  
  session_start();
  $connect = require_once 'connect.php';
  
  $login = $_POST['login'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  
  if (!$new_password === $confirm_password) {
    $_SESSION['warning'] = 'Check passwords!';
    header('Location: ../register.php');
  }
  
  $avatar_path = 'uploads/' . time() . $_FILES['avatar']['name'];
  
  if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $avatar_path)) {
    $_SESSION['warning'] = 'Error avatar loading!';
    header('Location: ../register.php');
  }
  
  $new_password = md5($new_password);
  
  mysqli_query($connect, "
    INSERT INTO `users` (`id`, `login`, `name`, `email`, `password`, `image`)
    VALUES (NULL, '$login', '$name', '$email', '$new_password', '$avatar_path')
  ");
  
  $_SESSION['register_done'] = 'Well done!';
  
  header('Location: ../register.php');
  
  header('Location: ../index.php');
  