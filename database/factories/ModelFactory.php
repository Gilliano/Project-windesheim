<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    $role = App\Models\Role::orderByRaw('RAND()')->first();

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'roles_id' => $role['id'],
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\Role::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
    ];
});
