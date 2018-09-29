<?php
    $dsn = 'mysql:host=localhost;dbname=locations';
    $username = 'root';
    $password = '';
    $db;
    //Setting variables
    
    try {
        $db = new PDO($dsn, $username, $password);
        //Try create a PDO
    } catch (PDOException $e) {
        //If error caught exit
        exit();
    }
?>