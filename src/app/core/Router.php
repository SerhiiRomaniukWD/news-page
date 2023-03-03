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
    $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
    $route = '#^'.$route.'$#';
    $this->routes[$route] = $params;
  }

  public function match()
  {
    $url = trim($_SERVER['REQUEST_URI'], '/');

    foreach ($this->routes as $route => $params) {
      if (preg_match($route, $url, $matches)) {
        foreach ($matches as $key => $match) {
          if (is_string($key)) {
            if (is_numeric($match)) {
              $match = (int) $match;
            }
            $params[$key] = $match;
          }
        }
        $this->params = $params;

        return true;
      }
    }

    return false;
  }

  public function run()
  {
    if ($this->match()) {
      $controller_path = 'App\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
      $action = $this->params['action'] . 'Action';

      if (class_exists($controller_path) && method_exists($controller_path, $action)) {
        $controller = new $controller_path($this->params);
        $controller->$action();
      } else {
        View::errorCode(404);
      }
    } else {
      View::errorCode(404);
    }
  }
}