<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json"); 

include_once('../core/initialize.php');

$post = new Post($db);

$result = $post->read();
$num = $result->rowCount();
if($num > 0){
    $posts_arr = array();
    $posts_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id' => $id,
            
