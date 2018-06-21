<?php

declare(strict_types=1);

namespace Base\Controlling;

use Base\Templating\Templater;
use Symfony\Component\HttpFoundation\Request;

class Controller
{

    protected $templater;

    public function __construct(Templater $templater)
    {

        $this->templater = $templater;
    }

    public function control(string $fileName, array $variables = null, Request $request)
    {
        $page = file_get_contents($fileName);
        $this->templater->renderTemplate($page, $variables);
    }

    public function getVarsFromQuery(Request $request): ?array
    {
        if ($request->getQueryString() !== null) {
            $queryVariables = explode('&',$request->getQueryString());
            $variables = [];
            foreach ($queryVariables as $variable) {
                list($name, $value) = explode('=', $variable);
                $variables[$name] = $value;
            }
            return $variables;
        }
        return null;
    }

}