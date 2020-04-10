<?php

namespace App\Http\Requests;

use App\Rules\MinimalDepositRule;
use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
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
            'renter_id' => ['required', 'numeric', 'exists:renters,id'],
            'book_id' => ['required', 'numeric', 'exists:books,id'],
            'books_count' => ['required', 'numeric', 'min:1'],
            'period' => ['required', 'numeric', 'min:1'],
            'deposit' => ['required', 'numeric', new MinimalDepositRule($this->request)]
        ];
    }
}
