<?php

namespace App\models;

use App\core\Model;

class Auth extends Model
{
  public function addUser()
  {
    $login = filter_var($_POST['login'], FILTER_SANITIZE_ENCODED);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_ENCODED);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_ENCODED);
    $avatar = 'assets/uploads/' . time() . '_' . $_FILES['avatar']['name'];

    if ($password !== $confirm_password) {
      $_SESSION['warning'] = 'Check passwords!';
      header('Location: /register');
      exit();
    } else if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
      $_SESSION['warning'] = 'Check email!';
      header('Location: /register');
      exit();
    }

    $password = md5($password);
    $userExist = self::dbIncludes('users', [
      "login" => $login,
      "password" => $password
    ]);

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/uploads/' . time() . '_' . $_FILES['avatar']['name'])) {
      $avatar = 'assets/avatar/siluet.png';
    }

    if ($userExist) {
      $_SESSION['warning'] = 'User already exists!';
      header('Location: /login');
      exit();
    }

    $this->db->insert("users", [
      "login" => $login,
      "email" => $email,
      "password" => $password,
      "avatar" => $avatar
    ]);

    $_SESSION['success'] = 'You are successfully registered!';
    header('Location: /login');
  }

  public function checkInUser()
  {
    $login = filter_var($_POST['login'], FILTER_SANITIZE_ENCODED);
    $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_ENCODED));

    $check_db = self::dbIncludes("users", [
      "login" => $login,
      "password" => $password
    ]);

    if (!$check_db) {
      $_SESSION['warning'] = 'User not found!';
      header('Location: /login');
    }

    $userId = self::getId("users", [
      "login" => $login,
      "password" => $password
    ]);
    $_SESSION["userId"] = $userId[0];
    header('Location: /news');
  }
}