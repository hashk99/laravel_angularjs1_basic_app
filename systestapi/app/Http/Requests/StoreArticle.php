<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticle extends FormRequest
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
       return [
        //'title' => 'required|unique:articles,title,NULL,id,deleted_at,NULL|max:255',
        'title' => 'required',
        'description' => 'required',
        ];
    }
}