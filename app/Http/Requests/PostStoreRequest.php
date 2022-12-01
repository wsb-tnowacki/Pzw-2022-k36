<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tytul' => 'required|max:200',
            'autor' => 'required|max:100',
            'email' => 'required|email:rfc,dns|min:3|max:200',
            'tresc' => 'required|min:5|max:256'
        ];
    }
}
