<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
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
        // $this->call(UsersTableSeeder::class);
        // $this->call(PostsTableSeeder::class);

        User::factory(5)->create()->each(function ($user) {
            for ($i = 0; $i < 5; $i++) {
                $user->posts()->save(Post::factory()->make());
                $user->comments()->save(Comment::factory()->make());
            }
        });
    }
}
