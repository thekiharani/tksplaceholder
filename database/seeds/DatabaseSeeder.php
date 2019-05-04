<?php

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
        \DB::table('posts')->delete();
        \DB::table('todos')->delete();
        \DB::table('people')->delete();
        // $this->call(UsersTableSeeder::class);
        factory(App\People::class, 25)->create();
        factory(App\Post::class, 100)->create();
        factory(App\Todo::class, 100)->create();
    }
}
