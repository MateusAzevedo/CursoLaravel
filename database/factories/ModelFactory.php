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

$factory->define(CursoLaravel\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CursoLaravel\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs' => $faker->sentence,
    ];
});

$factory->define(CursoLaravel\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id' => \CursoLaravel\Entities\Project::all()->random()->id,
        'note' => $faker->sentence,
    ];
});

$factory->define(CursoLaravel\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        //'owner_id' => factory(\CursoLaravel\Entities\User::class)->create()->id,
        //'client_id' => factory(\CursoLaravel\Entities\Client::class)->create()->id,
        'client_id' => \CursoLaravel\Entities\Client::all()->random()->id,
        'owner_id' => \CursoLaravel\Entities\User::all()->random()->id,
        'name' => $faker->words(2, true),
        'description' => $faker->sentence,
        'progress' => $faker->numberBetween(0, 100),
        'status' => $faker->numberBetween(1, 3),
        'due_date' => $faker->dateTimeBetween('now', '+1 year'),
    ];
});
