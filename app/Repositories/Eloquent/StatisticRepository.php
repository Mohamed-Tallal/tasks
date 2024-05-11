<?php

namespace App\Repositories\Eloquent;

use App\Models\Statistic;
use App\Repositories\Interfaces\StatisticRepositoryInterface;

class StatisticRepository extends BaseRepository implements StatisticRepositoryInterface
{
    public function __construct(Statistic $model)
    {
        parent::__construct($model);
    }
}
