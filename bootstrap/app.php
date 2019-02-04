<?php

use App\Controllers\FrontController;
use Core\Router;

$routes = require_once __DIR__ . '../config/routes.php';

$router = new Router();
$router->setRoutes($routes);

$fc = new FrontController($router);
$fc->run();

?>