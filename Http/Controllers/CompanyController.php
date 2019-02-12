<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\CompanyRequest;
use Raffles\Modules\Linkre\Repositories\CompanyRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class CompanyController extends ApiResourceController
{
    protected $formRequest = CompanyRequest::class;

    protected $repository = CompanyRepository::class;

    protected $resourceName = 'companies';

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/companies/';
    }
}
