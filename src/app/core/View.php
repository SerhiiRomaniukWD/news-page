<?php

namespace App\core;

class View
{
  public $path;
  public $route;
  public $layout = 'default';
  public function __construct($route)
  {
    $this->route = $route;
    $this->path = $route['controller'] . '/' . $route['action'];
  }

  public function render($title, $vars = [])
  {
    if (file_exists('App/views/' . $this->path . '.php')) {
      ob_start();
      require_once 'App/views/' . $this->path . '.php';
      $content = ob_get_clean();
      require_once 'App/views/layouts/' . $this->layout . '.php';
    } else {
      echo 'File not found';
    }
  }

  public function errorCode($type)
  {
    http_response_code($type);
  }
}