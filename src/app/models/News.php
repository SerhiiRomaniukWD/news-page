<?php

namespace App\models;

use App\core\Model;

class News extends Model
{
  public function addPost()
  {
    $content = filter_var($_POST['post']);
    $userId = $_SESSION["userId"];
    $userLogin = self::getUserLogin("users", [
      "id" => $userId
    ]);

    if (!filter_var($_POST['post']) && !strlen($content)) {
      exit;
    }

    $this->db->insert("posts", [
      "content" => $content,
      "user_id" => $userId,
      "user_login" => $userLogin
    ]);
  }

  public function editPost($id, $content)
  {
    $this->db->update("posts", [
      "content" => $content
    ],[
      "id" => $id
    ]);
  }

  public function deletePost($id)
  {
    $this->db->delete("posts", [
      "id" => $id
    ]);

    $this->db->delete("comments", [
      "post_id" => $id
    ]);
  }

  public function getPost($id)
  {
    return $this->db->get('posts', '*', [
      "id" => $id
    ]);
  }

  public function getPosts()
  {
    $data = [];
    $posts = $this->db->select('posts', [
      "id",
      "user_id",
      "content",
      "user_login"
    ]);

    foreach ($posts as $post) {
      $commentsCounter = $this->db->count('comments', [
        "post_id" => $post["id"]
      ]);

      array_push($data, array(
        ...$post,
        "comments_counter" => $commentsCounter
      ));
    }

    return $data;
  }
}