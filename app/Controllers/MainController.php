<?php
namespace App\Controllers;
use Core\Controller;
use Core\View;

class MainController extends Controller
{
    public function index()
    {
        View::renderTemplate(
            'basic',
            'home',
            [
                'title' => 'test',
                'body' => 'home'
            ]
        );
    }

    public function anyAction($arr = [])
    {
        $this->index();
        header("HTTP/1.0 404 Not Found");
    }
}