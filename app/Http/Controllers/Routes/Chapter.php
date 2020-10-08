<?php

namespace App\Http\Controllers\Routes;

use App\Http\Controllers\Controller;
use App\Models\Chapters;
use App\Models\Courses;
use Illuminate\Http\Request;

class Chapter extends Controller
{
    /**
     * @param Request $request
     */
    public function allCourseChapters ($request)
    {
        if ($request->id) {
            $course = Courses::findOrFail($request->id);
        } else {
            $course = Courses::where('slug', $request->slug)->first();
        }
        return response()->json([
            'status' => 'success',
            'data' => [
                'course' => $course ? json_decode(json_encode($course)) : null,
                'chapters' => $course ? $course->chapters : null
            ]
        ]);
    }

    public function chapter (Request $request)
    {
        if ($request->id) {
            $chapter = Chapters::findOrFail($request->id);
        } else {
            // Use course slug and chapter_num
            $courses = Courses::where('slug', $request->slug)->first();
            if ($courses) {
                foreach ($courses->chapters as $key) {
                    if ($key->chapter_num == $request->chapter_num) {
                        $chapter = $key;
                    break;
                    }
                }
            } else {
                $chapter = null;
            }
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'author' => $chapter ? $chapter->courses->users : null,
                'course' => $chapter ? json_decode(json_encode($chapter->courses)) : null,
                'chapter' => $chapter ? $chapter : null,
                'pages' => $chapter ? $chapter->pages : null
            ]
        ]);
    }
}
