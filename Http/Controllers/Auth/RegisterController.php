<?php

namespace Raffles\Modules\Linkre\Http\Controllers\Auth;

use Raffles\Http\Controllers\Auth\RegisterController as Controller;
use Raffles\Modules\Linkre\Models\User;
use Raffles\Modules\Linkre\Repositories\FeedRepository;

use Illuminate\Validation\Rule;
use Validator;

class RegisterController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
            'accepted' => 'accepted',
            'document_number' => [
                'required',
                'alpha_num',
                Rule::unique('users')->where(
                    function ($query) {
                        return $query->where('document_type_id', request()->document_type_id); 
                    }
                )
            ],
            'document_type_id' => 'required|numeric',
            'email' => 'required|string|email|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|string|min:6|confirmed',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create(
            [
            'developer' => $data['developer'],
            'document_number' => $data['document_number'],
            'document_type_id' => $data['document_type_id'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'investor' => $data['investor'],
            'last_name' => $data['last_name'],
            'password' => $data['password'],
            ]
        );

        $user->contact()->create([]);

        if ($user->investor) {
            $user->investor_profile()->create([]);
        }

        if ($user->developer) {
            $user->developer_profile()->create([]);
        }

        //try {
            $repository = new FeedRepository;
            $repository->create(
                [
                    'description' => 'El usuario '.$user->name.' ('.$user->document_type->name.' '.$user->document_number.') se registró en la plataforma con rol '.($user->investor ? 'Inversor' : 'Promotor').'.',
                    'title' => 'Registro de usuario',
                    'user_id' => $user->id
                ]
            );
        //} catch (\Exception $e) {
            //
        //}

        return $user;
    }
}
