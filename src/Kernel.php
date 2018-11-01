<?php
declare(strict_types=1);

namespace App;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Kernel
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function run(): Response
    {
        $router = $this->container->get('router');
        $request = $this->container->get('request');

        try {
            $routeParameters = $router->matchRequest($request);
            return $this->getHandler($routeParameters)->handle($request);
        } catch (ResourceNotFoundException $exception) {
            return new Response(null, 404);
        }
    }

    private function getHandler(array $routeParameters): Handler
    {
        $servicesIds = $routeParameters['_services'] ?? [];

        $services = [];
        foreach ($servicesIds as $serviceId) {
            $services[] = $this->container->get($serviceId);
        }

        return new $routeParameters['_handler'](...$services);
    }
}
