<?php

namespace App\Http\Controllers;


use App\Http\Resources\RentersCollection;
use App\Models\Renter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Requests\Renters\{
    StoreRequest,
    UpdateRequest
};

class RentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $renters = Renter::when($search = $request->get('search'), function (Builder $query) use ($search) {
            $query->whereLike(Renter::$searchable, $search);
        })
            ->withCount('rents as rents_total')->orderBy('rents_total', 'desc')
            ->paginate($request->get('limit', 10))
            ->onEachSide(1);

        return view('renters.index', compact('renters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Http\Response
     */
    public function create()
    {
        return view('renters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $renter = Renter::create($request->only([
            'name', 'lastname',
            'gender', 'email',
            'favorite_books'
        ]));

        return redirect()->route('renters.show', $renter);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Renter $renter
     * @return Illuminate\Http\Response
     */
    public function show(Request $request, Renter $renter)
    {
        $rents = $renter->rents()->paginate($request->get('limit', 10))
            ->onEachSide(1);

        return view('renters.show', compact('renter', 'rents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Renter $renter
     * @return Illuminate\Http\Response
     */
    public function edit(Renter $renter)
    {
        return view('renters.edit', compact('renter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Renter $renter
     * @return Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Renter $renter)
    {
        $renter->update($request->only([
            'name', 'lastname',
            'gender', 'email',
            'favorite_books'
        ]));

        return redirect()->route('renters.show', $renter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Renter $renter
     * @return Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Renter $renter)
    {
        $name = $renter->fullname;
        $renter->delete();

        return redirect()->route('renters.index')
            ->with('success', trans('flash_alerts.success.renter_deleted', [
                'renter' => $name
            ]));
    }

    /**
     * Search renter by query
     *
     * @param $searchQuery
     * @return Illuminate\Http\Response
     */
    public function search($searchQuery)
    {
        $collection = new RentersCollection(Renter::whereLike(Renter::$searchable, $searchQuery)
            ->limit(10)
            ->get()
        );

        return response()->json($collection);
    }
}
