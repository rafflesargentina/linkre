<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Repositories\ReportRepository;

use RafflesArgentina\ResourceController\ApiResourceController;

class ReportController extends ApiResourceController
{
    protected $repository = ReportRepository::class;

    protected $resourceName = 'reports';

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/reports/';
    }
}
