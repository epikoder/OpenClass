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
    Route::get('/', 'Course@allCourse')->name('api.all.courses');
    Route::get('/course', 'Course@course')->name('api.course'); //
    Route::get('/course/allchapters', 'Chapter@allCourseChapters')->name('api.course.all.chapters');
    Route::get('/course/chapter', 'Chapter@chapter')->name('api.course.chapter');
    Route::get('/page', 'Page@page')->name('api.page');

    Route::post('/login', 'Auth@login')->name('api.login');
    Route::post('/signup', 'Auth@signup')->name('api.signup');
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/logout', 'Auth@logout')->name('api.logout');
    });
});
