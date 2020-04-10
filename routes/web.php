<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'locale'], function() {
    Auth::routes();
    Route::get('locale/switch', 'LocaleController')->name('locale.switch');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'MainController');
        Route::get('history/active-readers', 'HistoryController@activeReaders')->name('history.activeReaders');
        Route::get('history/last-books', 'HistoryController@lastBooks')->name('history.lastBooks');
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');

        Route::resource('renters', 'RentersController');
        Route::resource('books', 'BooksController');
        Route::resource('rents', 'RentsController', [
            'except' => ['index']
        ]);

        Route::get('renters/search/{query?}', 'RentersController@search')->name('renters.search');
        Route::get('books/search/{query?}', 'BooksController@search')->name('books.search');
    });
});
