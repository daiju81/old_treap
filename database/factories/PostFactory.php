<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //
        // 'title' => $faker->sentence(),
        'text' => $faker->paragraph(),
        'post_date' => Carbon::today(),

        'user_id' => function() {
          return factory(App\User::class)->create()->id;
        },
    ];
});
