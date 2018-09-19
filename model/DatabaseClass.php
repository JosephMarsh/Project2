<?php



/************************************************************
 * Description: Database access class
 * This class creates the access path the database
 * It also stores user name and password data
 * @author jmarsh
 ***********************************************************/
class DatabaseClass {
    private static $dsn = 'mysql:host=localhost;dbname=project1';
    private static $username = 'root';
    private static $password = 'pa55word';
    private static $db;
    //constructor
    private function __construct() {}
    
    //Datbase object creation
    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}