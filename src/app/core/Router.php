<?php

namespace App\core;

class Router
{
  protected $routes = [];
  protected $params = [];
  public function __construct()
  {
    $routes = require_once 'app/config/routes.php';

    foreach ($routes as $key => $value) {
      $this->add($key, $value);
    }
  }

  public function add($route, $params)
  {
    $route = '#^' . $route . '$#';
    $this->routes[$route] = $params;
  }

  public function match()
  {
    $url = trim($_SERVER['REQUEST_URI'], '/');

    foreach ($this->routes as $route => $params) {
      if (preg_match($route, $url, $matches)) {
        $this->params = $params;
        return true;
      }
    }

    return false;
  }

  public function run()
  {
    if ($this->match()) {
      $path = 'App\controllers\\' . ucfirst($this->params['controller']) . 'Controller';

      if (class_exists($path)) {
        $action = $this->params['action'] . 'Action';

        if (method_exists($path, $action)) {
          $controller = new $path($this->params);
          $controller->$action();
        } else {
          echo 'Action not defined';
        }
      } else {
        echo 'Class: ->' . $path . '<- not defined';
      }
    } else {
      echo 'Path not defined';
    }
  }
}