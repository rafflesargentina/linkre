<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Investment;

use Caffeinated\Repository\Repositories\EloquentRepository;

class InvestmentRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Investment::class;

    /**
     * @var array
     */
    public $tag = ['Investment'];
}
