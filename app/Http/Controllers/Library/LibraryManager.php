<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class LibraryManager extends Controller
{
    use Assistant;

    /**
     * Return all courses from DB
     *
     */
    public function index()
    {
        return response()->json([
            'courses' => $this->getAllCourses()
        ]);
    }

    public function courseWithID(Request $request)
    {
        return $this->getCourse($request->course);
    }

    /**
     * Return chapters for a course
     */
    public function chapters(Request $request)
    {
        return response()->json([
            'chapters' => $this->getAllChapters($request->course)
        ]);
    }

    public function chapterWithID(Request $request)
    {
        return $this->getChapterWithID($request->course);
    }

    public function chapterWithNum(Request $request)
    {
        return $this->getChapterWithNum($request->course, $request->chapter);
    }

    /**
     * Return pages available for chapter
     */
    public function pages (Request $request)
    {
        return response()->json([
            'pages' => $this->getAllPages($request->chapter)
        ]);
    }
    public function pageWithID(Request $request)
    {
        return $this->getPageWithID($request->chapter);
    }
    public function pageWithNum(Request $request)
    {
        return $this->getPageWithNum($request->chapter, $request->page);
    }


    ///MANAGE

    public function createCourse (Request $request)
    {
        $request->user()->courses()->create([
            'name' => $request->name,
            'author' => $request->user()->name,
            'level' => $request->level
        ]);
        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function createChapter(Request $request)
    {
        $course = $this->courseWithId($request->course);
        $course->chapters()->create([
            'name' => $request->name
        ]);
        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function createPage(Request $request)
    {
        $chapter = $this->getChapterWithID($request->chapter);
        $pages_num = count($chapter->pages);
        $chapter->pages()->create([
            'page_num' => ++$pages_num
        ]);
    }
}
