<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Promoter;

use Caffeinated\Repository\Repositories\EloquentRepository;

class PromoterRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Promoter::class;

    /**
     * @var array
     */
    public $tag = ['Promoter'];
}
