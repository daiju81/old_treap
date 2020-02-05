<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->delete();
        $user = App\User::first();
        factory(App\Post::class, 20)->create([
          'user_id' => $user->id,
        ]);
    }
}
