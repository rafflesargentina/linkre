<?php

namespace Raffles\Modules\Linkre\Http\Controllers\Account;

use Raffles\Http\Controllers\Controller;
use Raffles\Modules\Linkre\Http\Requests\AccountRequest;
use Raffles\Modules\Linkre\Notifications\Admin\ProfileCompleted as ForAdmin;
use Raffles\Modules\Linkre\Notifications\ProfileCompleted as ForUser;
use Raffles\Modules\Linkre\Repositories\{ FeedRepository, UserRepository };

use DB;
use Log;
use RafflesArgentina\ResourceController\Traits\{ FormatsValidJsonResponses, WorksWithRelations, WorksWithFileUploads };
use RafflesArgentina\ResourceController\Exceptions\ResourceControllerException;

class UpdateController extends Controller
{
    use FormatsValidJsonResponses, WorksWithRelations, WorksWithFileUploads;

    /**
     * Create a new AccountController instance.
     *
     * @param  UserRepository $repository The UserRepository object.
     *
     * @return void
     */
    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth:api');

        $this->repository = $repository;
    }

    /**
     * Update the authenticated user's account.
     *
     * @param  AccountRequest $request The AccountRequest object.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AccountRequest $request)
    {
        $user = $request->user('api');

        DB::beginTransaction();

        try {
            $data = $request->all();
            $instance = $this->repository->update($user, $data);
            $model = $instance[1];
            $mergedRequest = $this->uploadFiles($request, $model);
            $this->updateOrCreateRelations($mergedRequest, $model);

            $developerProfile = $data['developer_profile'];
            $investorProfile = $data['investor_profile'];

            if ($developerProfile || $investorProfile) {
                if ($developerProfile) {
                    $model->developer_profile->investment_preferences()->sync($developerProfile['investment_preferences']);

                    try {
                        $repository = new FeedRepository;
                        $repository->create(
                            [
                                'description' => 'El usuario '.$model->name.' ('.$model->document_type->name.' '.$model->document_number.') completó su perfil de Promotor.',
                                'feedable_id' => $model->developer_profile->id,
                                'feedable_type' => 'developer_profiles',
                                'title' => 'Perfil de usuario Promotor completado',
                                'user_id' => $model->id,
                            ]
                        );
                    } catch (\Exception $e) {
                        //
                    }
                }

                if ($investorProfile) {
                    $model->investor_profile->investment_preferences()->sync($investorProfile['investment_preferences']);

                    try {
                        $repository = new FeedRepository;
                        $repository->create(
                            [
                                'description' => 'El usuario '.$model->name.' ('.$model->document_type->name.' '.$model->document_number.') completó su perfil de Inversor.',
                                'feedable_id' => $model->investor_profile->id,
                                'feedable_type' => 'investor_profiles',
                                'title' => 'Perfil de usuario Inversor completado',
                                'user_id' => $model->id,
                            ]
                        );
                    } catch (\Exception $e) {
                        //
                    }
                }

                try {
                    $model->notify(new ForUser());
                } catch (\Exception $e) {
                    Log::warning('No se pudo enviar la notificación de perfil completado al usuario.');
                }

                try {
                    $admin = $this->repository->find(1);
                    $admin->notify(new ForAdmin($model));
                } catch (\Exception $e) {
                    Log::warning('No se pudo enviar la notificación de perfil completado al admin.');
                }
            }

        } catch (\Exception $e) {
            DB::rollback();

            $message = 'Account updating failed.';
            throw new ResourceControllerException($message);
        }

        DB::commit();

        $message = 'Account updated.';

        return $this->validSuccessJsonResponse($message, ['user' => $model]);
    }
}
