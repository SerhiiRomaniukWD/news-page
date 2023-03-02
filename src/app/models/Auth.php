<?php

namespace App\models;

use App\core\Model;

class Auth extends Model
{
  public function addUser() {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $avatar = 'assets/uploads/' . time() . '_' . $_FILES['avatar']['name'];

    if ($password !== $confirm_password) {
      header('Location: /register');
    } else if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
      header('Location: /register');
    }

    $password = md5($password);

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/uploads/' . time() . '_' . $_FILES['avatar']['name'])) {
      $avatar = 'assets/icons/siluet.png';
    }

    $this->db->insert("users", [
      "login" => $login,
      "email" => $email,
      "password" => $password,
      "avatar" => $avatar
    ]);
  }

  public function checkInUser()
  {
    $login = filter_var($_POST['login'], FILTER_SANITIZE_ENCODED);
    $password = md5($_POST['password']);

    $check_db = $this->db->count("users", [
      "login" => $login,
      "password" => $password
    ]);

    if ($check_db) {
      header('Location: /main');
    } else {
      header('Location: /register');
    }
  }
}