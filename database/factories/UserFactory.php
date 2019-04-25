<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use Illuminate\Support\Str;
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

$factory->define(App\Users::class, function (Faker $faker) {
    static $password;
    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'is_admin' => $faker->boolean,
        'is_enabled' => $faker->boolean,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10),
    ];
});
