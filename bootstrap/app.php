<?php

use Core\Router;
use Core\Auth;

session_start();



$routes = require_once __DIR__ . '/../config/routes.php';

//$router = new Router();
if (!Auth::isAuth()) {
    Router::redirect('/login');
}
Router::setRoutes($routes);
Router::dispatch($_SERVER['REQUEST_URI']);
