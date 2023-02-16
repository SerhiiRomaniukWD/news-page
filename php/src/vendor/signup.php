<?php
  
  session_start();
  $connect = require_once 'connect.php';
  
  $login = $_POST['login'];
  $email = $_POST['email'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  
  if ($new_password !== $confirm_password) {
    $_SESSION['warning'] = 'Check passwords!';
    header('Location: ../register.php');
  } else {
    $avatar_path = 'uploads/' . time() . $_FILES['avatar']['name'];
  
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $avatar_path)) {
      $avatar_path = 'assets/icons/siluet.png';
    }
  
    $new_password = md5($new_password);
  
    mysqli_query($connect, "
      INSERT INTO `users` (`id`, `login`, `email`, `password`, `image`)
      VALUES (NULL, '$login', '$email', '$new_password', '$avatar_path')
    ");
  
    $_SESSION['register_done'] = 'Well done!';
  
    header('Location: ../index.php');
  }
  
  
  