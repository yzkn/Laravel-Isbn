<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'can:allow_general']], function () {
    Route::resource('books', 'BookController')->except([
        'store', 'delete'
    ]);
    Route::get('books/bd/{isbn}', 'BookController@bd')->where('isbn', '[-0-9]{13,}');
    Route::get('books/ndl/{isbn}', 'BookController@ndl')->where('isbn', '[-0-9]{13,}');
    Route::get('series', 'BookController@index_series');
});

Route::group(['middleware' => ['auth', 'can:allow_system']], function () {
    Route::get('csv', 'CsvController@index');
    Route::get('csv/import', 'CsvController@import');
    Route::post('csv/import', 'CsvController@store');
    Route::get('csv/export', 'CsvController@write');
});

Route::group(['middleware' => ['auth', 'can:allow_admin']], function () {
    Route::resource('books', 'BookController')->only([
        'store', 'delete'
    ]);
});
