<?php

namespace Raffles\Modules\Linkre\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user('api');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->user('api');

        return [
            'developer_profile.*' => Rule::requiredIf($user->developer),
            'developer_profile.career' => 'sometimes|required',
            'developer_profile.city' => 'sometimes|required',
            'developer_profile.company' => 'sometimes|required',
            'developer_profile.country' => 'sometimes|required',
            'developer_profile.expertise' => 'sometimes|required',
            'developer_profile.investment_preferences' => 'sometimes|required|array|min:1',
            'developer_profile.project_description' => 'sometimes|required',
            'developer_profile.project_name' => 'sometimes|required',
            'developer_profile.website' => 'sometimes|nullable',
            'document_number' => 'sometimes|required',
            'document_type_id' => 'sometimes|required',
            'email' => [
                'required',
                Rule::unique($user->getTable())->ignore($user->id),
            ],
            'first_name' => 'required',
            'investment_preferences' => 'sometimes|required|array|min:1',
            'investor_profile.*' => Rule::requiredIf($user->investor),
            'investor_profile.consulting' => 'sometimes|required',
            'investor_profile.expertise' => 'sometimes|required',
            'investor_profile.portfolio' => 'sometimes|required',
            'investor_profile.real_estate' => 'sometimes|required',
            'investor_profile.reit' => 'sometimes|required',
            'investor_profile.investment_type_id' => 'sometimes|required',
            'investor_profile.investment_value_id' => 'sometimes|required',
            'investor_profile.investor_type_id' => 'sometimes|required',
            'last_name' => 'required',
            'password' => 'nullable|confirmed|min:6',
        ];
    }
}
