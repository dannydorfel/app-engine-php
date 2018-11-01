<?php
declare(strict_types=1);

namespace App\Handler;

use App\Handler;
use App\Repository\Jobs;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QueryJobs implements Handler
{
    /**
     * @var Jobs
     */
    private $jobs;

    public function __construct(Jobs $jobs)
    {
        $this->jobs = $jobs;
    }

    public function handle(Request $request): Response
    {
        return new JsonResponse($this->jobs->find($request->get('q')));
    }
}
