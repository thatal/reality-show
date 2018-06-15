<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        // 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'password' => bcrypt('ramdhenu'),
        'username' => $faker->unique()->userName,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\ArtistMaster::class, function (Faker $faker) {
    $gender = ['male', 'female','other'];
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'code' => rand(123456, 9999999),
        // 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'mobile' => rand(961234567, 999990000),
        'gender' => $gender[rand(0,2)],
        'age' => rand(18, 60),
        'facebook' => "",
        'instagram' => ""
    ];
});
