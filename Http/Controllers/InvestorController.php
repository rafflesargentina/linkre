<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\InvestorRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class InvestorController extends ApiResourceController
{
    protected $repository = InvestorRepository::class;

    protected $resourceName = 'investors';
}
