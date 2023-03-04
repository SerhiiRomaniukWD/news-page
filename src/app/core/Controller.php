<?php

namespace App\core;

abstract class Controller
{
  public array $route;
  public View $view;
  public Model $model;
  public function __construct($route)
  {
    $this->route = $route;
    $this->view = new View($route);
    self::loadModel($route['controller']);
  }

  public function loadModel($model_name): void
  {
    $path = 'App\models\\' . ucfirst($model_name);

    if (class_exists($path)) {
      $this->model = new $path;
    }
  }

  public function clearSession(): void
  {
    unset($_SESSION['warning'], $_SESSION['success']);
  }
}