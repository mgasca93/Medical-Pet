<?php

namespace Horus\App\Models;

use Horus\Core\Model;

class RegisterModel extends Model{

    public function validateEmail(array $data = []){
        $flag = false;

        if(array_key_exists('email', $data)) :

            $this->query = "SELECT email FROM users WHERE email = '$data[email]'";

            $this->open_connection();
            $results =  $this->conn->query($this->query);

            if($results->rowCount() > 0) :
                $flag = true;
            endif;

            $this->close_connection();
            
        endif;

        return $flag;
    }

    public function validateUsername(array $data = []){
        $flag = false;

        if(array_key_exists('username', $data)) :
            
            $this->query = "SELECT username FROM users WHERE username = '$data[username]'";

            $this->open_connection();
            $results =  $this->conn->query($this->query);

            if($results->rowCount() > 0) :
                $flag = true;
            endif;

            $this->close_connection();
            
        endif;

        return $flag;
    }

    public function insert(array $data){

        $results = [];
        if(!$this->userExists($data)) :

            $this->query = "INSERT INTO users(name, lastname, username, passwd, email, user_type_id)
            VALUES
            ('$data[firstname]', '$data[lastname]', '$data[username]', '$data[passwd]', '$data[email]', 3)";
            $results = $this->execute_query();

        endif;

        return $results;
    }

    private function userExists(array $data){

        $flag = false;
        $this->query = "SELECT * FROM users WHERE username = '$data[username]' AND email = '$data[email]' AND passwd = '$data[passwd]'";
        
        $this->open_connection();
        $results =  $this->conn->query($this->query);

        if($results->rowCount() > 0) :
            $flag = true;
        endif;

        $this->close_connection();

        return $flag;
    }
}