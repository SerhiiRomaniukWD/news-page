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
    $this->db->create("posts", [
      "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
      ],
      "content" => [
        "VARCHAR(1000)",
        "NOT NULL"
      ],
      "user_id" => [
        "INT",
        "NOT NULL"
      ],
      "user_login" => [
        "VARCHAR(255)",
        "NOT NULL"
      ]
    ]);
    $this->db->create("comments", [
      "id" => [
        "INT",
        "NOT NULL",
        "AUTO_INCREMENT",
        "PRIMARY KEY"
      ],
      "content" => [
        "VARCHAR(1000)",
        "NOT NULL"
      ],
      "user_id" => [
        "INT",
        "NOT NULL"
      ],
      "user_login" => [
        "VARCHAR(255)",
        "NOT NULL"
      ],
      "post_id" => [
        "INT",
        "NOT NULL"
      ],
      "date" => [
        "VARCHAR(255)",
        "NOT NULL"
      ]
    ]);
  }

  public function dbIncludes($table, $params)
  {
    return $this->db->has($table, $params);
  }

  public function getId($table, $params)
  {
    return $this->db->select($table, 'id', $params);
  }

  public function getUserLogin($table, $params)
  {
    return $this->db->get($table, 'login', $params);
  }

  public function getUser()
  {
    return $this->db->get('users', '*', [
      "id" => $_SESSION['userId']
    ]);
  }


  public function getUserStatistic()
  {
    $postsCounter = $this->db->count('posts', [
      "user_id" => $_SESSION['userId']
    ]);
    $commentsCounter = $this->db->count('comments', [
      "user_id" => $_SESSION['userId']
    ]);

    return [
      "postsCounter" => $postsCounter,
      "commentsCounter" => $commentsCounter
    ];
  }
}