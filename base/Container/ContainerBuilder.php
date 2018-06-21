<?php

declare(strict_types=1);

namespace Base\Container;

use Base\Routing\Router;
use Base\Templating\Templater;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Portal\IndexController;

class ContainerBuilder implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['templater'] = $pimple->factory(function () {
            return new Templater();
        });

        $pimple['index_controller'] = $pimple->factory(function ($c) {
            return new IndexController($c['templater']);
        });

        $pimple['router'] = $pimple->factory(function () {
            return new Router();
        });
    }
}