<?php

namespace Modules\CMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('categories');

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            # code...
            return [
                'title' => 'required',
                'description' => 'nullable',
            ];
        } else {
            return [
                'title' => 'required',
                'description' => 'nullable',
            ];
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
