<?php

//in this file we require main files
require_once 'controllers/FrontController.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'config/Constants.php';
require_once 'config/DBconfig.php';
require_once 'observer/Observer.php';
require_once 'observer/Subject.php';
require_once 'observer/AuthObserver.php';

//function autoLoader ($class) {
//    $class = ROOT . str_replase('\\', '/', $class) . '.php';
//    if (file_exists($class)) {
//        require_once $class;
//    }
//}
//spl_autoload_register('autoLoader');