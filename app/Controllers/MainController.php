<?php
namespace App\Controllers;
use Core\Controller;

class MainController extends Controller
{
    public function index()
    {
        #$this->view->renderMain('welcome');
        echo "Hello!";
    }
}