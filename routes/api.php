<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Routes')->domain('api.'.env('APP_URL'))->group(function () {
    Route::get('/', 'Page@test')->name('page');
    /*
    Route::namespace('Library')->group(function () {
        Route::get('/', 'LibraryManager@index')->name('index');
        Route::get('/chapters', 'LibraryManager@chapters')->name('chapters');
        Route::get('/pages', 'LibraryManager@pages')->name('pages');
        Route::get('/course', 'LibraryManager@courseWithID')->name('courseWithID');
        Route::get('/chapter', 'LibraryManager@chapterWithID')->name('chapterWithID');
        Route::get('/page', 'LibraryManager@pageWithID')->name('pageWithID');
    });
    */
});
