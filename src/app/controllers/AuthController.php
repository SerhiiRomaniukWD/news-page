<?php

namespace App\controllers;
use App\core\Controller;

class AuthController extends Controller
{
  public function loginAction() {
    $this->view->render('Login');
    self::clearSession();
  }

  public function registerAction(): void
  {
    $this->view->render('Register');
    self::clearSession();
  }

  public function signUpAction(): void
  {
    $this->model->addUser();
    $this->view->redirect('/login');
  }

  public function signInAction(): void
  {
    $this->model->checkInUser();
  }
}