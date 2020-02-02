<?php

namespace Raffles\Modules\Linkre\Http\Controllers\Reports;

use Raffles\Http\Controllers\Controller;
use Raffles\Modules\Linkre\Repositories\ReportRepository;

use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\Traits\FormatsValidJsonResponses;

class PublishedReportController extends Controller
{
    use FormatsValidJsonResponses;

    /**
     * Create a new PublishedReportController.
     *
     * @param ReportRepository $repository
     *
     * @return void
     */
    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $items = $this->repository->orderBy('id', 'asc')->findWhere(['published' => '1']);

        return $this->validSuccessJsonResponse('Success', $items);
    }
}
