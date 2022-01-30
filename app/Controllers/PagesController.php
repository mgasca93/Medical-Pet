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

        View::render('Templates/header.php',[
            'title' => 'Login'
        ]);
        View::render('Login/index.php');
        View::render('Templates/footer.php');

    }

    public function register(){

        View::render('Templates/header.php',[
            'title' => 'Registro'
        ]);
        View::render('Register/index.php');
        View::render('Templates/footer.php');

    }

}