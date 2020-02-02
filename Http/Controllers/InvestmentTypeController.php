<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\InvestmentTypeRequest;
use Raffles\Modules\Linkre\Repositories\InvestmentTypeRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class InvestmentTypeController extends ApiResourceController
{
    ///protected $formRequest = InvestmentRequest::class;

    protected $repository = InvestmentTypeRepository::class;

    protected $resourceName = 'investment-types';
}
