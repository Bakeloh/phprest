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
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name'  => $category_name,
            'created_at' => $created_at,
        );
        //push to "data"
        array_push($posts_arr['data'], $post_item);
    }
    //convert  data array into json and echo it
    echo json_encode($posts_arr);
} else{
    // if there is no value in result variable then print error message
    $posts_arr['message']= "No posts found.";
    echo json_encode($posts_arr);

}

