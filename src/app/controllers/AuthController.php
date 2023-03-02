<?php

namespace App\controllers;
use App\core\Controller;

class AuthController extends Controller
{
  public function loginAction() {
    $this->view->render('Login');
  }

  public function registerAction() {
    $this->view->render('Register');
  }

  public function signUpAction() {
    $this->model->addUser();
    $this->view->redirect('/login');
  }

  public function signInAction() {
    $this->model->checkInUser();
  }
}