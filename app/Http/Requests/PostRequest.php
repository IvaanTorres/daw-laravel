<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            /* 'title' => 'required|min:5',
            'body' => 'required|min:50',
            'user' => 'required' */
            'title' => 'required|min:5',
            'body' => 'required|min:50'
        ];
    }

    public function messages()
    {
        return [
            /* 'title.required' => 'El título es obligatorio',
            'body.required' => 'El contenido es obligatorio',
            'user.required' => 'El usuario es obligatorio' */
            'title.required' => 'El título es obligatorio',
            'body.required' => 'El contenido es obligatorio'
        ];
    }
}
