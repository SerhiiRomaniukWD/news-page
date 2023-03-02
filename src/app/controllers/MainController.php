<?php

namespace App\controllers;

use App\core\Controller;

class MainController extends Controller
{
  public function mainAction() {
    $this->view->render('Main');
  }
}