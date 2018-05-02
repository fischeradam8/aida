<?php

    require_once 'Controller.php';
    require_once 'Router.php';

    isset($_REQUEST['param']) ? $queryParams = $_REQUEST['param'] : $queryParams = null;
    $controller = new Controller();
    $router = new Router();
    $controller->control($router->route($_SERVER["REQUEST_URI"]));


