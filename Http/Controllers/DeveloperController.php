<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\DeveloperRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class DeveloperController extends ApiResourceController
{
    protected $repository = DeveloperRepository::class;

    protected $resourceName = 'developers';
}
