<?php
/*************************************************************
 * Joseph Marsh
 * Project 2
 * updated dbname, password and user name 9/5/2018
 * Turned into a Class file on 9/20/18
 ************************************************************/


// this is codet that teaches the app how to access my DB
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=project1';
    private static $username = 'root';
    private static $password = 'pa55word';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
} 

?>