<?php
namespace App\Controllers;
use Core\Controller;
use Core\View;

class MainController extends Controller
{
    public function index($arr = [])
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
}