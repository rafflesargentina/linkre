<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\InvestmentPreferenceRequest;
use Raffles\Modules\Linkre\Repositories\InvestmentPreferenceRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class InvestmentPreferenceController extends ApiResourceController
{
    ///protected $formRequest = InvestmentRequest::class;

    protected $repository = InvestmentPreferenceRepository::class;

    protected $resourceName = 'investment-preferences';
}
