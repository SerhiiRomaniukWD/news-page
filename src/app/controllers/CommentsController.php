<?php

namespace App\controllers;

use App\core\Controller;

class CommentsController extends Controller
{
  public function commentsAction() {
    $this->view->render('Comments');
  }
}