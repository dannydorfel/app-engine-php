<?php
declare(strict_types=1);

namespace App\Repository;

use App\Model\Job;

class Jobs
{
    public function find(string $keyword): array
    {
        return [(new Job())->toArray()];
    }
}
