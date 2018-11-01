<?php
declare(strict_types=1);

use \Pimple\Container;
use \Pimple\Psr11\Container as Psr11Container;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\Routing\Matcher\UrlMatcher;
use \Symfony\Component\Routing\RequestContext;
use \Symfony\Component\Routing\RouteCollection;
use \Symfony\Component\Routing\Route;

$container = new Container();

$container['request'] = Request::createFromGlobals();

$container['router'] = function (Container $c) {
    $routes = include 'routes.php';

    $routeCollection = new RouteCollection();
    foreach ($routes as $uri => $config) {
        $routeCollection->add($uri,  new Route($uri, $config));
    }

    $context = (new RequestContext)->fromRequest($c['request']);
    return new UrlMatcher($routeCollection, $context);
};

$container['jobs_repository'] = function () {
    return new \App\Repository\Jobs();
};

return new Psr11Container($container);
