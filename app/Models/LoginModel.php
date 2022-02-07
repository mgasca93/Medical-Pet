<?php

namespace Horus\App\Models;

use PDO;
use Horus\Core\Model;

class LoginModel extends Model{


    public function validate(array $userData){

        $this->query = "SELECT users.*, user_type.name as rol FROM users INNER JOIN user_type ON users.user_type_id = user_type.id
        WHERE username = '$userData[username]' AND passwd = '$userData[passwd]'";
        
        $this->open_connection();
        $results =  $this->conn->query($this->query);
        $user = new \Horus\App\Models\User();

        if( $results->rowCount() == 1 ) :
            foreach( $results->fetch(PDO::FETCH_ASSOC) as $propiedad => $valor ) :
                $user->$propiedad = $valor;
            endforeach;

            /**
             * Valido si el usuario esta activo
             */
            if($user->status == '0') :
                $user = array();
                $user['status'] = 400;
                $user['message'] = 'El usuario se encuentra desactivado.';
            endif;
        else :
            $user = array();
            $user['status'] = 400;
            $user['message'] = 'El usuario no existe en el sistema';
        endif;
        
        $this->close_connection();
        return $user;
    }

}