<?php

use App\Models\Chapters;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $user = User::find(1);
        $course = $user->courses()->create([
            'name' => 'PHP',
            'author' => $user->name,
            'level' => 'Beginner'
        ]);
        $course->save();
        $course->chapters()->create([
            'name' => 'Getting Started',
            'chapter_num' => 1
        ]);
        $course->chapters()->create([
            'name' => 'Introduction to PHP',
            'chapter_num' => 2
        ]);
        $course->chapters()->create([
            'name' => 'Data types',
            'chapter_num' => 3
        ]);

        $chapters = Chapters::all();
        $chapters->each(function ($chapter) {
            $chapter->pages()->create([
                'page_num' => 1,
                'content' => ' '
            ]);
            $chapter->pages()->create([
                'page_num' => 2,
                'content' => '**Hello** Markdown'
            ]);
        });
    }
}
