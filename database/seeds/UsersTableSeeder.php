<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
          'name' => 'test2',
          'email' => 'test2@test2',
          'oneword' => 'test2',
          'identification_id' => uniqid(),
          'password' => bcrypt('test2'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
    }
}
