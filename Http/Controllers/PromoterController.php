<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\PromoterRequest;
use Raffles\Modules\Linkre\Repositories\PromoterRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class PromoterController extends ApiResourceController
{
    protected $formRequest = PromoterRequest::class;

    protected $repository = PromoterRepository::class;

    protected $resourceName = 'promoters';
}
