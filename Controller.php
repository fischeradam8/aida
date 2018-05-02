<?php

declare(strict_types=1);

class Controller
{
    public function control(string $fileName)
    {
        $page = file_get_contents($fileName);
        echo $page;
    }
}