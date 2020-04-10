<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class LocaleController extends Controller
{
    public function __invoke(Request $request)
    {
        $locale = App::isLocale('en') ? 'ru' : 'en';

        return redirect()->back()
            ->withCookie(Cookie::forever('locale', $locale));
    }
}
