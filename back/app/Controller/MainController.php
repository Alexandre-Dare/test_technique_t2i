<?php

namespace App\Controller;

use App\Model\Person;

class MainController {

    public function home() {
        $persons = Person::findAll();
    }
}