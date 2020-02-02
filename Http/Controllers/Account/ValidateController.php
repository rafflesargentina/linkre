<?php

namespace Raffles\Modules\Linkre\Http\Controllers\Account;

use Raffles\Http\Controllers\Account\ValidateController as Controller;

use Illuminate\Http\Request;

class ValidateController extends Controller
{
    /**
     * Validate the account for the authenticated user.
     *
     * @param  Request $request The request object.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $user = $request->user('api');

        if (!$user) {
            return $this->validNotFoundJsonResponse();
        }

        $user->loadMissing('contact', 'developer_profile.investment_preferences', 'investments', 'investor_profile.investment_preferences', 'permissions', 'roles');

        return $this->validSuccessJsonResponse('Success', ['user' => $user]);
    }
}
