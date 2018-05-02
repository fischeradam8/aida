<?php

declare(strict_types=1);

class Router
{
    public function route(string $uri)
    {
        return $this->map[$uri];
    }

    //TODO ez legyen kiszervezve
    private $map = [
        '/' => 'portal.html',
    ];
}