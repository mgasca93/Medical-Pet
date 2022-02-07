<?php

namespace Horus\App\Controllers;

use Horus\Core\Controller;
use Horus\Core\View;

class RegisterController extends Controller
{

    public function index() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") :

            foreach($_POST as $campo => $valor){
                $$campo = $valor;
            }
    
            $model = new \Horus\App\Models\RegisterModel();
            $response = $model->insert([
                'firstname' => $firstname, 
                'lastname' => $lastname,
                'username'  => $username,
                'email'     => $email,
                'passwd'    => md5($passwd)
            ]);
            if($response['status'] == 200) :
                $data['success'] = $response['message'];
            else :
                $data['errors'] = $response['message'];
            endif;
        else :
            $data['errors'] = 'Error al registrar al usuario, intente de nuevo mas tarde.';
        endif;

        redirect('/register', $data);
    }

    public function validateEmail() {
        $response = [];
        if(isset($_GET['email'])) :

            $response['status'] = '200';
            $model = new \Horus\App\Models\RegisterModel();
            $results = $model->validateEmail(['email' => $_GET['email']]);

            if($results) :

                $response['message'] = 'error';

            else :

                $response['message'] = 'success';

            endif;
        else :

            $response['status'] = '404';
            $response['message'] = 'error';
            
        endif;

        echo json_encode($response);
    }

    public function validateUsername() {
        $response = [];
        if(isset($_GET['username'])) :

            $response['status'] = '200';
            $model = new \Horus\App\Models\RegisterModel();
            $results = $model->validateUsername(['username' => $_GET['username']]);

            if($results) :

                $response['message'] = 'error';

            else :

                $response['message'] = 'success';

            endif;
        else :

            $response['status'] = '404';
            $response['message'] = 'error';

        endif;

        echo json_encode($response);
    }
}