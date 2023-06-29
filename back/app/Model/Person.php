<?php

namespace App\Model;

use PDO;
use App\Util\Database;

class Person {
    
    /**
     * @var int
     */
    private $id_person;
    
    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var date
     */
    private $birthdate;

    /**
     * @var string
     */
    private $mail_adress;

    /**
     * @var string
     */
    private $adress;

    /**
     * @var int
     */
    private $company_id;

    /**
     * @var bool
     */
    private $in_alert;
    



     /**
     * Method to get all Person stored in db
     *
     * @return Person[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `person`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Model\Person');
        //transform the object in array for JSON convertion
        foreach ($results as $person) {
            $arrayResult[] = get_object_vars($person);
        }
        //json convertion
        $jsonData = json_encode($arrayResult, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT, 2);
        //return the result
        return $jsonData;
    }

    
}