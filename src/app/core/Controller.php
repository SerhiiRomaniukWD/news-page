<?php

namespace App\core;

abstract class Controller
{
  public $route;
  public $view;
  public $model;
  public function __construct($route)
  {
    $this->route = $route;
    $this->view = new View($route);
    $this->model = $this->loadModel($route['controller']);
  }

  public function loadModel($model_name) {
    $path = 'App\models\\' . ucfirst($model_name);

    if (class_exists($path)) {
      return new $path;
    }
  }
}