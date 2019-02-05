<?php

use Core\Router;

$routes = require_once __DIR__ . '/../config/routes.php';

$router = new Router();
$router->setRoutes($routes);
$router->dispatch($_SERVER['REQUEST_URI']);
