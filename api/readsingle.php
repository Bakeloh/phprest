<?php
//hearders
hearder('Access-Control-Allow-Origin: *');  // allow all origins, you can specify your own domain i
header("Content-Type: application/json");   // set content type to json

//initializing our api
include_once('../core/initialize.php');	 

//instantiate post
$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id']  : die();
$post-read_single( );

$post_arr = array(
    'id'=> $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name,
);

//make a json
print_r(json_encode($post_arr));

