<?php

namespace Horus\Core;

use Horus\Core\Router;

class App{


    /**
     * Metodo para declarar las rutas de la aplicacion
     */
    public function run()
    {

        $router = new Router();

        #Agregamos las rutas con el metodo add
        $router->add('', ['controller' => 'PagesController', 'action' => 'login']);
        $router->add('login', ['controller' => 'PagesController', 'action' => 'login']);
        $router->add('login/validate', ['controller' => 'LoginController', 'action' => 'loginValidate']);
        $router->add('logout', ['controller' => 'LoginController', 'action' => 'logout']);

        $router->add('dashboard', ['controller' => 'Dashboard\\DashboardController', 'action' => 'index']);
        $router->add('register', ['controller' => 'PagesController', 'action' => 'register']);
        $router->add('register/validate', ['controller' => 'RegisterController', 'action' => 'index']);
        $router->add('register/validate/email', ['controller' => 'RegisterController', 'action' => 'validateEmail']);
        $router->add('register/validate/username', ['controller' => 'RegisterController', 'action' => 'validateUsername']);

        #Se define la estructura de la ruta
        $router->add('{controller}/{action}');
        
        $router->dispatch($_SERVER['QUERY_STRING']);
    }

}