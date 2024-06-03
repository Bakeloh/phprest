<?php

class Post {
    // db stuff
    private $conn;
    private $table = "posts";

    // post properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // constructor with db connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // get posts from database
    public function read() {
        // create query
        $query = 'SELECT 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
        FROM
            ' . $this->table . ' p
        LEFT JOIN
            categories c ON p.category_id = c.id
        ORDER BY
            p.created_at DESC';

        // prepare statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
        FROM
            ' . $this->table . ' p
        LEFT JOIN
            categories c ON p.category_id = c.id
        WHERE
            p.id = ?
        LIMIT
            1';
        
        // prepare statement
        $stmt = $this->conn->prepare($query);
        // bind post ID to parameter
        $stmt->bindParam(1, $this->id);
        // execute the prepared statement
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->category_name = $row['category_name'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->category_id = $row['category_id'];
    }
}

?>


<!-- //continue from 
//https://www.youtube.com/watch?v=myZ66m0C8VQ&list=PLS1QulWo1RIYWjdoEC1WbT8W3XGGWVXfW&index=6 -->