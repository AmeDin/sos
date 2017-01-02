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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Cartalyst\Sentinel\Users\EloquentUser::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'permissions' => [],
    ];


});

$factory->define(Cartalyst\Sentinel\Activations\EloquentActivation::class, function (Faker\Generator $faker) {

    return [
        'user_id' => factory(Cartalyst\Sentinel\Users\EloquentUser::class)->create()->id,
        'code' => str_random(32),
        'completed' => 1,
        'completed_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
    ];
});

$autoIncrement = autoIncrement();

$factory->define(Cartalyst\Sentinel\Roles\EloquentRole::class, function (Faker\Generator $faker) use ($autoIncrement) {
    $autoIncrement->next();
    $name = "";
    if ($autoIncrement->current() == 1){
        $name = "admin";
    }else{
        $name = "svendor";
    }

    return [
        'name' => $name,
        'slug' => $name,
        'permissions' => []
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\RoleUser::class, function (Faker\Generator $faker) use ($autoIncrement) {
    $autoIncrement->next();
    return [
        'user_id' => $autoIncrement->current(),
        'role_id' => 2
    ];


});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}