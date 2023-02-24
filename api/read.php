<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$post = new Post($db);

$id = $_GET['id'] ?? null;

$result = $post->read($id);

$crow = $result->rowCount();

if($crow > 0){
    $post_arr = [];
    $post_arr['count'] = $crow;
    $post_arr['data'] = [];

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row, EXTR_OVERWRITE);
        $post_item = array(
          'id' => $id,
          'title' => $title,
          'body' => html_entity_decode($body),
          'author' => $author,
          'category_id' => $category_id,
          'category_name' => $category_name,
          'created_at' => $created_at
        );
        $post_arr['data'][] = $post_item;
    }

    echo json_encode($post_arr);
    return;
}

echo json_encode(array('message' => 'No posts found.'));
