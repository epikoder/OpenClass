<?php

namespace App\Http\Controllers\Routes;

use App\Http\Controllers\Assistant\Assistant;
use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Course extends Controller
{
    use Assistant;
    
    public function allCourse()
    {
        $course = Courses::get();
        return response()->json([
            'status' => 'success',
            'data' => [
                'courses' => json_decode(json_encode($course))
            ]
        ]);
    }

    public function course(Request $request)
    {
        if ($request->id) {
            $course = Courses::findOrFail($request->id);
        } else {
            $course = Courses::where('slug', $request->slug)->first();
        }
        return response()->json([
            'status' => 'success',
            'data' => [
                'course' => $course ? $course : null,
                'author' => $course ? $course->users : null
            ]
        ]);
    }

    /**
     * Create
     */
    public function createCourse(Request $request)
    {
        $data = [
            'title' => $request->title,
            'level' => $request->level,
            'description' => $request->description,
            'art' => $request->art
        ];
        $rules = [
            'title' => 'required|string',
            'level' => 'required|string',
            'description' => 'nullable|string',
            'art' => 'max:1024|required|mimes:jpeg,bmp,png,webp'
        ];
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            return $validation->errors();
        }
        $slug = Assistant::slugUnique($request->title);
        $art = $request->file('art');
        $art = Storage::putFile('covers/'.$slug, $art);


        $course = new Courses([
            'title' => $request->title,
            'slug' => $slug,
            'author' => $request->user()->name,
            'level' => $request->level,
            'description' => $request->description,
            'cover_url' => Storage::url($art)
        ]);
    }
}
