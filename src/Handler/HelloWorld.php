<?php
declare(strict_types=1);

namespace App\Handler;

use App\Handler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorld implements Handler
{
    public function handle(Request $request): Response
    {
        return new JsonResponse(['Hello' => 'World!']);
    }
}
