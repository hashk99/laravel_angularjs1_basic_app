<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
        //'comment_text' => 'required|unique:comments,name,NULL,id,deleted_at,NULL|max:255',
        'comment_text' => 'required',
        'user_email' => 'required|email',
        'display_name' => 'required',
        'article_id' =>  'required|exists:articles,id', 
        ];
    }
} 