<?php

namespace Raffles\Modules\Linkre\Http\Controllers;

use Raffles\Modules\Linkre\Http\Requests\InvestorRequest;
use Raffles\Modules\Linkre\Repositories\UserRepository;

use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use RafflesArgentina\ResourceController\ApiResourceController;
use RafflesArgentina\ResourceController\Exceptions\ResourceControllerException;

class InvestorController extends ApiResourceController
{
    use AuthorizesRequests;

    protected $formRequest = InvestorRequest::class;

    protected $repository = UserRepository::class;

    protected $resourceName = 'investors';

    /**
     * Create a new InvestorController instance.
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
        $this->getFormRequestInstance();

        DB::beginTransaction();
        try {
            $data = $request->all();
            $instance = $this->repository->create($data);
            $model = $instance[1];
            $number = $model->{$model->getRouteKeyName()};
            $mergedRequest = $this->uploadFiles($request, $model);
            $this->updateOrCreateRelations($mergedRequest, $model);

            $model->investor_profile->investment_preferences()->sync($data['investor_profile']['investment_preferences']);
        } catch (\Exception $e) {
            DB::rollback();

            $message = $this->storeFailedMessage($e->getMessage());
            throw new ResourceControllerException($message);
        }

        DB::commit();

        $message = $this->storeSuccessfulMessage($number);
        $data = [$model];

        return $this->validSuccessJsonResponse($message, $data);
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

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        $model->loadMissing('contact', 'featured_photo', 'investments', 'investor_profile');

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
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
        $this->getFormRequestInstance();

        $model = $this->findFirstByKey($key);

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        DB::beginTransaction();

        try {
            $data = $request->all();
            $instance = $this->repository->update($model, $data);
            $model = $instance[1];
            $mergedRequest = $this->uploadFiles($request, $model);
            $this->updateOrCreateRelations($mergedRequest, $model);

            $model->investor_profile->investment_preferences()->sync($data['investor_profile']['investment_preferences']);
        } catch (\Exception $e) {
            DB::rollback();

            $message = $this->updateFailedMessage($key, $e->getMessage());
            throw new ResourceControllerException($message);
        }

        DB::commit();

        $message = $this->updateSuccessfulMessage($key);
        $data = [$model];

        return $this->validSuccessJsonResponse($message, $data);
    }

    /**
     * Get default relative path.
     *
     * @return string
     */
    protected function getDefaultRelativePath()
    {
        return 'uploads/investors/';
    }
}
