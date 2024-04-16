<?php

    $db_user = 'root';
    $db_pass = '';
    $db_name = 'phprest';

    $db = new PDO('mysql:host=127.0.0.1;dbname=$db_name='.db_name.';charset=utf8',$db_user,$db_password); // replace with your MySQL server information

    //db attributes
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);   //turn off emulated prepares
    $db->setAttribute(PDO::ATTR_USE_BUFFERED_QUERY, true);  //use server-side buffering
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //make sure we catch errors

    define('APP_NAME', 'PHP REST API');

?>