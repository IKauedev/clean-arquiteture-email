<?php

use CleanArquiteture\Routes\Router;

require __DIR__ . '/../vendor/autoload.php';

$router = new Router();

$router->addRoute('/', 'HomeController');

$url = $_SERVER['REQUEST_URI'];
$router->route($url);