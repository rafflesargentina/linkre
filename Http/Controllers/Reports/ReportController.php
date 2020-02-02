<?php

namespace Raffles\Modules\Linkre\Http\Controllers\Reports;

use Raffles\Modules\Linkre\Http\Requests\ReportRequest;
use Raffles\Modules\Linkre\Repositories\ReportRepository;

use DB;
use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ReportController extends ApiResourceController
{
    protected $formRequest = ReportRequest::class;

    protected $repository = ReportRepository::class;

    protected $resourceName = 'reports';

    /**
     * Create a new ReportController instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:api')->only('store', 'update', 'destroy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request The request object.
     *
     * @throws ResourceControllerException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = $request->user('api');
        $request->merge(['user_id' => $user->id]);

        return parent::store($request);
    }

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/reports/';
    }

    /**
     * Get the name of the file.
     *
     * @param UploadedFile $uploadedFile The UploadedFile object.
     *
     * @return string
     */
    protected function getFilename(UploadedFile $uploadedFile)
    {
        $extension = $uploadedFile->guessExtension();
        $filename = $uploadedFile->getClientOriginalName();

        return $filename;
    }
}
