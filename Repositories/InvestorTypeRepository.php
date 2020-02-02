<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\InvestorType;

use Caffeinated\Repository\Repositories\EloquentRepository;

class InvestorTypeRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = InvestorType::class;

    /**
     * @var array
     */
    public $tag = ['InvestorType'];
}
