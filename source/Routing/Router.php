<?php

declare(strict_types=1);

namespace Base\Routing;

class Router
{
    public function route(string $uri)
    {
        return $this->map[$uri];
    }

    //TODO ez legyen kiszervezve
    private $map = [
        '/' => 'portal.html',
        '/user' => 'user.html',
    ];
}