<?php

namespace Modules\CMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('posts');

        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            # code...
            return [
                'title' => 'required',
                'image' => 'nullable',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'categories' => 'required',
                'content' => 'required'
            ];
        } else {
            return [
                'title' => 'required',
                'image' => 'nullable',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'categories' => 'required',
                'content' => 'required'
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
