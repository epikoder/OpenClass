<?php
namespace App\Http\Controllers\Assistant;

use App\Models\Courses;

trait Assistant
{
    public static function countCoursePages (\App\Models\Courses $course): int
    {
        $chapters = $course->chapters;
        $count = 0;
        foreach ($chapters as $chapter)
        {
            $count += count($chapter->pages);
        }
        return $count;
    }

    public static function byAuthor ($name)
    {
        return Courses::where('author', $name)->get();
    }


    public static function slugUnique(string $string): string
    {
        $string = preg_replace('/\s+/', '-', strtolower($string));
        $obj = Courses::where('slug', $string)->first();
        if ($obj) {
            $slug = $string;
            $x = 1;
            do {
                $string = $slug . '-' . $x++;
            } while (Courses::where('slug', $string)->first());
        }
        return $string;
    }
}
?>
