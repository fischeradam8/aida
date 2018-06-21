<?php

namespace Portal;

use Base\Controlling\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function indexAction(Request $request)
    {
        $page = file_get_contents('portal.html');
        $this->templater->renderTemplate($page);
    }

    public function userAction(Request $request)
    {
        $page = file_get_contents('user.html');
        $variables = $this->getVarsFromQuery($request);
        $this->templater->renderTemplate($page, $variables);
    }
}