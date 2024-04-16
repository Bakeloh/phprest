<?php

class post(
    //db stuff
    private $conn;
    private $table = "posts";

    //post properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author_at;

    //constaractor with db connection
    public function __construct($db){
       $this->conn = $db;
    } 
    //getting post from database
    public function read(){
        //create query
        $query = 'SELECT 
        c.name as category_name,
        p.id,
        p.category_id,
        p.title,
        p.body,
        p.author,
        p.create_at
        FROM
        '.$this->table.'  p
        LEFT JOIN
        categories c ON c.id=p.category_id';
    }
)

?>