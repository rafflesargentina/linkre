<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\InvestorTypeRequest;
use Raffles\Modules\Linkre\Repositories\InvestorTypeRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class InvestorTypeController extends ApiResourceController
{
    ///protected $formRequest = InvestorRequest::class;

    protected $repository = InvestorTypeRepository::class;

    protected $resourceName = 'investor-types';
}
