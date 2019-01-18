<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\InvestmentRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class InvestmentController extends ApiResourceController
{
    protected $repository = InvestmentRepository::class;

    protected $resourceName = 'investments';
}
