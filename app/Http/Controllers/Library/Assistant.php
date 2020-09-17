<?php
namespace App\Http\Controllers\Library;

use App\Models\Chapters;
use App\Models\Courses;
use App\Models\Pages;

trait Assistant
{
    /**
     * Return all course
     *
     * @return \App\Models\Courses
     */
    public function getCourses()
    {
        return Courses::all();
    }

    /**
     * Returns available Chapter
     *
     * @return \App\Models\Chapters
     */
    public function getChapters($id)
    {
        $course = $this->courseWithId($id);
        return ($course) ? $course->chapters : null;
    }
    public function getChapter($id)
    {
        return Chapters::findOrFail($id);
    }

    /**
     * Return a course
     *
     * @return \App\Models\Courses
     */
    public function courseWithId($id)
    {
        return Courses::findOrFail($id);
    }

    /**
     * Return pages for course chapter
     *
     */
    public function pagesFromCourseChapter ($course_id, $chapter_id)
    {
        $course = Courses::findOrFail($course_id);
        $chapter = ($course) ? $this->findInArray($course->chapters, $chapter_id) : null;
        return ($chapter) ? ($chapter->pages) : null;
    }
    public function findInArray(object $array,int $id)
    {
        foreach ($array as $key)
        {
            if ($key->id == $id) {
                return $key;
            }
        }
    }

    /**
     * Return pages for chapter
     *
     * @return \App\Models\Pages
     */
    public function pagesWithChapterId($id)
    {
        return (Chapters::findOrFail($id))->pages;
    }

    /**
     * return a page
     */
    public function getPage($id)
    {
        return Pages::findOrFail($id);
    }
}
