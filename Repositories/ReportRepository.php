<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Report;

use Caffeinated\Repository\Repositories\EloquentRepository;

class ReportRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Report::class;

    /**
     * @var array
     */
    public $tag = ['Report'];
}
