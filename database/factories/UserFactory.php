<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'id' => '00-0000',
        'fname' => 'admin',
        'lname' => 'admin',
        'email' => 'admin@admin.com',
        'usertype' => 'Admin',
        'password' => $password ?: $password = bcrypt('admin'),
        'remember_token' => str_random(10),
    ];
});
