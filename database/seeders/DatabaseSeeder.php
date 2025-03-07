<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\error;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(2)->create();

        $categoryIds =  NewsCategory::factory()->count(3)
            ->state(new Sequence(
                fn (Sequence $sequence) => [
                    'created_by' => User::all()->random()
                ],
            ))
            ->create()->pluck('id');

        $news = News::factory()->count(5)
            ->state(new Sequence(
                fn (Sequence $sequence) => [
                    'created_by' => User::all()->random()
                ],
            ))
            ->create();

        foreach ($news as $key=>$oneNews) {
            switch ($key%3) {
                case 0:
                    $oneNews->categories()->attach([$categoryIds[0]]);
                    break;
                case 1:
                    $oneNews->categories()->attach([$categoryIds[0],$categoryIds[1]]);
                    break;
                case 2:
                    $oneNews->categories()->attach($categoryIds);
                    break;
            }
        }
    }
}
