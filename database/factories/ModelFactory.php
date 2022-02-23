<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [

        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
//        'email_verified_at' => now(),
        'password' => $password ?: $password = bcrypt('123456'), // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Channel::class,function (Faker $faker){
    $name = $faker->word;

    return [
        'name' => $name,
        'slug' => $name,
    ];
});


$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'channel_id' => function () {
            return factory('App\Channel')->create()->id;
        },
        'title'=> $faker->sentence,
        'body'=>$faker->paragraph,
    ];
});

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
       'thread_id'=> function () {
            return factory('App\Thread')->create()->id;
       },
        'user_id'=> function () {
            return factory('App\User')->create()->id;
        },
        'body'=>$faker->paragraph,
    ];
});


