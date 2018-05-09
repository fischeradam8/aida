<?php

declare(strict_types=1);

namespace Base\Templating;

class Templater
{
    public function renderTemplate(string $file, array $variables=null)
    {
        preg_match_all('/(?<=\{\{).*(?=\}\})/', $file, $variablesInFile);
        foreach ($variablesInFile[0] as $variableInFile) {
            $file = str_replace('{{' . $variableInFile . '}}',  $variables[$variableInFile], $file);
        }
        echo $file;
    }

}