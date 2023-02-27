<?php

function json_return($message, $type = 'message'){
    return json_encode(array($type => $message));
}

function getClass($class, $param = NULL){
    return new $class($param);
}
