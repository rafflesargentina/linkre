<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\CompanyRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class CompanyController extends ApiResourceController
{
    protected $repository = CompanyRepository::class;

    protected $resourceName = 'companies';
}
