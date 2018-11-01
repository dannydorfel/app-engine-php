<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

$container = include __DIR__ . '/../app/container.php';

$kernel = new App\Kernel($container);
$response = $kernel->run();
$response->send();
