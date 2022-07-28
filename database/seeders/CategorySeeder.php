<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Category::create(['title' => 'Marketing']);
    Category::create(['title' => 'Web']);
    Category::create(['title' => 'Hacking']);
    Category::create(['title' => 'Motivation']);
    $faker = \Faker\Factory::create();
    for ($i = 0; $i < 10; $i++) {
      \App\Models\Article::create([
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'image' => $faker->imageUrl,
        'category_id' => rand(1, 4),
      ]);
    }

    return 1;

    \App\Models\Category::factory()->count(10)->create()->each(function ($category) {
      $category->articles()->saveMany(\App\Models\Article::factory()->count(10)->make());
    });
  }
}
