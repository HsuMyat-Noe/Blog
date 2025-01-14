<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Comment;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Article::factory(20)->create(); // run data
        Category::factory()->count(5)->create();
        Comment::factory()->count(40)->create();

        \App\Models\User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@gmail.com'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@gmail.com'
        ]);
    }

}
