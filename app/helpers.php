<?php

/**
 * Valida que la ruta que se recibe como parametro
 * coincida con la ruta actual
 *
 * @return string
 */
function isItemActive( $routeName ) {
    return ( $routeName == $_SERVER['QUERY_STRING'] ) ? 'item-active' : '';
}

/**
 * Concatena el titulo de la página con el 
 * nombre de la tienda y lo retorna
 *
 * @return string
 */
function setTitle( $title = '' ) {
    $pageTitle = 'Medical Pet';

    if( strlen( $title ) > 0 && isset( $title )) {
        $pageTitle .= ' | ' . $title;
    }

    return $pageTitle;
}

/**
 * Esta funcion me permite debuggear cualquier
 * tipo de datos y detiene la ejecución de la 
 * aplicacion
 *
 * @return <pre></pre>
 */
function debug( $data ) {
    echo "<pre>";print_r($data);echo"</pre>";
}

/**
 * Esta funcion me permite redireccionar a la ruta
 * que recibe como parametro
 *
 * @return void
 */
function redirect( $url, $data = [] ) {

    $response = array();
    if(array_key_exists('errors', $data) || array_key_exists('success', $data)) :
        foreach($data as $clave => $valor) :
            switch($clave) :

                case 'errors' :
                    $response['status'] = 'error';
                    $response['text'] = $valor;
                break;
                case 'success' :
                    $response['status'] = 'success';
                    $response['text'] = $valor;
                break;

            endswitch;
        endforeach;
    endif;
    
    $_SESSION['message'] = $response;

    header( "location: $url" );    
    die();
}

/**
 * Funcion que me permite crear un mensaje
 * flash a partir de una session nombrada message
 * 
 * @return string
 */
function messageRedirect() : array{

    $message = (isset($_SESSION['message'])) ? $_SESSION['message'] : [];
    unset($_SESSION['message']);
    return $message;
}


/**
 * Valido si existe una session activa
 * y retorno un flag
 *
 * @return bool
 */
function auth() {
    $flag = false;
    if( \Horus\app\Services\SessionUp::exists() ) : 
        $flag = true;
    endif; 

    return $flag;
}

/**
 * Valido si existe una session activa
 * y retorno un flag
 *
 * @return bool
 */
function guest() {
    $flag = true;
    if( \Horus\app\Services\SessionUp::exists() ) : 
        $flag = false;
    endif; 

    return $flag;
}