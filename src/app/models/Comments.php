<?php

namespace App\models;

use App\core\Model;

class Comments extends Model
{
  public function getPostContent($id)
  {
    return $this->db->get('posts', 'content', [
      "id" => $id
    ]);
  }

  public function getCommentContent($id)
  {
    return $this->db->get('comments', 'content', [
      "id" => $id
    ]);
  }

  public function getComments($postId)
  {
    $data = [];
    $comments = $this->db->select('comments', [
      "id",
      "user_id",
      "content",
      "user_login",
      "date",
      "post_id"
    ], [
      "post_id" => $postId
    ]);

    foreach ($comments as $comment) {
      array_push($data, $comment);
    }

    return $data;
  }

  public function addComment($postId)
  {
    $content = filter_var($_POST['comment']);
    $userId = $_SESSION["userId"];
    $userLogin = self::getUserLogin("users", [
      "id" => $userId
    ]);

    if (!filter_var($_POST['comment']) && !strlen($content)) {
      exit;
    }

    $this->db->insert("comments", [
      "content" => $content,
      "user_id" => $userId,
      "user_login" => $userLogin,
      "post_id" => $postId,
      "date" => date("d/m/y")
    ]);
  }

  public function deleteComment($id)
  {
    $this->db->delete("comments", [
      "id" => $id
    ]);
  }

  public function getPostId($commentId)
  {
    return $this->db->select('comments', 'post_id', [ "id" => $commentId ]);
  }

  public function editComment($id, $content)
  {
    $this->db->update("comments", [
      "content" => $content
    ],[
      "id" => $id
    ]);
  }
}