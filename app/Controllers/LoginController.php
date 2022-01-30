<?php

namespace Horus\App\Controllers;

use Horus\Core\Controller;

class LoginController extends Controller{


    public function loginValidate(){

        /**
         * Capturo loa valores enviados desde el formulario
         */
        $data['username']   = $_POST['username'];
        $data['passwd']     = md5($_POST['passwd']);

        /**
         * Obtengo los valores para las sesiones
         */
        $model = new \Horus\App\Models\LoginModel();
        $results = $model->validate($data);
        $session = new \Horus\App\Services\SessionUp();

        /**
         * Verifico si la respuesta es object y creo las sessions, 
         * si no es object es por que no esta registrado en el sistema.
         */
        if( is_object( $results )) :
            $session->up($results);
        endif;

        
        if( \Horus\App\Services\SessionUp::exists() ) :
            redirect('/dashboard');
        else : 
            redirect('/login');
        endif;
    }

    public function logout() {
        $session = new \Horus\App\Services\SessionUp();
        $session->down();
        redirect('/login');
    }
}