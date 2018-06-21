<?php

declare(strict_types=1);

require "vendor/autoload.php";

use Base\Controlling\Controller;
use Base\Routing\Router;
use Base\Templating\Templater;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$controller = new Controller(new Templater());
$router = new Router();
$router->route($request);