<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'app/lib/Dev.php';
session_start();

$test = new \App\core\Router();

$test->run();