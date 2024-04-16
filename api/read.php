<?php
//hearders
hearder('Access-Control-Allow-Origin: *');  // allow all origins, you can specify your own domain i
header("Content-Type: application/json");   // set content type to json

include_once('../core/initialize.php');	 // include the config file for database connection

//instantiate post
$post = new Post($db);

//blog post query
$reuslt = $post->read();
//get row count
$run = $reuslt->rowCount();
if ($run > 0) {
    //create an array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result ->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name'  => $category_name,
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
 