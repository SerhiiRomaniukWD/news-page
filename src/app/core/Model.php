<?php

namespace App\core;

use Medoo\Medoo;

abstract class Model
{
  public $db;
  public function __construct()
  {
    $this->db = new Medoo(require_once 'App/config/db.php');

    $this->db->create("users", [
      "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
      ],
      "login" => [
        "VARCHAR(255)",
        "NOT NULL"
      ],
      "email" => [
        "VARCHAR(255)",
        "NOT NULL"
      ],
      "password" => [
        "VARCHAR(500)",
        "NOT NULL"
      ],
      "avatar" => [
        "VARCHAR(500)",
        "NOT NULL"
      ]
    ]);
  }
}