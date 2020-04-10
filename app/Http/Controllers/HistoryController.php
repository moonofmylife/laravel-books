<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Renter;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function activeReaders(Request $request)
    {
        $renters = Renter::activeReaders(10)->orderBy('rents_total', 'desc')->get();

        return view('history.active_readers', compact('renters'));
    }

    public function lastBooks(Request $request)
    {
        $rents = Rent::with('book')->orderBy('created_at', 'desc')->get();

        return view('history.last_books', compact('rents'));
    }
}
