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
Route::get('/', 'Web\WebController@index')->name('home');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/signup', 'Register@signupView')->name('signup');

Route::get('/home', 'Web\WebController@create')->name('editor');
Route::post('/editor', 'Web\WebController@write')->name('write');

Route::get('/create', 'Web\WebController@manage')->name('create');

Route::namespace('Library')->group(function () {

    // Add object
    Route::post('/new/course', 'LibraryManager@newCourse')->name('newCourse');
    Route::post('/new/chapter', 'LibraryManager@newChapter')->name('newChapter');
    Route::post('/new/page', 'LibraryManager@newPage')->name('newPage');
});
