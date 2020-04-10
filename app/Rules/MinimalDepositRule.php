<?php

namespace App\Rules;

use App\Models\Book;
use Illuminate\Contracts\Validation\Rule;
use Symfony\Component\HttpFoundation\ParameterBag;

class MinimalDepositRule implements Rule
{
    /**
     * @var ParameterBag
     */
    protected $request;

    /**
     * @var Book
     */
    protected $book;

    /**
     * Create a new rule instance.
     *
     * @param ParameterBag|null $request
     */
    public function __construct(ParameterBag $request = null)
    {
        $this->request = $request;
        $this->book = Book::find($request->get('book_id'));
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $rent = $this->request->get('books_count') * $this->book->cost * $this->request->get('period');
        $min = $rent * 0.3;

        if ($value < $min) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.minimal_deposit');
    }
}
