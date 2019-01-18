<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Investor;

use Caffeinated\Repository\Repositories\EloquentRepository;

class InvestorRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Investor::class;

    /**
     * @var array
     */
    public $tag = ['Investor'];
}
