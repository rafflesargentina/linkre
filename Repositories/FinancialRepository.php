<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Financial;

use Caffeinated\Repository\Repositories\EloquentRepository;

class FinancialRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Financial::class;

    /**
     * @var array
     */
    public $tag = ['Financial'];
}
