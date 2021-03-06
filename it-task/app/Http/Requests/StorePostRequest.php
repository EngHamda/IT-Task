<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//anyone can create Post
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'image'         => 'required|file|image',
            'etitle'        => 'required',
            'atitle'        => 'required',
            'edescription'  => 'required',
            'adescription'  => 'required',
            'category_id'   => 'required'
        ];
    }
}
