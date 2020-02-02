<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\InvestmentValue;

use Caffeinated\Repository\Repositories\EloquentRepository;

class InvestmentValueRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = InvestmentValue::class;

    /**
     * @var array
     */
    public $tag = ['InvestmentValue'];
}
