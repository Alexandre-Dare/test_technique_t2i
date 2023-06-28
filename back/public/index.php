<?php 

/*----------------
---Autoloading----
----------------*/

//load automatically all class (PSR-4)
require_once '../vendor/autoload.php';

//instanciate the router
$router = new AltoRouter();

//check if sub folder exist
if(array_key_exists('BASE_URI', $_SERVER)){
    // so we define the new basePath for altorouter
    $router->setBasePath($_SERVER['BASE_URI']);
    //as it made our route matches with the following of the sub folder
} else { // else we set the default value cause "$_SERVER['BASE_URI]" is used by the coreController
    $_SERVER['BASE_URI'] = '/';
}


/*----------------
---Route Mapping--
----------------*/

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\App\Controller\MainController' 
    ],
    'main-home'
);



/* -------------
--- DISPATCH ---
--------------*/

// check if altorouter have a match
$match = $router->match();

// https://packagist.org/packages/benoclock/alto-dispatcher
// 1st param $match returned by altorouter
// 2nd param : "target" (controller & method) to thrown error
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// before dispatch we set the router to Controller param
$dispatcher->setControllersArguments($router);
// after config let's run the dispatcher
$dispatcher->dispatch();