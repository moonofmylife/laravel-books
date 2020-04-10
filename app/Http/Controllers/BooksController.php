<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BooksCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $books = Book::when($search = $request->get('search'), function (Builder $query) use ($search) {
            $query->whereLike(Book::$searchable, $search);
        })
            ->paginate($request->get('limit', 10))
            ->onEachSide(1);

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data = $request->only([
            'name',
            'author',
            'pages',
            'age_limit',
            'year',
            'cost',
            'description'
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')
                ->store('covers');
        }

        $book = Book::create($data);

        return redirect()->route('books.show', $book);
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return void
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookRequest $request
     * @param Book $book
     * @return void
     */
    public function update(BookRequest $request, Book $book)
    {
        $data = $request->only([
            'name',
            'author',
            'pages',
            'age_limit',
            'year',
            'cost',
            'description'
        ]);

        if ($request->hasFile('cover')) {
            Storage::delete($book->cover);

            $data['cover'] = $request->file('cover')
                ->store('covers');
        }

        $book->update($data);

        return redirect()->route('books.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return void
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', trans('flash_alerts.success.book_deleted', [
                'book' => $book->name
            ]));
    }

    /**
     * Search renter by query
     *
     * @param $searchQuery
     * @return Response
     */
    public function search($searchQuery)
    {
        $collection = new BooksCollection(
            Book::whereLike(Book::$searchable, $searchQuery)
            ->limit(10)
            ->get()
        );

        return response()->json($collection);
    }
}
