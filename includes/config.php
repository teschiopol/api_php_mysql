<?php

$db_user = 'lara';
$db_password = 'lara';
$db_name = 'laravel';
$db_host = 'localhost';
$db_port = '';

if (!empty($db_port)){
    $db_port = ':' . $db_port ;
}

$query_connection = 'mysql:host=' . $db_host . $db_port . ';dbname='. $db_name.';';

$db = new PDO($query_connection, $db_user, $db_password);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

const APP_NAME = 'PHP-API';
