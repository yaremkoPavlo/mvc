<?php
namespace Core;

// TODO: make render templates

class View
{
    public static function render($view, $args = [])
    {
        if ($view == null) 
            return;
        $viewPath = dirname(__DIR__) . '/bootstrap/views/' . $view . '.php';

        self::req_one($viewPath, $view, $args);
    }

    public static function renderTemplate($template, $view, $args = [])
    {
        $templPath = dirname(__DIR__) .'/bootstrap/templates/' . $template . '.php';
        self::req_one($templPath, $view, $args);


    }

    protected static function req_one($viewPath, $view, $args = [])
    {
        if (file_exists($viewPath)) {
           return require_once($viewPath);
        } else {
           throw new \Exception("$viewPath not found"); 
        }
    }
}