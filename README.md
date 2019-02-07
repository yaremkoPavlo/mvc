## README
### How to use
All core file is located in `src/` directory with namespase `Core` <br />
Routes file is located in `config/` folder and contain assosiated array such as `'url' => 'controller/action/param1/param2/param3'` <br/>
To add routes use `setRoutes` method
<pre>
$router = new Router();
$router->setRoutes($routes);
</pre>
### Configuration
