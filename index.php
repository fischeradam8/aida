<?php

declare(strict_types=1);

require "vendor/autoload.php";

use Base\Container\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$container = new \Pimple\Container();
$containerBuilder = new ContainerBuilder();
$containerBuilder->register($container);

list($controllerName, $actionName) = $container['router']->route($request);
$container[$controllerName]->$actionName($request);