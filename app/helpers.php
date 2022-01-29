<?php

function isItemActive($routeName){
    return ($routeName == $_SERVER['QUERY_STRING']) ? 'primary_txt fw-bold' : '';
}