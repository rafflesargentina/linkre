<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\InvestmentValueRequest;
use Raffles\Modules\Linkre\Repositories\InvestmentValueRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class InvestmentValueController extends ApiResourceController
{
    ///protected $formRequest = InvestmentRequest::class;

    protected $repository = InvestmentValueRepository::class;

    protected $resourceName = 'investment-types';
}
