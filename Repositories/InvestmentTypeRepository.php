<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\InvestmentType;

use Caffeinated\Repository\Repositories\EloquentRepository;

class InvestmentTypeRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = InvestmentType::class;

    /**
     * @var array
     */
    public $tag = ['InvestmentType'];
}
