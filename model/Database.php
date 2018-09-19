<?php
/*************************************************************
 * Joseph Marsh
 * Project 2
 * updated dbname, password and user name 9/5/2018
 ************************************************************/


// this is codet that teaches the app how to access my DB
$dsn = 'mysql:host=localhost;dbname=project1';
    $username = 'root';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('errors/database_error.php');
        exit();
    }
?>