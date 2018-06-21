<?php

declare(strict_types=1);

namespace Base\Routing;

use Base\Templating\Templater;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use Symfony\Component\HttpFoundation\Request;

class Router
{
    public function route(Request $request)
    {
       $dispatcher = simpleDispatcher(function(RouteCollector $routeCollector) {
            $routeCollector->addRoute('GET', '/', 'Index::index');
            $routeCollector->addRoute('GET', '/user', 'Index::user');
       });

       $method = $request->getMethod();
       $uri = $request->getRequestUri();

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($method, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                $controllerName = "Portal\\" . substr($handler, 0, strpos($handler, '::')) . 'Controller';
                $actionName = substr($handler, strpos($handler, '::') + 2) . 'Action';
                $controller = new $controllerName(new Templater());
                $controller->$actionName($request);
                break;
        }
    }
}