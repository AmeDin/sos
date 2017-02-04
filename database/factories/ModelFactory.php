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
    if ($autoIncrement->current() == 1){
        return [
            'user_id' => $autoIncrement->current(),
            'role_id' => 1
        ];
    }else{
        return [
            'user_id' => $autoIncrement->current(),
            'role_id' => 2
        ];
    }

});

$autoIncrement = autoIncrement();

$factory->define(App\Category::class, function (Faker\Generator $faker) use ($autoIncrement) {
    $categories = ['Staples', 'Meat', 'Vegetable', 'Seafood', 'Nut', 'Sauce', 'Drinks', 'Desert'];
    $autoIncrement->next();
    return [
        'name' => $categories[$autoIncrement->current()-1]
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\Ingredient::class, function (Faker\Generator $faker) use ($autoIncrement) {
    $autoIncrement->next();

    // 16 ingredients atm
    $ingredients = [['White Rice', 0.25, 1], ['Lemak Rice', 0.50, 1], ['Seasoned Rice', 0.50, 1],
                    ['Whole Chicken', 6.50, 2], ['1/2 Chicken', 4.00, 2], ['Small Chicken', 1.50, 2],
                    ['Carrot', 0.20, 3], ['Lettuce', 0.20, 3], ['Onion', 0.2, 3], ['Cucumber', 0.2, 3],
                    ['Trout', 3.50, 4], ['Salmon', 4.00, 4], ['Tilapia', 1.50, 4], ['Prawn', 1.50, 4],
                    ['Sambal', 0.00, 6], ['Mayonnaise', 0.00, 6]]
    ;
    return [
        'name' => $ingredients[$autoIncrement->current()-1][0],
        'price' => $ingredients[$autoIncrement->current()-1][1],
        'category_id' => $ingredients[$autoIncrement->current()-1][2]
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\Ingredient::class, function (Faker\Generator $faker) use ($autoIncrement) {
    $autoIncrement->next();

    // 16 ingredients atm
    $ingredients = [['White Rice', 0.50, 1], ['Lemak Rice', 1.00, 1], ['Seasoned Rice', 1.00, 1],
        ['Whole Chicken', 6.50, 2], ['1/2 Chicken', 4.00, 2], ['Small Chicken', 1.50, 2],
        ['Carrot', 0.20, 3], ['Lettuce', 0.20, 3], ['Onion', 0.2, 3], ['Cucumber', 0.2, 3],
        ['Trout', 3.50, 4], ['Salmon', 4.00, 4], ['Tilapia', 1.50, 4], ['Prawn', 1.50, 4],
        ['Sambal', 0.00, 6], ['Mayonnaise', 0.00, 6]]
    ;
    return [
        'name' => $ingredients[$autoIncrement->current()-1][0],
        'price' => $ingredients[$autoIncrement->current()-1][1],
        'category_id' => $ingredients[$autoIncrement->current()-1][2]
    ];


});

$autoIncrement = autoIncrement();

$factory->define(App\Nutrition::class, function (Faker\Generator $faker) use ($autoIncrement) {
    $autoIncrement->next();

    // 16 ingredients atm
    $nutritions = [[100, 200, 5, 0, 10, 3, 10], [100, 200, 5, 0, 10, 3, 10],  [100, 200, 5, 0, 10, 3, 10],
        [100, 200, 5, 0, 10, 3, 10], [100, 200, 5, 0, 10, 3, 10], [100, 200, 5, 0, 10, 3, 10],
        [100, 200, 5, 0, 10, 3, 10], [100, 200, 5, 0, 10, 3, 10], [100, 200, 5, 0, 10, 3, 10],
        [100, 200, 5, 0, 10, 3, 10], [100, 200, 5, 0, 10, 3, 10], [100, 200, 5, 0, 10, 3, 10],
        [100, 200, 5, 0, 10, 3, 10], [100, 200, 5, 0, 10, 3, 10], [100, 200, 5, 0, 10, 3, 10],
        [100, 200, 5, 0, 10, 3, 10]]
    ;
    return [
        'calories' => $nutritions[$autoIncrement->current()-1][0],
        'carbohydrate' => $nutritions[$autoIncrement->current()-1][1],
        'saturate_fat' => $nutritions[$autoIncrement->current()-1][2],
        'trans_fat' => $nutritions[$autoIncrement->current()-1][3],
        'fibre' => $nutritions[$autoIncrement->current()-1][4],
        'sugar' => $nutritions[$autoIncrement->current()-1][5],
        'protein' => $nutritions[$autoIncrement->current()-1][6],
        'ingredient_id' => $autoIncrement->current()
    ];


});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}