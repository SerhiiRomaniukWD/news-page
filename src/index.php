<?php

require_once __DIR__ . '/vendor/autoload.php';
session_start();

use App\core\Router;

$router = new Router();

$router->run();