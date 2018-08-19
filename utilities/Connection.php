<?php

namespace Blip\Utilities;


use \Dotenv;

use \PDO;

/**
 * PDO object for database access.
 * An instance is returned with the construction of any
 * Controller classes that need to talk to the database.
 * Config via phpdotenv
 * 
 */
class Connection
{

    protected static $new_pdo;
    
    /**
     * Loads environment variables and builds a new PDO instance
     * 
     * @return PDO
     */
    public static function getConnection()
    {
        $dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
        $dotenv->load();

        $host = getenv('CC_HOST');
        $db = getenv('CC_DB');
        $user = getenv('CC_USER');
        $pass = getenv('CC_PASS');
        $charset = getenv('CC_CHARSET');
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {

            self::$new_pdo = new PDO($dsn, $user, $pass, $opt);

            return self::$new_pdo;

        } catch (PDOException $e) {

            die($e->getMessage());

        }
    }

    public function __destruct()
    {

        unset(self::$new_pdo);

    }
}