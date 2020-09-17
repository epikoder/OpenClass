<?php

use App\Models\Chapters;
use App\Models\Courses as ModelsCourses;
use App\Models\Pages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ModelsCourses::class, 10)->create()->each(function () {
            
        });
    }
}
