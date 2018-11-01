<?php
declare(strict_types=1);

return [
    '/hello-world' => [
        '_handler' => \App\Handler\HelloWorld::class
    ],
    '/jobs' => [
        '_handler' => \App\Handler\QueryJobs::class,
        '_services' => ['jobs_repository']
    ]
];
