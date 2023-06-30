<?php

namespace App\Controller;

use App\Model\Person;

class PersonController extends coreController {

    public function create(){
        $person = new Person;
        $person->create();
    }
}