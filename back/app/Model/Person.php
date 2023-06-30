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
        header('Content-Type: application/json');
        echo $jsonData;
        //return the result
        return $jsonData;
    }


    /*--------------
    ------CRUD------
    ------------- */
    
    public function create() {

        //this array will content the errors if that appear
        $errorList = [];

        // getting data from Form
        $lastname = filter_input(INPUT_POST, 'lastname');
        $firstname = filter_input(INPUT_POST, 'firsname');
        $phone = filter_input(INPUT_POST, 'phone');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $mail_adress = filter_input(INPUT_POST, 'mail_adress', FILTER_VALIDATE_EMAIL);
        $adress = filter_input(INPUT_POST, 'adress');
        $company_id = filter_input(INPUT_POST, 'comp$company_id', FILTER_VALIDATE_INT);
        $in_alert = filter_input(INPUT_POST, 'in_alert');
        dump($_POST);

        dump($lastname, $firstname, $phone, $birthdate, $mail_adress, $adress, $company_id, $in_alert);
    }
    
}