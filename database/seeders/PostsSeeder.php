<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $users = User::all();
        $users->each(function($user) {
            Post::factory()->count(3)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
