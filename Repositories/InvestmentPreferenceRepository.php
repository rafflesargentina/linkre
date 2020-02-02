<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\InvestmentPreference;

use Caffeinated\Repository\Repositories\EloquentRepository;

class InvestmentPreferenceRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = InvestmentPreference::class;

    /**
     * @var array
     */
    public $tag = ['InvestmentPreference'];
}
