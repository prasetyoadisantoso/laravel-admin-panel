<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $id = $this->route('user');

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            # code...
            return [
                'name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/|max:255|unique:users,name,' . $id,
                'email' => [
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('users', 'email')->ignore($id),
                ],
                'email_verified_at' => 'nullable',
                'password' => 'same:confirm-password',
                'image' => 'nullable',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'roles' => 'required'
            ];
        } else {
            return [
                'name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/|max:255|unique:users,name',
                'email' => 'required|email|unique:users,email',
                'email_verified_at' => 'nullable',
                'password' => 'required|same:confirm-password',
                'image' => 'nullable',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'roles' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('user.rules.name_required'),
            'name.unique' => __('user.rules.name_unique'),
            'email.required' => __('user.rules.email_required'),
            'email.email' => __('user.rules.email_email'),
            'email.unique' => __('user.rules.email_unique'),
            'roles.required' => __('user.rules.roles_required'),
        ];
    }
}
