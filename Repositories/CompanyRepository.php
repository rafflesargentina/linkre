<?php

namespace Raffles\Modules\Linkre\Repositories;

use Raffles\Modules\Linkre\Models\Company;

use Caffeinated\Repository\Repositories\EloquentRepository;

class CompanyRepository extends EloquentRepository
{
    /**
     * @var Model
     */
    public $model = Company::class;

    /**
     * @var array
     */
    public $tag = ['Company'];
}
