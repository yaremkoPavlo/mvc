<?php
ini_set('display_errors',1);
error_reporting (E_ALL);

include 'autoloader.php';

use router\Router;

$router = new Router();
$router->parseUrl();