<?php

namespace Raffles\Modules\Linkre\Http\Controllers\Auth;

use Raffles\Http\Controllers\Auth\LoginController as BaseLoginController;

use Illuminate\Http\Request;

class LoginController extends BaseLoginController
{
    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $model = config('auth.providers.users.model');
        $model = new $model;
        $user = $model->where('document_number', $request->document_number)->where('document_type_id', $request->document_type_id)->first();

        if (!$user) {
            return false;
        }

        if (\Hash::check($request->password, $user->password)) {
            $this->guard()->setUser($user);
            return true;
        }
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate(
            [
            $this->username() => 'required|alpha_num',
            'document_type_id' => 'required|numeric',
            'password' => 'required|string',
            ]
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'document_type_id', 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $user = $this->guard()->user();

        if ($request->wantsJson()) {
            try {
                $user->loadMissing('contact', 'developer_profile.investment_preferences', 'investments', 'investor_profile.investment_preferences', 'permissions', 'roles');
                $token = $user->createToken(env('APP_NAME'));
                $accessToken = $token->accessToken;
            } catch (\Exception $e) {
                return $this->validInternalServerErrorJsonResponse($e, $e->getMessage());
            }

            $data = [
                'token' => $accessToken,
                'remember' => $request->remember,
                'user' => $user
            ];

            return $this->authenticated($request, $user)
                    ?:  $this->validSuccessJsonResponse('Success', $data, $this->redirectPath());
        }

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $user)
                ?: redirect()->intended($this->redirectPath());
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'document_number';
    }
}
