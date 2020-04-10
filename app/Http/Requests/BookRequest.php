<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'author' => ['required', 'string', 'max:32'],
            'pages' => ['required', 'numeric', 'min:1'],
            'age_limit' => ['required', 'numeric'],
            'year' => ['required', 'string', 'max:32'],
            'cost' => ['required', 'numeric', 'min:1'],
            'description' => ['nullable', 'string', 'max:4096']
        ];
    }
}
