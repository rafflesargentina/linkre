<?php

namespace Raffles\Modules\Linkre\Http\Controllers\Reports;

use Raffles\Modules\Linkre\Http\Requests\ReportRequest;
use Raffles\Modules\Linkre\Models\Report;
use Raffles\Modules\Linkre\Repositories\{ FeedRepository, ReportRepository };

use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ReportController extends ApiResourceController
{
    use AuthorizesRequests;

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
        $report = new Report;
        $this->authorize('create', $report);

        $user = $request->user('api');
        $request->request->add(['user_id' => $user->id]);

        return parent::store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request The request object.
     * @param string  $key     The model key.
     *
     * @return mixed
     */
    public function show(Request $request, $key)
    {
        $model = $this->findFirstByKey($key);
        $this->authorize('view', $model);

        try {
            $user = $request->user('api');

            $repository = new FeedRepository;
            $repository->create(
                [
                    'description' => 'El usuario '.$user->name.' ('.$user->document_type->name.' '.$user->document_number.') visualizó el reporte "'.$model->title.'".',
                    'feedable_id' => $model->id,
                    'feedable_type' => 'reports',
                    'title' => 'Visualización de Reporte',
                    'user_id' => $user->id
                ]
            );
        } catch (\Exception $e) {
            //
        }

        return parent::show($request, $key);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request The request object.
     * @param string  $key     The model key.
     *
     * @throws ResourceControllerException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $key)
    {
        $model = $this->findFirstByKey($key);
        $this->authorize('update', $model);

        return parent::update($request, $key);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request The request object.
     * @param string  $key     The model key.
     *
     * @throws ResourceControllerException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $key)
    {
        $model = $this->findFirstByKey($key);
        $this->authorize('delete', $model);

        return parent::destroy($request, $key);
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
