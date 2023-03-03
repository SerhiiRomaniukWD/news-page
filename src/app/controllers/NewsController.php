<?php

namespace App\controllers;

use App\core\Controller;

class NewsController extends Controller
{
  public function newsAction()
  {
    $statistic = $this->model->getUserStatistic();
    $data = [
      ...$this->model->getUser(),
      "postsCounter" => $statistic["postsCounter"],
      "commentsCounter" => $statistic["commentsCounter"],
      "posts" => $this->model->getPosts()
    ];
    $this->view->render('News', $data);
  }

  public function addPostAction()
  {
    $this->model->addPost();
    $this->view->redirect('/');
  }

  public function logoutAction()
  {
    session_destroy();
    $this->view->redirect('/login');
  }

  public function postAction() {
    $statistic = $this->model->getUserStatistic();
    $id = $this->route["id"];
    $content = $this->model->getPost($id);
    $data = [
      ...$this->model->getUser(),
      "postsCounter" => $statistic["postsCounter"],
      "commentsCounter" => $statistic["commentsCounter"],
      "postId" => $id,
      "content" => $content["content"]
    ];
    $this->view->render('Post', $data);
  }

  public function deletePostAction()
  {
    $id = $this->route["id"];
    $this->model->deletePost($id);
    $this->view->redirect('/');
  }

  public function editPostAction()
  {
    $content = filter_var($_POST["post"]);
    $id = $this->route["id"];
    $this->model->editPost($id, $content);
    $this->view->redirect('/');
  }
}