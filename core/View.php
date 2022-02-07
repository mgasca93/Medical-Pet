<?php

namespace Horus\Core;

/**
 * View
 *
 * PHP version 7.0
 */


class View
{

    /**
     * Render a view file
     *
     * @param string $view  The view file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $errors = messageRedirect();
        $message = new Messages();
        foreach($errors as $index => $value){
            $message->$index = $value;
        }
    
        $file = dirname(__DIR__) . "/resources/Views/$view";  // relative to Core directory

        if (is_readable($file)) {
            require_once $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

}
