<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\LeadRequest;
use Raffles\Modules\Linkre\Repositories\LeadRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;

class LeadController extends ApiResourceController
{
    protected $formRequest = LeadRequest::class;

    protected $repository = LeadRepository::class;

    protected $resourceName = 'leads';
}
