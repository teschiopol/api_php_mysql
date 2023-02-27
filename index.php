<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
*/

// http://localhost:8888/laravel/api/post/read.php?id=3
[$class, $action] = explode('/', explode('api/', $_SERVER['REQUEST_URI'])[1]);

$_REQUEST['class'] = ucfirst(strtolower($class));
if(strpos($action,'?') !== false){
    [$action, $params] = explode('?', $action);
    $params = explode('&', $params);
    foreach($params as $param){
        $param = explode('=', $param);
        $_REQUEST[$param[0]] = $param[1];
    }
}

require ('api/' . $action);
