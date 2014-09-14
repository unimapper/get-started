<?php

namespace GetStarted;

use Nette\Application\Routers\RouteList,
    Nette\Application\Routers\Route;

class RouterFactory
{

    /**
     * @return \Nette\Application\IRouter
     */
    public function createRouter()
    {
        $router = new RouteList;

        $router[] = new Route('index.php', 'Front:Homepage:', Route::ONE_WAY);

        $router[] = $frontRouter = new RouteList('Front');
        $frontRouter[] = new Route('<presenter>/<action>[/<id>]', 'Orders:default');

        return $router;
    }

}