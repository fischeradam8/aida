<?php

declare(strict_types=1);

namespace Base\Controlling;

use Base\Templating\Templater;

class Controller
{

    private $templater;

    public function __construct(Templater $templater)
    {

        $this->templater = $templater;
    }

    public function control(string $fileName, array $variables = null)
    {
        $page = file_get_contents($fileName);
        $this->templater->renderTemplate($page, $variables);
    }

}