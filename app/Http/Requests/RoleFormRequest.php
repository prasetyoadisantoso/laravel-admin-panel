<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleFormRequest extends FormRequest
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
        $id = $this->route('role');

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            # code...
            return [
                'name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:roles,name,' . $id,
                'permission' => 'required',
            ];
        } else {
            return [
                'name' => 'required|regex:/^[a-zA-Z]+$/u|unique:roles,name',
                'permission' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('role.rules.name_required'),
            'name.unique' => __('role.rules.name_unique'),
            'name.regex' => __('role.rules.format_invalid'),
            'permission.required' => __('role.rules.permission_required'),
        ];
    }
}
