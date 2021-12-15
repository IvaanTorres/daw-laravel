<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class); //*Calls the seeder of User, which calls the factory of User
        $this->call(PostsSeeder::class);
        $this->call(CommentsSeeder::class);
    }
}
