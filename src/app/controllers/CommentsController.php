<?php

namespace App\controllers;

use App\core\Controller;

class CommentsController extends Controller
{
  public function commentsAction()
  {
    $postId = $this->route["id"];
    $statistic = $this->model->getUserStatistic();
    $content = $this->model->getPostContent($postId);
    $data = [
      ...$this->model->getUser(),
      "postsCounter" => $statistic["postsCounter"],
      "commentsCounter" => $statistic["commentsCounter"],
      "comments" => $this->model->getComments($postId),
      "content" => $content,
      "postId" => $postId
    ];
    $this->view->render('Comments', $data);
  }

  public function addCommentAction()
  {
    $postId = $this->route["id"];
    $this->model->addComment($postId);
    $this->view->redirect('/comments/' . $postId);
  }

  public function deleteCommentAction()
  {
    $id = $this->route["id"];
    $postId = $this->model->getPostId($id)[0];
    $this->model->deleteComment($id);
    $this->view->redirect('/comments/' . $postId);
  }

  public function commentPageAction()
  {
    $statistic = $this->model->getUserStatistic();
    $commentId = $this->route["id"];
    $postId = $this->model->getPostId($commentId);
    $content = $this->model->getCommentContent($commentId);
    $data = [
      ...$this->model->getUser(),
      "postsCounter" => $statistic["postsCounter"],
      "commentsCounter" => $statistic["commentsCounter"],
      "content" => $content,
      "postId" => $postId,
      "commentId" => $commentId
    ];
    $this->view->render('CommentPage', $data);
  }

  public function editCommentAction()
  {
    $content = filter_var($_POST["comment"]);
    $commentId = $this->route["id"];
    $postId = $this->model->getPostId($commentId)[0];
    $this->model->editComment($commentId, $content);
    $this->view->redirect('/comments/' . $postId);
  }
}