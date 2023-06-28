<?php

namespace App\Controller;

abstract class coreController{

    protected $router;

    public function __construct($router)
    {
        $this->router = $router;
    }
}