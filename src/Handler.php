<?php
declare(strict_types=1);

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface Handler
{
    public function handle(Request $request): Response;
}
