<?php
ini_set('display_errors',1);
error_reporting (E_ALL);

use controllers\FrontController;

spl_autoload_register( function ($class)
    {
        $path = str_replace('\\', '/', $class) . '.php';
        if (file_exists($path))
        {
            require_once "$path";
        }
    }
);

$fc = new FrontController();
$fc->run();

