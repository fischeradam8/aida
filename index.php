<?php

declare(strict_types=1);

require "vendor/autoload.php";

use Base\Controlling\Controller;
use Base\Routing\Router;
use Base\Templating\Templater;

$controller = new Controller(new Templater());
$router = new Router();
$controller->control($router->route($_SERVER["REQUEST_URI"]), [
    'name' => 'Joe',
    'age' => '10'
]);