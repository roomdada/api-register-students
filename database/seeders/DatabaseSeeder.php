<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    \App\Models\User::create([
      'name' => 'John Doe',
      'email' => 'admin@email.com',
      'password' => bcrypt('password')
    ]);

    $this->call([
      LevelSeeder::class,
      CategorySeeder::class
    ]);
  }
}
