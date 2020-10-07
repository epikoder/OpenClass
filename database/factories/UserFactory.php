<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Chapters;
use App\Models\Courses;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Http\Controllers\Assistant\Assistant;
use App\Http\Controllers\Routes\Chapter;
use App\Models\Pages;
use Illuminate\Support\Facades\Config;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'), // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Courses::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'title' => $title,
        'slug' => Assistant::slugUnique($title),
        'level' => 'beginner',
        'description' => $faker->sentence(20),
        'cover_url' => Config::get('app.url').'/art.png'
    ];
});


$factory->define(Chapters::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence()
    ];
});

$markdown = '# OpenClass
## About OpenClass

Openclass is free learning platform, to learn various programming language and projects.

### Features
- User Login
- User Registration (now available)
- Create Course
- Create chapters and pages for readability
- JSON API to render content for mobile


## Getting Started';
$factory->define(Pages::class, function (Faker $faker) use ($markdown) {
    return [
        'content' => $markdown
    ];
});
