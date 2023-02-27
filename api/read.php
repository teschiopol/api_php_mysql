<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include_once('core/initialize.php');

$post = getClass($_REQUEST['class'],$db);

$id = $_GET['id'] ?? null;

$result = $post->read($id);

$crow = $result->rowCount();

if($crow > 0){
    $post_arr = [];
    $post_arr['count'] = $crow;
    $post_arr['data'] = [];

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row, EXTR_OVERWRITE);
        $fields = $post->getFields();
        $post_item = array();
        foreach ($fields as $field){
            $post_item[$field] = $$field;
        }

        $post_arr['data'][] = $post_item;
    }

    echo json_return($post_arr, 'response');
    return;
}

echo json_return('No '.$_REQUEST['class'].' found.');
