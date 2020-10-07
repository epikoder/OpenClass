<?php

namespace App\Http\Controllers\Routes;

use App\Http\Controllers\Controller;
use App\Models\Chapters;
use App\Models\Courses;
use App\Models\Pages;
use Illuminate\Http\Request;

class Page extends Controller
{
    public function page(Request $request)
    {
        $page = Pages::findOrFail($request->id);

        return response()->json([
            'status' => 'success',
            'data' => [
                'pages' => $page ? $page : null
            ]
        ]);
    }
    public function test(Request $request)
    {
        $user = \App\User::find(1);
        $user->courses()->create([
            'title' => 'tile',
            'slug' => 'slug',
            'author' => $user->name,
            'level' => 'level',
            'description' => 'sd',
            'cover_url' => 's'
        ]);
        return $user;
    }
}
