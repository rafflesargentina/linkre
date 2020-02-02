<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Lead;

use Caffeinated\Repository\Repositories\EloquentRepository;

class LeadRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Lead::class;

    /**
     * @var array
     */
    public $tag = ['Lead'];
}
