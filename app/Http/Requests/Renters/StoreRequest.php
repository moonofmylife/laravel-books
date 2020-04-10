<?php

namespace App\Http\Requests\Renters;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:32'],
            'lastname' => ['required', 'string', 'max:32'],
            'gender' => ['required', 'string', 'max:6'],
            // RFC 821: 64+1+255=320 (name + @ + domain)
            'email' => ['required', 'string', 'email', 'max:320', 'unique:renters'],
            'favorite_books' => ['nullable', 'string', 'max:2048']
        ];
    }
}
