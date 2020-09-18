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
    public function getAllCourses()
    {
        return Courses::all();
    }

    /**
     * Return a course
     *
     * @return \App\Models\Courses
     */
    public function getCourse(int $id)
    {
        return Courses::findOrFail($id);
    }

    /**
     * Returns available Chapter
     *
     * @return \App\Models\Chapters
     */
    public function getAllChapters(int $id)
    {
        $course = $this->getCourse($id);
        return ($course) ? $course->chapters : null;
    }
    public function getChapterWithID($id)
    {
        return Chapters::findOrFail($id);
    }

    public function getChapterWithNum(int $course_id, int $chap_num)
    {
        $chapters = ($this->getCourse($course_id))->chapters;
        return $this->findInArray($chapters, ['chapter_num', $chap_num]);
    }

    /**
     * Return pages for chapter
     *
     * @return \App\Models\Pages
     */
    public function getAllPages($id)
    {
        return (Chapters::findOrFail($id))->pages;
    }

    /**
     * @return \App\Models\Pages
     */
    public function getPageWithID($id)
    {
        return Pages::findOrFail($id);
    }
    public function getPageWithNum($chap_id, $page_num)
    {
        $pages = ($this->getChapterWithID($chap_id))->pages;
        return $this->findInArray($pages, ['page_num', $page_num]);
    }

    public function findInArray($array, $param = ['column', 'key'])
    {
        foreach ($array as $key)
        {
            if ($param['column'] == $param['key']) {
                return $key;
            }
        }
    }
}
