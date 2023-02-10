<?php

  $host = 'db';
  $user = 'user';
  $password = '123';
  $database = 'news';

  $connect = mysqli_connect($host, $user, $password, $database);

  if (!$connect) {
    die('Error: connect to DataBase failed!');
  }
  
  return $connect;
  