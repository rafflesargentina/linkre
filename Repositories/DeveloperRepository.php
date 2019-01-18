<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Developer;

use Caffeinated\Repository\Repositories\EloquentRepository;

class DeveloperRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Developer::class;

    /**
     * @var array
     */
    public $tag = ['Developer'];
}
