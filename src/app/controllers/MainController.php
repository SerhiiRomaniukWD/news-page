<?php

namespace App\controllers;

use App\core\Controller;

class MainController extends Controller
{
  public function indexAction() {
    $this->view->render('Main');
  }
}