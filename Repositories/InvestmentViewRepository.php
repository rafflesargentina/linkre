<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\InvestmentView;

use Caffeinated\Repository\Repositories\EloquentRepository;

class InvestmentViewRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = InvestmentView::class;

    /**
     * @var array
     */
    public $tag = ['InvestmentView'];
}
