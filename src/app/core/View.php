<?php

namespace App\core;

class View
{
  public $path;
  public $route;
  public $layout;
  public function __construct($route)
  {
    $this->route = $route;
    $this->path = $route['controller'] . '/' . $route['action'];
  }

  public function render($title, $data = [])
  {
    $this->layout = $this->route['controller'];
    $path = 'App/views/' . $this->path . '.php';

    if (file_exists($path)) {
      ob_start();
      require_once $path;
      $content = ob_get_clean();
      require_once 'App/views/layouts/' . $this->layout . '.php';
    } else {
      self::errorCode(404);
    }
  }

  public function redirect($url)
  {
    header('Location: ' . $url);
    exit;
  }

  public static function errorCode($status_code)
  {
    http_response_code($status_code);
    $error_path = 'App/views/errors/' . $status_code . '.php';

    file_exists($error_path) ? require_once $error_path : exit;
  }
}