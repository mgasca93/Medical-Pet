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
        $router->add('registro', ['controller' => 'PagesController', 'action' => 'register']);
        
        #Se define la estructura de la ruta
        $router->add('{controller}/{action}');
        $router->dispatch($_SERVER['QUERY_STRING']);
    }

}