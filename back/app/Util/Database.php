<?php

namespace App\Util;

use PDO;

class Database
{
    /**
     * PDO object represent the database connexion
     *
     * @var PDO
     */
    private $dbh;
    /**
     * static property that use to store the unique object instance
     * @var Database
     */
    private static $instance;
    private function __construct()
    {
        //get config data and use 'parse_ini_file' to parsing the file and return an associative array
        $configData = parse_ini_file(__DIR__ . '/../config.ini');

        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // displaying error
            );
        // if an error appear we catch it and return the  error
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    /**
     * Method to return in each case PDO object of the unique instance of Database
     *
     * @return PDO
     */
    public static function getPDO()
    {
        //if the instance is not created yet we create it and store it in $instance
        if (empty(self::$instance)) {
            self::$instance = new Database();
        }
        // else we just have to return the object
        return self::$instance->dbh;
    }
}