<?php

namespace App\Http\Controllers;


use App\Models\Renter;
use Illuminate\Database\Eloquent\Builder;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application index page.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function __invoke()
    {
        return redirect()->route('history.lastBooks');
    }
}
