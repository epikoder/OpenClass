<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Models\Chapters;
use App\Models\Courses;
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
            'courses' => $this->getCourses()
        ]);
    }

    public function course(Request $request)
    {
        return $this->courseWithId($request->course);
    }

    /**
     * Return chapters for a course
     */
    public function chapters(Request $request)
    {
        return response()->json([
            'chapters' => $this->getChapters($request->course)
        ]);
    }

    public function chapterWithCourseID(Request $request)
    {
        return $this->getChapters($request->course);
    }

    /**
     * Return pages available for chapter
     */
    public function pages (Request $request)
    {
        return response()->json([
            'pages' => $this->pagesFromCourseChapter($request->course, $request->chapter)
        ]);
    }
    public function pageWithChapterID(Request $request)
    {
        return $this->pagesWithChapterId($request->chapter);
    }

    /**
     * Return a page
     */
    public function pageSingle(Request $request)
    {
        return $this->getPage($request->page);
    }


    ///MANAGE

    public function createCourse (Request $request)
    {
        $request->user()->courses()->create([
            'name' => $request->name,
            'Author' => $request->user()->name
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
        $page = new Pages();
    }
}
