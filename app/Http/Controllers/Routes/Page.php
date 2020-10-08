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
}
