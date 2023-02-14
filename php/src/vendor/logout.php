<?php
  session_start();
  
  unset($_SESSION['user']);
  unset($_SESSION['post']);
  unset($_SESSION['comment']);
  
  header('Location: ../index.php');
