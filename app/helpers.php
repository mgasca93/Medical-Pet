<?php

function isItemActive($routeName){
    return ($routeName == $_SERVER['QUERY_STRING']) ? 'item-active' : '';
}

function setTitle($title = ''){
    $pageTitle = 'Medical Pet';

    if(strlen($title) > 0 && isset($title)){
        $pageTitle .= ' | ' . $title;
    }

    return $pageTitle;
}