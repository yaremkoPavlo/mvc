<?php
namespace router;
use config\routes;

class Router
{
    /**
     * @@return string
     */
    private function getUri()
    {
        $routes = require_once ('config/routes.php');
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($routes as $key => $value)
        {
            if (preg_match("~$key~", $uri))
            {
                $uri = $value;
                return $uri;
            }
        }

        return $uri;
    }

    /**
     * @return array
     */
    public function parseUri()
    {
        //default name of controller and action
        $controller_name = "default";
        $action_name = "index";

        $uri = $this->getUri();
        $uri = explode('/', $uri);

        //check available of
        if (empty($uri[0]))
        {
             $uri[0] = $controller_name;
        }
        if (empty($uri[1]))
        {
            $uri[1] = $action_name;
        }

        return $uri;
    }
}