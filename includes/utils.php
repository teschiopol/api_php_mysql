<?php

function json_return($message, $type = 'message'){
    return json_encode(array($type => $message));
}
