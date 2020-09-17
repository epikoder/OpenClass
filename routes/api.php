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

Route::domain('api.'.env('APP_URL'))->group(function () {
    Route::namespace('Library')->group(function () {
        Route::get('/', 'LibraryManager@index')->name('index');
        Route::get('/chapters', 'LibraryManager@chapters')->name('chapters');
        Route::get('/pages', 'LibraryManager@pages')->name('pages');
        Route::get('/chapter', 'LibraryManager@chapterWithCourseID')->name('chapterWithCourseID');
        Route::get('/page', 'LibraryManager@pageWithChapterID')->name('pageWithChapterID');
        Route::get('/singlePage', 'LibraryManager@pageSingle')->name('pageSingle');
    });
});
