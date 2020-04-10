<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentRequest;
use Illuminate\Http\Response;
use App\Models\{Rent, Renter, Book};
use Illuminate\Http\Request;

class RentsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $renter = Renter::find($request->get('renter'));
        $book = Book::find($request->get('book'));

        return view('rents.create', compact('renter', 'book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RentRequest $request
     * @return Response
     */
    public function store(RentRequest $request)
    {
        $rent = Rent::create($request->only([
            'renter_id', 'book_id',
            'deposit', 'books_count',
            'period'
        ]));

        return response()->json([
            'data' => $rent,
            'redirect_url' => route('renters.show', $rent->renter)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rent $rent
     * @return void
     */
    public function edit(Rent $rent)
    {
        return view('rents.edit', compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RentRequest $request
     * @param Rent $rent
     * @return Response
     */
    public function update(RentRequest $request, Rent $rent)
    {
        $rent->update($request->only([
            'renter_id', 'book_id',
            'deposit', 'books_count',
            'period'
        ]));

        return response()->json([
            'data' => $rent,
            'redirect_url' => route('renters.show', $rent->renter)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rent $rent
     * @return Response
     * @throws \Exception
     */
    public function destroy(Rent $rent)
    {
        $rent->delete();

        return redirect()->back()
            ->with('success', trans('flash_alerts.success.rent_canceled', [
                'book' => $rent->book->name
            ]));
    }
}
