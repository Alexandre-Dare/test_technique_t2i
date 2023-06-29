<?php

namespace App\Controller;

class ErrorController extends coreController{

    public function err404() {
        //return 404 header
        header('HTTP/1.0 404 Not Found', true, 404);
    }
}