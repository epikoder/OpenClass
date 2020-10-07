<?php

use App\Models\Chapters;
use App\Models\Courses;
use App\Models\Pages;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()

        ->each(function ($user) {
            $user->courses()->createMany(factory(Courses::class, 15)->make([
                'author' => $user->name,
            ])->toArray())

            ->each(function ($course) {
                $x = 1;
                $course->chapters()->createMany(factory(Chapters::class, 50)->make([
                    'chapter_num' => $x++,
                ])->toArray())
                ->each(function ($chapter) {
                    $x = 1;
                    $chapter->pages()->createMany(factory(Pages::class, 130)->make([
                        'page_num' => $x++,
                    ])->toArray());
                });
            });
        });
    }
}
