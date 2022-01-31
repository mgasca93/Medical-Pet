<?php

namespace Horus\App\Services;

class SessionUp{


    /**
     * Esta funcion recibe un arreglo con los valores
     * para establecer las session
     */
    public function up(object $sessionsData){
        foreach($sessionsData as $clave => $valor){
            $_SESSION[$clave] = $valor;
        }
    }

    /**
     * Esta funcion recibe como argumento la clave de la session
     * en caso de ser establecida retorn todas las sessiones existen
     */
    public function get(string $clave = ''){
        if(strlen($clave) == 0){
            return $_SESSION;
        }else{
            return $_SESSION[$clave];
        }
    }

    /*
    * Esta funcion se encarga de verificar 
    * si existen sessiones activas
    */
    public static function exists(){
        if(isset($_SESSION['id'])){
            return true;
        }else{
            return false;
        }
    }


    /*
    * Esta funcion se encarga de destruir 
    * todas las sessiones
    */
    public function down(){
        session_unset();
        session_destroy();
    }
}