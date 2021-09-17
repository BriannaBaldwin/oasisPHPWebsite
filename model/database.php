<?php

/*
 * Date: 09/17/2021
 * Name: Brianna Baldwin
 * Description: Class to connect to database with constructor
 * Mod Log:
 *      09/17/2021 - added database class
 */

class Database {

    private static $dsn = 'mysql:host=localhost;dbname=oasis';
    private static $username = 'oasis_user';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {
        
    }

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                        self::$username,
                        self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./database_error.php');
                //echo 'Error connecting';
                exit();
            }
        }

        return self::$db;
    }

}

?>