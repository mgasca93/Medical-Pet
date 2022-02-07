<?php

namespace Horus\App\Controllers;

use Horus\Core\View;
use Horus\Core\Controller;

class Pagescontroller extends Controller{

    public function __construct()
    {
        $session = new \Horus\App\Services\SessionUp();
        if( $session->exists() ) : 
            redirect('/dashboard');
        endif;
    }
    
    public function login(){
        $data = [
            'title' => 'Login'
        ];
        View::render('Login/index.php', $data);

    }

    public function register(){
        $data = [
            'title' => 'Registro'
        ];
        View::render('Register/index.php', $data);
    }

}